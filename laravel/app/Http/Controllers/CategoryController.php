<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Category;

class CategoryController extends Controller
{

	public function index(){
		$categories = Category::all();
		return view('categories/index', compact('categories'));
	}

	public function show( Category $category ){
		return view('categories/show', compact('category'));
	}

	public function edit( Category $category ){
		return view('categories/edit', compact('category'));
	}

	public function update( Category $category, Request $request ){
		$category->update( $request->all() );
		return redirect('categories/'.$category->id.'/edit');
	}

}
