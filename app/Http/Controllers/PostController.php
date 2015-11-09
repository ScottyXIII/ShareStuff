<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PostController extends Controller {


	public $model;
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');

		$this->model = new \App\Posts(); 
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories = \App\categories::all(); 
		

		$data = array(
    		'categories' => $categories
		);
	

		return view('new-post')->with($data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->model->title = $_POST['post']['title']; 
		$this->model->info = $_POST['post']['info'];
		$this->model->link = $_POST['post']['link'];
		$this->model->user_id = \Auth::user()->id;
		
		$matches = null; 
		preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $_POST['post']['link'], $matches);
		
		if ($matches != null) {
			$this->model->type_id = 1; 
			$this->model->link = $matches[0];
		} else {
			$this->model->type_id = 2; 
		}

		$this->model->save();
		
		if (isset($_POST['categories'])) {
			foreach ($_POST['categories'] as $categorie) {
				$post_categories = new \App\post_categories;
				$post_categories->post_id = $this->model->id; 
				$post_categories->categorie_id = $categorie;
				$post_categories->save();
			}
		}
		
		header('Location:'.url());
		exit;
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
	public function update($id)
	{
		die("updating!!");
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
