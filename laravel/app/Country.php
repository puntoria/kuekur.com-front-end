<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Traits\XModel;

class Country extends Model
{

	use XModel;

	protected $fillable = [
		'name'
	];

	public function cities(){
		return $this->hasMany( City::class );
	}

}
