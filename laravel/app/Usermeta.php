<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usermeta extends Model
{

	protected $table = "usermeta";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'key', 'value'
    ];

    public function user(){
    	return $this->belongsTo( User::class );
    }
}
