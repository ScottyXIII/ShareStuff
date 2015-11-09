<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CategoriesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * return view to add a new category
	 *
	 * @return Response
	 */
	public function add()
	{	
		$data = array(); 

 	 	return view('add-category')->with($data);
	}

	/**
	 * Creates a new categorie
	 *
	 * @return Response
	 */
	public function create()
	{
		$category = new \App\Categories();

		$category->name = $_POST['name'];
		$category->save(); 

		header('Location:'.url());
		exit;
	}
 


}
