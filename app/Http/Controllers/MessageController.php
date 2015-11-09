<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class MessageController extends Controller {

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
    		'messages' => \Auth::user()->getAllMessages(),
    		'users' => \App\User::get(),
    		'this_user' => \Auth::user()
		);
		
		return view('read-messages')->with($data);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function view($id)
	{
		// Make sure the Auth user is in dead the To id so people cant just type in URLs to read other peoples messashes. 
		
		$message = \App\Message::find($id);
 	
		if ($message->to != \Auth::user()->first()->id) {
			header('Location:'.url('message'));
			exit;
		}

		if ($message->read == 0) {
			$message->read = 1; 
			$message->save();
		}
		
		$data = array(
    		'message' => $message,
		);
		
		return view('view-message')->with($data);
	}

	public function setRead($id)
	{
		$message = \App\Message::find($id);
		$message->read = 1; 
		$message->save();

		header('Location:'.url().'/message');
		exit;
	}


	/**
	 * Display a view for a reply to a message.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function reply($id)
	{
		$data = array(
			'message' => \App\Message::find($id),
		);
		
 	 	return view('message-reply')->with($data);	
	}

	/* Display a view for a reply to a message.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function create($id)
	{
		$data = array(
			'message' => null,
			'to' => $id,
		);
		
 	 	return view('message-reply')->with($data);	
	}



	/**
	 * Display a view for a reply to a message.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function send()
	{
		\App\Message::send($_POST['user_id'], $_POST['sender_id'], $_POST['title'], $_POST['message']);

		header('Location:'.url().'/message');
		exit;
	}

	/* Display a view for a reply to a message.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($id)
	{
		$message = \App\Message::find($id)->delete();

		header('Location:'.url().'/message');
		exit; 
	}

}
