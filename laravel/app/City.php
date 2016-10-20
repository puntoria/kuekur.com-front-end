<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Traits\XModel;

class City extends Model
{
	use XModel;

	protected $fillable = [
		'name'
	];

	public function country(){
		return $this->belongsTo( Country::class );
	}

}
