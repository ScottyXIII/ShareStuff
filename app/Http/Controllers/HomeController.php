<?php namespace App\Http\Controllers;



class HomeController extends Controller {


	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = \App\Posts::where('id', '>', 0)->orderBy("created_at", "desc")->get();
		
		$search_info = ""; 

		if (isset($_GET['user'])) {
			$search_info = "You are viewing all posts by ". \App\User::find($_GET['user'])->name; 
			$posts = \App\Posts::where('user_id', '=', $_GET['user'])->orderBy("created_at", "desc")->get();
		}

		if (isset($_GET['category'])) {
			$search_info = "You are viewing all posts in ". \App\categories::find($_GET['category'])->name; 
			
			$posts = \App\Posts::getPostByCategory($_GET['category']);
		}

		if (isset($_GET['search'])) {
			
			$posts = \App\Posts::where('info', 'like', $_GET['search'].'%')
								->orWhere('title', 'like', $_GET['search'].'%')
								->orWhere('link', 'like', $_GET['search'].'%')
								->orderBy('created_at', 'desc')
								->get();
		
			$search_info = "Your search returned ".$posts->count()." Results"; 
		}

		$data = array(
    		'posts' => $posts,
    		'search_info' => $search_info,
    		'users' => \App\User::get()
		);
		
 	 	return  view('home')->with($data);

	}

	public function userPosts() 
	{
		$posts = \App\Posts::where('user_id', '=', \Auth::user()->id)->orderBy("created_at", "desc")->get();
		
		$search_info = ""; 

		$data = array(
    		'posts' => $posts,
    		'search_info' => \Auth::user()->name. '\'s posts', 
    		'users' => \App\User::get()
		);

		return view('home')->with($data);
	}

}
