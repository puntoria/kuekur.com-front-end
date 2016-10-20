<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\City;
use App\Traits\Api;

use Chrisbjr\ApiGuard\Http\Controllers\ApiGuardController;

class CityController extends ApiGuardController
{

	use Api;
	
	protected $apiMethods = [];

	public function __construct(){
		parent::__construct();

		$this->setUserByApiKey();
	}

	public function getCities( Request $request ){
		return $this->success( $this->paginate( City::class, $request ) );
	}

	public function getCitiesByCountry( $countryId, Request $request ){
		return $this->success( $this->paginate( City::class, $request, ['country_id'=>$countryId] ) );
	}

	public function getCity( City $city, Request $request ){
		return $this->success( $city );
	}

}
