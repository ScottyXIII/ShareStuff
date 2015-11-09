<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model {

	
	protected $table = 'message';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['to', 'from', 'title', 'message'];

	public function user() 
	{
		return $this->hasOne('\App\User', 'id', 'from');
	}

	public static function send($to, $from, $title, $message_body) 
	{
		$message = new \App\Message();
		
		$message->to = $to; 
		$message->from = $from; 
		$message->title = $title; 
		$message->message = $message_body; 
		$message->read = false; 
		$message->save(); 
	}
	
}
