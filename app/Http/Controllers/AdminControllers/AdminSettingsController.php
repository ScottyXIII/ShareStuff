<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminSettingsController extends AdminController {

	public function __construct() 
	{	
		$this->active_nav = "settings";
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{	

		$themes = \App\Themes::all();
		$site_theme = \App\SiteTheme::first();

	 	$user_privileges = new \App\user_privileges(); 
	 	$user_privileges = $user_privileges->first();
	 	
	 	$add_categories = $user_privileges->add_categories;
	 	$search_users = $user_privileges->search_users;
	 	$post_editor = $user_privileges->full_post_editor;
	 	$change_theme = $user_privileges->change_theme;

 		$default_theme = \App\Themes::where('id', '=', $site_theme->default_theme_id)->get()[0];

		$data = array(
			'active_nav' => $this->active_nav,
			'site_theme' => $site_theme,
			'default_theme' => $default_theme,
			'themes' => $themes,
    		'add_categories' => $add_categories,
    		'search_users' => $search_users, 
    		'post_editor' => $post_editor, 
    		'change_theme' => $change_theme
		);
		
 	 	return view('includes/admin/settings')->with($data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		// user privileges
 
		$priv = \App\user_privileges::find(1);

		if (isset($_POST['user_priv']['add_cat'])) {
			$priv->add_categories = 1; 	
		} else {
			$priv->add_categories = 0; 
		}
		
		if (isset($_POST['user_priv']['search_user'])) {
			$priv->search_users = 1; 	
		} else {
			$priv->search_users = 0; 
		}
		
		if (isset($_POST['user_priv']['post_editor'])) {
			$priv->full_post_editor = 1; 	
		} else {
			$priv->full_post_editor = 0; 
		}
		
		if (isset($_POST['user_priv']['change_theme'])) {
			$priv->change_theme = 1; 	
		} else {
			$priv->change_theme = 0; 
		}
		
		$priv->save();

		// Default site Theme
		$site_theme = \App\SiteTheme::first(); 
		$site_theme->default_theme_id = $_POST['default_theme'];
		$site_theme->save();
		
		// Logo Text 
		$site_theme = \App\SiteTheme::find(1);
		$site_theme->logo_text = $_POST['logo-text'];
		$site_theme->save(); 

		// Logo
		$ext = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION); 

		if(isset($_FILES['logo'])) {
			if (move_uploaded_file($_FILES['logo']['tmp_name'], public_path() . '/logo'.'.'.$ext)) {
			
			}
		}

		header('Location:'.url().'/admin/settings');
		exit;
	}

}
