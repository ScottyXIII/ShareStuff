<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminPostsController extends AdminController {

	public function __construct() 
	{	
		$this->active_nav = "posts";
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
  		$data = array(
			'active_nav' => $this->active_nav,
			'posts' => \App\Posts::all(),
		);
		
 	 	return view('includes/admin/manage-posts')->with($data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{	
		$post = \App\Posts::find($id);

		$data = array(
			'edit_post_reasons' => array('Bad language', 'Unreadable', 'Inappropriate', 'Offensive', 'Bad  Link'),
			'post' => $post,
			'active_nav' => $this->active_nav,
		);
		
 	 	return view('includes/admin/edit-posts')->with($data);
	}

	/**
	 * Update the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{	
		$post = \App\Posts::find($id);


		$post->title = $_POST['post']['title'];
		$post->link = $_POST['post']['link'];
		$post->post = $_POST['post']['post'];
		$post->info = $_POST['post']['info'];

		$post->save(); 

		if (isset($_POST['categories'])) {
			\App\post_categories::where('post_id', '=', $id)->delete();

			foreach($_POST['categories'] as $cat) {
				$model = new \App\post_categories();
				$model->post_id = $id; 
				$model->categorie_id = $cat;
				$model->save();
			}
		}
		
		// Send a message to user 

		$reason = $_POST['reason'];
		if (isset($_POST['other_reason']) && $_POST['other_reason'] != "") {
			$reason = $_POST['other_reason'];
		} else {
			$reason = $_POST['reason'];
		}

		$message = "Your post has been edited due to the following reason: ".$reason;
		\App\Message::send($post->user()->id, 2, "Your post has been edited", $message);

 	 	header('Location:'.url('admin/posts/edit/'.$id));
		exit;
	}

	/**
	 * Delete the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($id)
	{
		$post = \App\Posts::find($id);
		
		$user_id = $post->user()->id;

		$post->delete();
		
		// Send a message to the user. 
 
		$reason = $_POST['reason'];
		if (isset($_POST['other_reason']) && $_POST['other_reason'] != "") {
			$reason = $_POST['other_reason'];
		} else {
			$reason = $_POST['reason'];
		}

		$message = "Your post has been removed due to the following reason: ".$reason;
		\App\Message::send((int)$_POST['user_id'], 0, "Your post has been removed", $message);

		header('Location:'.url('admin/users/edit/'.$user_id));
		exit;
	}

}
