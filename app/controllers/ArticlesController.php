<?php

class ArticlesController extends BaseController {

	protected $articles;

	public function __construct(Articles $articles) 
	{
		$this->articles = $articles;
	}

	//GET articles 					articles.index
	public function index() 
	{
		$articles = $this->articles->all();
		return View::make('articles.index')->with('articles', $articles);
	}

	//GET articles/create 			articles.create
	public function create() {}

	//POST articles 						articles.store
	public function store() {}

	//GET articles/{articles} 			articles.show
	public function show() {}

	//GET articles/{year}/{month}/{day}/{title}
	public function showDatedArticle($year, $month, $day, $articleTitle) {
		return $articleTitle;
	}

	//GET articles/{articles}/edit 		articles.edit
	public function edit() {}

	//PUT/PATCH articles/{articles}			articles.update
	public function update() {}

	//DELETE articles/{articles}				articles.delete
	public function destroy() {} 
	
}