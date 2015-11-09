<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminUsersController extends AdminController {

	public function __construct() 
	{	
		$this->active_nav = "users";

		$this->data = array(
			'active_nav' => $this->active_nav,
		);
	}

	/**
	 * Display a listing of Users.
	 *
	 * @return Response
	 */
	public function index()
	{	
		$users = \App\User::get();

		$this->data['users'] = $users; 

 	 	return view('includes/admin/manage-users')->with($this->data);
	}

	/**
	 * View a user
	 *
	 * @return Response
	 */
	public function view($id)
	{	
		$user = \App\User::find($id);
		
		$this->data['name'] = ucfirst($user->name);
		$this->data['email'] = $user->email;
		$this->data['date_joined'] = $user->created_at; 
		//$data['num_posts'] = $user->id;

 	 	return view('includes/admin/view-user')->with($this->data);
	}

	/**
	 * Edits a user
	 *
	 * @return Response
	 */
	public function edit($id)
	{	
		$user = \App\User::find($id);
		
		$this->data['user'] = $user;
		$this->data['posts'] = $user->posts();
		
		$this->data['ban_post_id'] = \App\Restrictions::where('name', '=', 'posting')->first()->id;
 	 	$this->data['ban_cat_id'] = \App\Restrictions::where('name', '=', 'categories')->first()->id;
 	 	$this->data['ban_message_id'] = \App\Restrictions::where('name', '=', 'messages')->first()->id;

 	 	$this->data['delete_post_reasons'][] = "Bad language";
 		$this->data['delete_post_reasons'][] = "Inappropriate";
		$this->data['delete_post_reasons'][] = "Offensive";
 		$this->data['delete_post_reasons'][] = "Unreadable";
		$this->data['delete_post_reasons'][] = "Bad link";
	
 	 	return view('includes/admin/edit-user')->with($this->data);
	}


	/**
	 * Update a user
	 *
	 * @return Response
	 */
	public function update($id)
	{	
		$user = \App\User::find($id);
		
 		$user->name = $_POST['name'];
		$user->email = $_POST['email'];

		$restrictions = new \App\UserRestrictions();

		foreach($restrictions->where('user_id', '=', $id)->get() as $res) {
			$res->delete();
		}

		if (isset($_POST['ban_post'])) {
			$restrictions = new \App\UserRestrictions();
			$restrictions->user_id = $id;
			$restrictions->restriction_id = $_POST['ban_post'];
			$restrictions->save();
		}
		if (isset($_POST['ban_cat'])) {
			$restrictions = new \App\UserRestrictions();
			$restrictions->user_id = $id;
			$restrictions->restriction_id = $_POST['ban_cat'];
			$restrictions->save();
		}
		if (isset($_POST['ban_message'])) {
			$restrictions = new \App\UserRestrictions();
			$restrictions->user_id = $id;
			$restrictions->restriction_id = $_POST['ban_message'];
			$restrictions->save();
		}
		
		$user->super_user = 0;
		if (isset($_POST['super_user'])) {
			$user->super_user = 1;
		}

		// Include any ban settings.

 		$user->save();

 	 	header('Location:'.url('admin/users/edit/'.$id));
		exit;
	}

	/**
	 * Deletes a user
	 *
	 * @return Response
	 */
	public function delete($id)
	{
		$user = \App\User::find($id);
		
		$user->delete();

		header('Location:'.url('admin/users'));
		exit;
	}

}
