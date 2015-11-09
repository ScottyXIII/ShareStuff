<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
	 use \Carbon\Carbon;

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
		$admin_messages = \App\AdminMessages::where('read', '=', 0);

  		$data = array(
			'active_nav' => $this->active_nav,
			'total_users' => \App\User::all()->count(),
			'logged_in' => \App\User::where('logged_in', '=', 1)->count(),
			'total_categories' => \App\categories::count(),
			'total_posts' => \App\Posts::all()->count(),
			'latest_users' => \App\User::orderBy('created_at', 'ASC')->limit(10)->get(),
			'latest_posts' => \App\Posts::orderBy('created_at', 'ASC')->limit(10)->get(),
			'unread_admin_messages' => $admin_messages->count(),
			'new_users_month' => \App\User::getFromDate(date('y-m-0'))->count(),
			'new_users_week' => \App\User::getFromDate(date('y-m-d', strtotime('-7 day')))->count(),
			'new_users_day' => \App\User::getFromDate(date('y-m-d', strtotime('-1 day')))->count(),
			'new_posts_month' => \App\Posts::getFromDate(date('y-m-0'))->count(),
			'new_posts_week' => \App\Posts::getFromDate(date('y-m-d', strtotime('-7 day')))->count(),
			'new_posts_day' => \App\Posts::getFromDate(date('y-m-d', strtotime('-1 day')))->count(),
			'admin_messages' => $admin_messages->get(),
		);
		
 	 	return view('includes/admin/home')->with($data);
	}
	
}
