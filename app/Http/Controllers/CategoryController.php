<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;

use Session;

class CategoryController extends Controller
{
    public function index() {
    	$cats = Category::all();
    	return view('admin.category.index')->withCategories($cats);
    }

    public function store(Request $request) {
    	$this->validate($request, array(
         'name' => 'required|max:50',
         'slug' => 'required|unique:categories|alpha_dash|min:3|max:50',
         'parent_id' => 'integer'
         ));

    	$cat = new Category;
    	$cat->name = $request->name;
    	$cat->slug = $request->slug;
    	if( empty($request->parent_id)) {
    		$cat->parent_id = 0;
    	} else {
    		$cat->parent_id = $request->parent_id;
    	}
    	$cat->save();
    	Session::flash('success', 'Ктаегория "' . $cat->name . '" создана' );
    	return redirect()->route('admin.cat.index');
    }
}
