<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SettingsController extends Controller {

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
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = array(
    		'categories' => "asdasdasd",
    		'users' => \App\User::get(),
    		'this_user' => \Auth::user()
		);
	

		return view('settings')->with($data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
	 	\Auth::user()->name = $_POST['name'];
		\Auth::user()->email = $_POST['email'];
		
		
		$theme = \App\Themes::where('theme_name', '=', $_POST['theme'])->first();
 
		\Auth::user()->theme_id = $theme->id;

		if (isset($_POST['password'])) {
			\Auth::user()->password = bcrypt($_POST['password']);
		}

		\Auth::user()->save();
		header('Location:'.url().'/settings');
		exit;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
