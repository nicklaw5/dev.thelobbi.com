<?php
/**
 * Genre model
 */
class Genre extends Eloquent {

	protected $table = 'genres';
	protected $fillable = [''];
	protected $guarded = [''];
	protected $hidden = array('');

	public $inputErrors;
	public $inputRules = [
		'name' 					=> 	'required|unique:genres',
		'description' 			=> 	'max:500'
	];

	public function returnGenresList() {
		$genres = DB::table($this->table)
				->select(DB::raw('genres.id, genres.name, genres.name_slug, genres.description'))
	            ->orderBy('genres.name', 'desc')
	            ->get();

		return $genres;
	}

	public function saveNewGenre($input) {

		$string = App::make('StringClass');

		$this->name 			  = $string->nullifyAndStripTags($input['name']);
		$this->name_slug  		  = $string->slugify($this->name);
		$this->description 		  = $string->nullifyAndStripTags($input['description']);
		$this->save();

		return true;
	}

	public function updateGenre($genre_id, $input) {

		$string = App::make('StringClass');

		DB::table($this->table)
            ->where('id', $genre_id)
            ->update(array(
            	'name'				=> $name = $string->nullifyAndStripTags($input['name']),
            	'name_slug' 		=> $string->slugify($name),
            	'description'		=> $string->nullifyAndStripTags($input['description'])
            ));
            
        return true;
	}
}