<?php

class ArticlesController extends BaseController {

	protected $article;
	protected $articleCategory;
	protected $game;
	protected $logger;
	protected $video;

	public function __construct(Article $article, ArticleCategory $articleCategory, Game $game,
								Video $video, Logger $logger) {

		$this->beforeFilter('admin', array('only' => array('create', 'store', 'edit', 'destroy', 
										   'listGames', 'publish', 'unpublish')));

		$this->logger 			= $logger;
		$this->video    		= $video;
		$this->game 			= $game;
		$this->article  		= $article;
		$this->articleCategory 	= $articleCategory;
	}

	public function index() {} 

	public function listArticles() {}

	public function show($article_id) {} 	

	public function showNewsArticle($article_id) {}

	public function showReviewArticle($article_id) {}

	public function showInterviewArticle($article_id) {}

	public function showFeatureArticle($article_id) {}

	public function showOpinionArticle($article_id) {}

	public function create() {	

		return View::make('articles.create')
					->with('article_categories', $this->returnModelList($this->articleCategory, 'category', 'id', 'id'))
					->with('games', $this->returnModelList($this->game, 'title', 'id', 'title'))
					->with('videos', $this->returnModelList($this->video, 'title', 'id', 'title'));

	}

	public function store() {} 

	public function storeNews() {} 

	public function edit($article_id) {} 

	public function update($article_id) {} 

	public function destroy($article_id) {} 

	public function publish($article_id) {} 
	
	public function unpublish($article_id) {} 
}