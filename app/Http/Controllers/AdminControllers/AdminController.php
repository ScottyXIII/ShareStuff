<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminController extends Controller {

	public $active_nav; 

	public $data = array(); 

	public function __construct() 
	{
		$this->active_nav = "home";

		// Make sure we are only letting super users into the backend admin area.
	}

}
