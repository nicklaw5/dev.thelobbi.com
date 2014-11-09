<?php

/**
 * ArticleCategory model
 */
class Article extends Eloquent {
	
	protected $table = 'articles';
	protected $fillable = [];
	protected $guarded = [];

	protected $hidden = array('');

	public $inputErrors;
	public $inputRules = [
		'article_category'		=> 	'integer',
		'author_id'				=> 	'integer|exists:users,id',
		'title'					=> 	'max:150|required|unique:articles',		
		'description' 			=> 	'max:300|required',
		'main_image'			=>	'max:250|url|required',
		'feature_image'			=>	'max:250|url',
		'body'					=> 	'required',
		'review_score'			=>	'numeric|between:0,10',
		'video'					=>  'integer',
		'is_published'			=>  'integer',
		'last_edited_by'		=>  'integer|exists:users,id',
		'last_edit_comment'		=> 	'max:250'
	];

	public function saveNewArticle($input) {

		$string = App::make('StringClass');
		$date = App::make('DateClass');

		$this->article_category	= $article_category = intval($input['article_category']);
		$this->author_id		= intval(Auth::id());
		$this->title 			= $string->nullifyAndStripTags($input['title']);
		$this->title_slug		= $string->slugify($this->title);
		$this->description		= $string->nullifyAndStripTags($input['description'], '<em><strong><b><a><s>');
		$this->body 			= $string->htmlEncode($input['body']);
		$this->main_image		= $string->nullifyAndStripTags($input['main_image']);
		$this->feature_image	= $string->nullifyAndStripTags($input['feature_image']);
		$this->review_score		= ($article_category === 2)? floatval($input['review_score']): null; //if article is a review
		$this->video			= (intval($input['video']) === 0)? null: intval($input['video']); //if artticle includes video
		$this->posted_at		= $date->newDate();
		$this->save();

		$article_id = $this->returnArticleData('id', 'title', $this->title);

		return $article_id;
	}

	public function updateArticle($article_id, $input){

		$string = App::make('StringClass');

		DB::table($this->table)
            ->where('id', $article_id)
            ->update(array(
            	'article_category'	=> $article_category = intval($input['article_category']),
            	'title' 			=> $string->nullifyAndStripTags($input['title']),
            	'title_slug'		=> $string->slugify($input['title']),
            	'description'		=> $string->nullifyAndStripTags($input['description'], '<em><strong><b><a><s>'),
				'body'				=> $string->htmlEncode($input['body']),
				'main_image'		=> $string->nullifyAndStripTags($input['main_image']),
				'feature_image'		=> $string->nullifyAndStripTags($input['feature_image']),
				'review_score'		=> ($article_category === 2)? floatval($input['review_score']): null,            	
				'video' 			=> (intval($input['video']) === 0)? null: intval($input['video']),
				'last_edit_by'		=> intval(Auth::id())
			));
		return true;
		
	}

	public function returnArticlesList($numberOfArticles = null, $is_published = true) {
		$articles = DB::table($this->table)
	                ->select(
	                	DB::raw(
		                	'articles.id, articles.title, articles.title_slug,
		                	 articles.main_image, articles.feature_image, articles.description,
		                	 articles.body, articles.views, articles.posted_at, articles.published_at,

		                	 GROUP_CONCAT(DISTINCT ac.category) AS category,
		                	 GROUP_CONCAT(DISTINCT v.video) AS video,
		                	 GROUP_CONCAT(DISTINCT u.first_name) AS first_name,
		                 	 GROUP_CONCAT(DISTINCT u.last_name) AS last_name'
	                	)
	                )

	                ->leftJoin('article_categories AS ac', 'ac.id', '=', 'articles.article_category')
	                ->leftJoin('users AS u', 'u.id', '=', 'articles.author_id')
	                ->leftJoin('videos AS v', 'v.id', '=', 'articles.video')

	                ->where('articles.is_published', '=', $is_published)

			        ->groupBy('articles.id')
		            ->orderBy('articles.created_at', 'desc')
		            ->limit($numberOfArticles)
		            ->get();

	    $date = App::make('DateClass');

		foreach($articles as $article) {
			$article->posted_at = $date->formatDate($article->posted_at, 'jS M Y');

			$urlCategory = ($article->category === 'News')? strtolower($article->category): strtolower($article->category.'s');
			$article->url = '/'.$urlCategory.'/' . $date->formatDate($article->published_at, 'Y/m/d/') . $article->title_slug;
		}

		return $articles;
	}

	private function returnArticleData($want, $have, $value) {
		return DB::table($this->table)->where($have, $value)->pluck($want);
	}

}