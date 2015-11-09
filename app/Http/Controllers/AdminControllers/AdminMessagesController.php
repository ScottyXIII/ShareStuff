<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminMessagesController extends AdminController {

	public function __construct() 
	{	
		$this->active_nav = "messages";
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
			'messages' => \App\AdminMessages::all(),
		);
		
 	 	return view('includes/admin/admin-messages')->with($data);
	}

	/**
	 * View the resource.
	 *
	 * @return Response
	 */
	public function view($id)
	{
		$data = array(
			'active_nav' => $this->active_nav,
			'message' => \App\AdminMessages::find($id),
		);
		
 	 	return view('includes/admin/admin-read-message')->with($data);	
	}

	/**
	 * View the resource.
	 *
	 * @return Response
	 */
	public function reply($id)
	{
		$data = array(
			'active_nav' => $this->active_nav,
			'message' => \App\AdminMessages::find($id),
		);
		
 	 	return view('includes/admin/admin-message-reply')->with($data);	
	}

	public function sendReply()
	{	
		\App\Message::send($_POST['user_id'], 4, $_POST['title'], $_POST['message']);

		header('Location:'.url().'/admin/messages');
		exit;
	}

	
	public function send($id)
	{	
		$user = \App\User::find($id);
		
		$data = array(
			'active_nav' => $this->active_nav,
			'user' => $user,
		);
		
 	 	return view('includes/admin/admin-message-send')->with($data);	
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
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($id)
	{
		 \App\AdminMessages::find($id)->delete();

	 	header('Location:'.url().'/admin/messages');
		exit;
	}

}
