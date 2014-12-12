<?php

class ArticlesController extends BaseController {

	protected $article;
	protected $articleCategory;
	protected $game;
	protected $logger;
	protected $platform;
	protected $company;
	protected $event;
	protected $tag;
	protected $video;
	protected $disqus;

	public function __construct(Article $article, ArticleCategory $articleCategory, Game $game, Company $company, GamingEvent $event,
								Logger $logger, Platform $platform, Tag $tag, Video $video, DisqusClass $disqus) {

		$this->beforeFilter('admin', array('only' => array('create', 'store', 'edit', 'destroy', 
										   'listGames', 'publish', 'unpublish')));

		$this->logger 			= $logger;
		$this->article    		= $article;
		$this->game 			= $game;
		$this->article  		= $article;
		$this->platform 		= $platform;
		$this->company 			= $company;
		$this->event 			= $event;
		$this->tag 				= $tag;
		$this->video 			= $video;
		$this->disqus 			= $disqus;
		$this->articleCategory 	= $articleCategory;
	}

	public function index() {} 

	public function listArticles() {

		$uArticles = $this->article->returnArticlesList(null, false);
		$pArticles = $this->article->returnArticlesList(null, true);

		return View::make('articles.list')	->with('uArticles', $uArticles)
											->with('pArticles', $pArticles);
	}

	public function show($article_id) {} 	

	public function showNewsArticle($y, $m, $d, $title_slug) {
		$date = App::make('DateClass');

		if( ! $article = $this->article->validateSlug($y, $m, $d, $title_slug, $date))
			App::abort(404);

		//increment number of video views
		$this->incrementViews('articles', 'title_slug', $title_slug);
		
		//format published date
		$article->published_at = $date->formatDate($article->published_at, 'd F Y');

		//get author name
		$article->author_name = $this->article->getAuthorName($article->author_id);

		//decode html entities
		$article->body = html_entity_decode($article->body);
		
		return View::make('articles.news')
					->with('article', $article)
					->with('disqusPayload', $this->disqus->getPayload());
	}

	public function showReviewArticle($y, $m, $d, $title_slug) {}

	public function showInterviewArticle($y, $m, $d, $title_slug) {}

	public function showFeatureArticle($y, $m, $d, $title_slug) {}

	public function showOpinionArticle($y, $m, $d, $title_slug) {}

	public function create() {	

		$videos = $this->returnModelList($this->video, 'title', 'id', 'title');
		$videos[0] = 'Select a video...';
		ksort($videos);

		return View::make('articles.create')
					->with('article_categories', 	$this->returnModelList($this->articleCategory, 'category', 'id', 'id'))
					->with('videos', 				$videos)
					->with('articles', 				$this->returnModelList($this->article, 'title', 'id', 'title'))
					->with('companies', 			$this->returnModelList($this->company, 'name', 'id', 'name'))
					->with('platforms', 			$this->returnModelList($this->platform, 'name', 'id', 'id'))
					->with('games', 				$this->returnModelList($this->game, 'title', 'id', 'title'))
					->with('events', 				$this->returnModelList($this->event, 'event', 'id', 'id'));
	}

	public function store() {

		// Validate the article data
		if( ! $this->isValid($input = Input::all(), $this->article))
			return Redirect::back()->withInput()->withErrors($this->article->inputErrors);

		//attempt to save article to DB
		if( ! $article_id = $this->article->saveNewArticle($input)) {
			//log error to logger
			$errorNum =  $this->logger->createLog('ArticlesController', 'store', 'Failed to add article to DB.', Request::url(), Request::path(), 8);
			Session::put('adminDangerAlert', 'Error #'. $errorNum . ' - Something went wrong attempting to add the article to the database. Contact an administrator if this continues.');
			return Redirect::back();
		}

		//insert game tags
		if( ! empty($games = Input::get('games'))) {
			foreach($games as $game_id) {
				$this->tag->insertTagReference('article', $article_id, 'game', $game_id);
			}
		}

		//insert platform tags
		if( ! empty($platforms = Input::get('platforms'))) {
			foreach($platforms as $platform_id) {
				$this->tag->insertTagReference('article', $article_id, 'platform', $platform_id);
			}
		}

		//insert company tags
		if( ! empty($companies = Input::get('companies'))) {
			foreach($companies as $company_id) {
				$this->tag->insertTagReference('article', $article_id, 'company', $company_id);
			}
		}

		//insert event tags
		if( ! empty($events = Input::get('events'))) {
			foreach($events as $event_id) {
				$this->tag->insertTagReference('article', $article_id, 'event', $event_id);
			}
		}

		// return successful insertion
		Session::put('adminSuccessAlert', 'New article added.');
		return Redirect::to('/admin/articles');

	} 

