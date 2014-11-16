<?php

class MessagesController extends BaseController {

	protected $user;
	protected $message;
	protected $logger;

	public function __construct(Logger $logger, Message $message, User $user) {

		$this->beforeFilter('admin', array('only' => array('create', 'store', 'destroy', 'inbox', 'trash', 'sent')));
		$this->logger 	= $logger;		
		$this->message 	= $message;
		$this->user 	= $user;
	}

	public function index() {
		App::abort(404);
	}

	public function create() {
		return View::make('messages.create')
					->with('staff',$this->returnModelList($this->user, 'username', 'id', 'username'));
	}

	public function store() {}

	public function edit($message_id) {
		App::abort(404);
	}

	public function inbox() {
		return View::make('messages.inbox');
	}

	public function sent() {}

	public function trash() {}

	public function update() {
		App::abort(404);
	}

	public function destroy() {}	

}
