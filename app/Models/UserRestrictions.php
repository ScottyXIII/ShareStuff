<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRestrictions extends Model {

	public function Restriction() 
	{	
		return $this->hasOne('\App\Restrictions', 'id', 'restriction_id')->first();
	}

}