	public function edit($article_id) {

		if( ! $article = $this->article->find($article_id))
			App::abort(404);

		$videos = $this->returnModelList($this->video, 'title', 'id', 'title');
		$videos[0] = 'Select a video...';
		ksort($videos);

		return View::make('articles.edit')
					->with('article_categories', 	$this->returnModelList($this->articleCategory, 'category', 'id', 'id'))
					->with('videos', 				$videos)
					->with('article', 				$article)
					->with('articles', 				$this->returnModelList($this->article, 'title', 'id', 'title'))
					->with('companies', 			$this->returnModelList($this->company, 'name', 'id', 'name'))
					->with('platforms', 			$this->returnModelList($this->platform, 'name', 'id', 'id'))
					->with('games', 				$this->returnModelList($this->game, 'title', 'id', 'title'))
					->with('events', 				$this->returnModelList($this->event, 'event', 'id', 'id'))
					->with('company_tags',			$this->tag->getMediaTags('article', $article_id, 'company'))
					->with('platform_tags',			$this->tag->getMediaTags('article', $article_id, 'platform'))
					->with('game_tags',				$this->tag->getMediaTags('article', $article_id, 'game'))
					->with('event_tags',			$this->tag->getMediaTags('article', $article_id, 'event'));
		
	}

	public function update($article_id) {

		$article_id = intval($article_id);

		//attempt to save article to DB
		if( ! $this->article->updateArticle($article_id, Input::all())) {

			//log error to logger
			$errorNum =  $this->logger->createLog('ArticlesController', 'update', 'Failed to add article to DB.', Request::url(), Request::path(), 8);
			Session::put('adminDangerAlert', 'Error #'. $errorNum . ' - Something went wrong attempting to add the article to the database. Contact an administrator if this continues.');
			return Redirect::back();
		}

		//update game tags
		if( ! empty($games = Input::get('games'))) {
			//delete existing tags
			$this->tag->deleteTagReference('article', $article_id, 'game');
			foreach($games as $game_id) {
				$this->tag->insertTagReference('article', $article_id, 'game', $game_id);
			}
		}
		else {
			//delete tag references if games is empty
			$this->tag->deleteTagReference('article', $article_id, 'game');
		}

		//update platform tags
		if( ! empty($platforms = Input::get('platforms'))) {
			//delete existing tags
			$this->tag->deleteTagReference('article', $article_id, 'platform');
			foreach($platforms as $platform_id) {
				$this->tag->insertTagReference('article', $article_id, 'platform', $platform_id);
			}
		}
		else {
			//delete tag references if platforms is empty
			$this->tag->deleteTagReference('article', $article_id, 'platform');
		}

		//update company tags
		if( ! empty($companies = Input::get('companies'))) {
			//delete existing tags
			$this->tag->deleteTagReference('article', $article_id, 'company');
			foreach($companies as $company_id) {
				$this->tag->insertTagReference('article', $article_id, 'company', $company_id);
			}
		}
		else {
			//delete tag references if companies is empty
			$this->tag->deleteTagReference('article', $article_id, 'company');
		}

		//update event tags
		if( ! empty($events = Input::get('events'))) {
			//delete existing tags
			$this->tag->deleteTagReference('article', $article_id, 'event');
			foreach($events as $event_id) {
				$this->tag->insertTagReference('article', $article_id, 'event', $event_id);
			}
		}
		else {
			//delete tag references if events is empty
			$this->tag->deleteTagReference('article', $article_id, 'event');
		}

		// return successful insertion
		Session::put('adminSuccessAlert', '<b>'. Input::get('title') .'</b> has been updated.');
		return Redirect::to('/admin/articles');
	} 

	public function publish($article_id) {

		if(Request::ajax())	{

			if($article = $this->article->find($article_id)) {

				$date = App::make('DateClass');

				$title = $article->title;

				$article->is_published = true;
				if($article->published_at === null)
					$article->published_at = $date->newDate();
				$article->save();

				Session::put('adminSuccessAlert', '<b>'.$title.'</b> has been published.');
			} else {
				Session::put('adminDangerAlert', 'Something went wrong attempting to publish <b>'.$title.'</b>.');	
			}
			return;
		}
	}

	public function unpublish($article_id) {

		if(Request::ajax())	{
			
			if($article = $this->article->find($article_id)) {
				
				$title = $article->title;
				$article->is_published = false;
				$article->save();

				Session::put('adminSuccessAlert', '<b>'.$title.'</b> has  been unpublished.');
			} else {
				Session::put('adminDangerAlert', 'Something went wrong attempting to unpublish <b>'.$title.'</b>.');	
			}
			return;
		}
	}

	public function destroy($article_id) {

		if(Request::ajax())	{
			
			if($article = $this->article->find($article_id)) {

				$title = $article->title;

				if($article->is_published) {
					Session::put('adminDangerAlert', 'You cannot delete an article whilst it is publlished. Unpublish the article first and then attempt to delete it.');
					return;
				}

				$article->delete();
				Session::put('adminSuccessAlert', '<b>'.$title.'</b> has been deleted.');
			} 
			else {
				Session::put('adminDangerAlert', 'Something went wrong attempting to delete <b>'.$title.'</b>.');	
			}

			return;
		}
	} 

}