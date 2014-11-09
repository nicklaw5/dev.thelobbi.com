<?php

/**
 * Tag model
 */
class Tag extends Eloquent {

	protected $table = 'tags';
	protected $fillable = [];
	protected $guarded = [];

	protected $hidden = array('');

	public function createNewTag($table, $object_id){

		//get tag type
		$tag_type = $this->getTagType(strtolower($table));

		//convert table to singular

		$table_singular = ($table === strtolower('companies'))? 'company' : rtrim(strtolower($table), "s");		//eg. 'games' becomes 'game'

		//create new tag in 'tags' table and get its id
		$tag_id = 	DB::table('tags')->insertGetId(
					  	array('tag_type' => intval($tag_type))
				  	);

		//insert tag and object id
		DB::table($table_singular . '_tags')->insert(
    		array(
    			'tag_id' => intval($tag_id),
    			$table_singular.'_id' => intval($object_id)
    			)
		);

		return true;
	}

	//media type = 'video' or 'article' //media_id = 'video_id' or 'article_id' //object_type = 'game' //object_id = 'game_id'
	public function insertTagReference($media_type, $media_id, $object_type, $object_id) {
		
		//get tag id
		$tag_id = $this->getTagId($object_type.'_tags', $object_type.'_id', $object_id);

		$tag_type = ($object_type === 'company')? $this->getTagType('companies'): $this->getTagType($object_type.'s');

		//insert into media tags table (eg. 'video_tags' or 'article_tags')
		DB::table($media_type.'_tags')->insert(
    		array(
    			$media_type.'_id' 	=> intval($media_id),
    			'tag_id' 			=> intval($tag_id),
    			'tag_type'			=> intval($tag_type)
    			)
		);
	}

	//media_type = 'video' or 'article' //media_id = 'video_id' or 'article_id'
	public function deleteTagReference($media_type, $media_id, $object_type) {

		$tag_type = ($object_type === 'company')? $this->getTagType('companies'): $this->getTagType($object_type.'s');

		DB::table($media_type.'_tags')
			->where(function($query) use ($media_type, $media_id, $tag_type){
				$query->where($media_type.'_id', '=', $media_id)
						->where('tag_type', '=', $tag_type);
		})->delete();
	}

	public function getTagType($table) {
		return DB::table('tag_types')->where('type', $table)->pluck('id');
	}

	public function getMediaTags($media_type, $media_id, $object_type) {
		$tags = DB::table($media_type.'_tags')
					->where($media_type.'_id', '=', $media_id)
					->select('tag_id')
					->get();
		$object_id_array = [];
		if( ! empty($tags)){
			foreach($tags as $tag) {
				$object = DB::table($object_type.'_tags')
							->where('tag_id', $tag->tag_id)
							->pluck($object_type.'_id');
				array_push($object_id_array, $object);
			}
		}
		return $object_id_array;
	}

	public function getTagId($table, $have, $value) {
		return DB::table($table)->where($have, $value)->pluck('tag_id');
	}

}