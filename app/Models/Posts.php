<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model {

	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'posts';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['title', 'link', 'info, user_id'];

	public static function getFromDate($date)
	{
		return \App\Posts::where('created_at', '>', $date)->get();
	}
	
	public function user() 
	{ 
		return $this->hasOne('\App\User', 'id', 'user_id')->first();
	}

   public function type() 
    {
    	return $this->hasOne('\App\type', 'id', 'type_id');
    }

    public function categories()
    {
        return $this->belongsToMany('\App\categories', 'post_categories', 'post_id', 'categorie_id');
    }

    public static function getPostByCategory($category_id)
    {
    	$post_ids = \App\post_categories::where('categorie_id', '=', $category_id)->get();

    	$posts = new \App\Posts(); 
		
		$ids = array();
		foreach ($post_ids as $id) {
			$ids[] = $id->post_id;
		}

		$posts = \App\Posts::whereIn('id', $ids);
    	
    	return $posts->get();

    }

}
