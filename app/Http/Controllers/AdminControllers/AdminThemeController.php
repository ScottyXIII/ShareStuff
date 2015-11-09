<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminThemeController extends AdminController {

	public function __construct() 
	{	
		$this->active_nav = "theme";
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{	
		$themes = \App\Themes::all();

		$data = array(
			'active_nav' => $this->active_nav,
			'themes' => $themes,
		);
		
 	 	return view('includes/admin/css')->with($data);
	}

	/**
	 * View a Theme.
	 *
	 * @return Response
	 */
	public function view($id)
	{
		$theme = \App\Themes::where('id', '=', $id)->first();

		$_GET['page'] = 'css';

		$data = array(
			'active_nav' => $this->active_nav,
			'theme' => $theme,
		);
		
 	 	return view('includes/admin/editTheme')->with($data);
	}

	public function create()
	{
		$theme = new \App\Themes();

		$theme->file_name = $_FILES['theme']['name'];
		$theme->theme_name = $_POST['themeName'];	

		if (move_uploaded_file($_FILES['theme']['tmp_name'], public_path() . '/css/'.$theme->file_name)) {
			$theme->save();	
		}

		header('Location:'.url().'/admin/theme');
		exit;
	}

	/**
	 * Update a Theme.
	 *
	 * @return Response
	 */
	public function update($id)
	{
		$theme = \App\Themes::where('id', '=', $id)->first();

		$theme->theme_name = $_POST['themeName'];
 		
 		$theme->save();

 		header('Location:'.url().'/admin/theme');
		exit;
	}

	public function delete($id)
	{
		$theme = \App\Themes::find($id);

 		$theme->delete();

 		header('Location:'.url().'/admin/theme');
		exit;
	}


}
