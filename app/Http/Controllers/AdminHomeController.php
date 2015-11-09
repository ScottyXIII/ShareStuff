<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminHomeController extends AdminController {

	public function __construct() 
	{	
		$this->active_nav = "home";
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// Info we need to grab. //
		///////////////////////////
		// New users: Today, this week + month. ---> just queery our database with a where->created == today || month || week
		// Total categories
		// unread admin messages. 
		
  		$data = array(
			'new_users' => \App\User::all()->orderBy('created_at', 'DES')->limit(10),	
			'active_nav' => $this->active_nav,
			'total_users' => \App\User::all()->count(),
			'logged_in' => \App\User::where('logged_in', '=', 1)->count(),
			'total_posts' => \App\Posts::all()->count(),
		);
		
 	 	return view('includes/admin/home')->with($data);
	}
	
}
