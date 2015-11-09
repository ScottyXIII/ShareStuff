<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminMessages extends Model {

	public function user() 
	{
		return $this->hasOne('\App\User', 'id', 'from');
	}

	public static function send($to, $from, $title, $message_body) 
	{
		$message = new \App\AdminMessages();
		
		$message->to = $to; 
		$message->from = $from; 
		$message->title = $title; 
		$message->message = $message_body; 
		$message->read = false; 
		$message->save(); 
	}

}
