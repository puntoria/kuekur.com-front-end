<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventField extends Model
{

	protected $fillable = [
		'key', 'value'
	];


	public function event(){
		return $this->belongsTo( Event::class );
	}

}
