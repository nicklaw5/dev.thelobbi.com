<?php

/**
 * Message model
 */
class Message extends Eloquent {

	protected $table = 'messages';
	protected $fillable = [];
	protected $guarded = [];

	protected $hidden = array('');

	public $inputErrors;
	public $inputRules = [
		'subject' 				=> 	'required|max:150',
		'body' 					=>	'required'
	];

	public function sendMessage($input, $recipient) {

		$string = App::make('StringClass');

		//save new message to DB
		$this->sender 			= intval(Auth::id());
		$this->recipient		= intval($recipient);
		$this->subject 			= $string->nullifyAndStripTags($input['subject']);
		$this->body 			= $string->nullifyAndStripTags($input['body'], '<b><p><br><a><h1><h2><h3><h4><h5><h6><i><blockquote><u><ul><ol><li><img>');
		$this->save();
	
		return true;
	}

	public function getMessagesReceived() {
		$messages = DB::table($this->table)
						->where('recipient', '=', Auth::id())
						->where('trashed', '=', 0)
						->orderBy('message_read', 'asc')
						->orderBy('created_at', 'desc')
						->paginate(10);
						
		foreach ($messages as $message) {
			$this->formatMessageReceived($message);
		}
		return $messages;
	}

	public function formatMessageReceived($message) {	
		$date = App::make('DateClass');

		//format date
		$message->created_at = $date->formatDate($message->created_at, 'd F Y');

		//get sender name
		$message->sender = DB::table('users')
								->where('id', '=', $message->sender)
								->pluck('fullname');
		return $message;
	}

	public function getMessagesSent() {
		$messages = DB::table($this->table)
						->where('sender', '=', Auth::id())
						->where('sender_deleted', '=', 0)
						->orderBy('message_read', 'asc')
						->orderBy('created_at', 'desc')
						->paginate(10);
						
		foreach ($messages as $message) {
			$this->formatMessageSent($message);
		}
		return $messages;
	}

	public function formatMessageSent($message) {	
		$date = App::make('DateClass');

		//format date
		$message->created_at = $date->formatDate($message->created_at, 'd F Y');

		//get sender name
		$message->recipient = DB::table('users')
								->where('id', '=', $message->recipient)
								->pluck('fullname');
		return $message;
	}

	public function getMessagesTrashed() {
		$messages = DB::table($this->table)
						->where('recipient', '=', Auth::id())
						->where('trashed', '=', 1)
						->where('recipient_deleted', '=', 0)
						->orderBy('message_read', 'asc')
						->orderBy('created_at', 'desc')
						->paginate(10);
						
		foreach ($messages as $message) {
			$this->formatMessageSent($message);
		}
		return $messages;
	}

	public function getTotalNumMessages($messageStatus) {	
		
		$statuses = ['sent', 'received'];

		if( ! in_array($messageStatus, $statuses))
			App::abort(404);

		$column = ($messageStatus === 'received')? 'recipient' : 'sender';

		if($column == 'recipient'){
			$count = DB::table($this->table)
						->where($column, '=', Auth::id())
						->where('trashed', '=', 0)
						->where($column.'_deleted', '=', 0)
						->count();
		} else {
			$count = DB::table($this->table)
						->where($column, '=', Auth::id())
						->where($column.'_deleted', '=', 0)
						->count();
		}

		return $count;
	}

	public function getNumUnreadMessages() {
		$numUnreadMessages = DB::table($this->table)
								->where('recipient', '=', Auth::id())
								->where('trashed', '=', 0)
								->where('recipient_deleted', '=', 0)
								->where('message_read', '=', 0)
								->count();

		return $numUnreadMessages;
	}

	

}