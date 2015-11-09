<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminUsersPasswordController extends AdminController {

	public function __construct() 
	{	
		$this->active_nav = "users";

		$this->data = array(
			'active_nav' => $this->active_nav,
		);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{	
		$user = \App\User::find($id);
		
		$this->data['name'] = ucfirst($user->name);
		$this->data['id'] = $user->id;

		return view('includes/admin/reset-password')->with($this->data);
	}

	/**
	 * Update the specified resource in storage - POST
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = \App\User::find($id);

		$user->password = bcrypt($_POST['password']);
		$user->save();

		header('Location:'.url().'/admin/users');
		exit;
	}


}
