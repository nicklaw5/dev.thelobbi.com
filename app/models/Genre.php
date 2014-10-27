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

		$this->name 			  = $this->nullCheck($input['name']);
		$this->name_slug  		  = $this->nullCheck(strtolower(preg_replace(array('/[^a-zA-Z0-9 -]/', '/[ -]+/', '/^-|-$/'), array('', '-', ''), $input['name'])));
		$this->description 		  = $this->nullCheck($input['description']);
		$this->save();

		return true;
	}

	public function updateGenre($genre_id, $input) {
		DB::table($this->table)
            ->where('id', $genre_id)
            ->update(array(
            	'name'				=> $this->nullCheck($input['name']),
            	'name_slug' 		=> $this->nullCheck(strtolower(preg_replace(array('/[^a-zA-Z0-9 -]/', '/[ -]+/', '/^-|-$/'), array('', '-', ''), $input['name']))),
            	'description'		=> $this->nullCheck($input['description'])
            ));
            
        return true;
	}

	private function nullCheck($data) {
		if($data === '' || $data === null)
			return null;
		return $data;
	}
}