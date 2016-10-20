<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Category;
use App\Traits\Api;

use Chrisbjr\ApiGuard\Http\Controllers\ApiGuardController;

class CategoryController extends ApiGuardController
{
	
	use Api;
	
	protected $apiMethods = [];

	public function __construct(){
		parent::__construct();

		$this->setUserByApiKey();
	}

	public function getCategories( Request $request ){
		return $this->success( $this->paginate( Category::class, $request ) );
	}

	public function getCategory( Category $category, Request $request ){
		return $this->success( $category );
	}

}
