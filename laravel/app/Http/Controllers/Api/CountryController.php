<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Country;
use App\Traits\Api;

use Chrisbjr\ApiGuard\Http\Controllers\ApiGuardController;

class CountryController extends ApiGuardController
{

	use Api;
	
	protected $apiMethods = [];

	public function __construct(){
		parent::__construct();

		$this->setUserByApiKey();
	}

	public function getCountries( Request $request ){
		return $this->success( $this->paginate( Country::class, $request ) );
	}

	public function getCountry( Country $country, Request $request ){
		return $this->success( $country );
	}

}
