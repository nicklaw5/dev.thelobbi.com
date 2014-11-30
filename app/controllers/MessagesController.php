<?php

class MessagesController extends BaseController {

	protected $user;
	protected $message;
	protected $logger;

	public function __construct(Logger $logger, Message $message, User $user) {

		$this->beforeFilter('admin', array('only' => array('create', 'store', 'show', 'destroy', 'trash', 'sent',
															'senderDelete', 'recipientDelete', 'trashMessages')));
		$this->logger 	= $logger;		
		$this->message 	= $message;
		$this->user 	= $user;
	}

	public function index() {

		return View::make('messages.index')
					->with('messages', $this->message->getMessagesReceived())
					->with('messageCount', $this->message->getTotalNumMessages('received'))
					->with('numUnreadMessages', $this->message->getNumUnreadMessages());
	}

	public function create() {
		return View::make('messages.create')
					->with('staff',$this->returnModelList($this->user, 'fullname', 'id', 'fullname'))
					->with('messages', $this->message->getMessagesReceived())
					->with('numUnreadMessages', $this->message->getNumUnreadMessages());
	}

	public function showReceived($message_id) {
		// get message
		$message = $this->message->find($message_id);

		// check if user is message recipient
		if($message->recipient !== Auth::id())
			App::abort(404);

		//update message to read
		$message->message_read = true;
		$message->save();

		return View::make('messages.show')
					->with('message', $message)
					->with('numUnreadMessages', $this->message->getNumUnreadMessages());	
	}
	
	public function showSent($message_id) {
		// get message
		$message = $this->message->find($message_id);

		// check if user is message sender
		if($message->sender !== Auth::id())
			App::abort(404);

		//$this->message->formatMessageReceived($message);

		return View::make('messages.show')
					->with('message', $message)
					->with('numUnreadMessages', $this->message->getNumUnreadMessages());
	}

	public function show($message_id) {

		App::abort(404);

		//get message
		// $message = $this->message->find($message_id);

		// //if not the recipient of message, throw 404
		// if($message->recipient !== Auth::id() || $message->sender !== Auth::id())
		// 	App::abort(404);

		// //update message to read
		// $message->message_read = true;
		// $message->save();

		//$this->message->formatMessageSent($message);

		//format message
		// $message = $this->message->formatMessage($message);

		// return View::make('messages.show')
		// 			->with('message', $message)
		// 			->with('numUnreadMessages', $this->message->getNumUnreadMessages());
	}

	public function store() {

		// Validate the message data
		if( ! $this->isValid(Input::all(), $this->message))
			return Redirect::back()->withInput()->withErrors($this->message->inputErrors);

		$recipArray = [];
		foreach (Input::get('recipients') as $recip) {
			array_push($recipArray, intval($recip));
		}

		for($i = 0; $i < count($recipArray); $i++) {

			if( ! $this->message->sendMessage(Input::only('subject', 'body'), $recipArray[$i])) {
				//log error to logger
				$errorNum =  $this->logger->createLog('MessagesController', 'store', 'Failed to add message to DB.', Request::url(), Request::path(), 8);
				Session::put('adminDangerAlert', 'Error #'. $errorNum . ' - Something went wrong attempting to save the message to the database. Contact an administrator if this continues.');
				return Redirect::back()->withInput();
			}
		}

		Session::put('adminSuccessAlert', 'Message sent.');
		return Redirect::to('admin/messages/sent');
	}

	public function edit($message_id) {
		App::abort(404);
	}

	public function update() {
		App::abort(404);
	}

	public function sent() {
		return View::make('messages.sent')
					->with('messages', $this->message->getMessagesSent())
					->with('messageCount', $this->message->getTotalNumMessages('sent'))
					->with('numUnreadMessages', $this->message->getNumUnreadMessages());
	}

	public function trash() {
		return View::make('messages.trash')
					->with('messages', $this->message->getMessagesTrashed())
					->with('numUnreadMessages', $this->message->getNumUnreadMessages());
	}

	public function trashMessages() {
		$ids = explode(',', Input::get('messages'));
		foreach($ids as $id) {
			$message = $this->message->find($id);
			$message->trashed = intval(1);
			$message->save();
		}
	}

	public function returnMessages() {
		$ids = explode(',', Input::get('messages'));
		foreach($ids as $id) {
			$message = $this->message->find($id);
			$message->trashed = intval(0);
			$message->save();
		}	 
	}

	public function recipientDelete() {
		$ids = explode(',', Input::get('messages'));
		foreach($ids as $id) {
			$message = $this->message->find($id);
			$message->recipient_deleted = intval(1);
			$message->save();
		}
	}

	public function senderDelete() {
		$ids = explode(',', Input::get('messages'));
		foreach($ids as $id) {
			$message = $this->message->find($id);
			$message->sender_deleted = intval(1);
			$message->save();
		}
	}

	public function destroy($message_id) {
		App::abort(404);

		// DB::table($this->table)
		// 	->where('id', '=', $message_id)
		// 	->where('recipient_deleted', '=', 1)
		// 	->where('sender_deleted', '=', 1)
		// 	->delete();
	}

}
