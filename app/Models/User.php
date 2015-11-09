<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password', 'theme_id'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	public static function getFromDate($date)
	{
		return \App\User::where('created_at', '>', $date)->get();
	}

	public static function numberOfPosts($user_id)
	{
		return \App\Posts::where('user_id', '=', $user_id)->count();
	}

	public function posts()
	{
		return $this->hasMany('\App\Posts', 'user_id', 'id')->get();
	} 

	public function numberUnreadMessages() 
	{
		$count = 0; 
		
		foreach(\App\Message::all() as $message) {
			if ($message->to == \Auth::User()->id && $message->read == 0) {
				$count++;
			}
		} 

		return $count; 
	}

	public function getAllMessages() 
	{	
		return \App\Message::where('to', '=', \Auth::user()->first()->id)->orderBy('created_at', 'DES')->get();
	}

	public function Theme() 
	{	
		return $this->hasOne('\App\Themes', 'id', 'theme_id')->first();
	}

	public function bans() 
	{
		return $this->hasMany('\App\UserRestrictions', 'user_id', 'id')->get();	
	}

	private function checkForBan($ban_name) 
	{
		$bans = $this->bans();
	 
		foreach($bans as $ban) {
			if ($ban->Restriction()->name == $ban_name) {
				return true;
			}
			
		}
		return false; 

	}

	public function postBan() 
	{
		return $this->checkForBan("posting");
	}

	public function messageBan()
	{
 		return $this->checkForBan("messages");
	}

	public function categoriesBan() 
	{
		return $this->checkForBan("categories");
	}
}
