<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

	public function categories()
    {
        return $this->belongsToMany('App\Category', 'cat_post', 'cat_id', 'post_id');
    }


    public function hasAnyCat()
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasCat($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasCat($roles)) {
                return true;
            }
        }
        return false;
    }
    //if ($this->categories()->where('name', $role)->first()) {
    public function hasCats()
    {
        return $this->categories()->all();
    }


    protected $table="posts";
    protected $fillable=['title','content','comments_enable'];
}
