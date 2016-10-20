<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

use App\Traits\XModel;

class Category extends Model implements SluggableInterface
{
    use SluggableTrait, XModel;

    protected $sluggable = [
        'build_from' => 'name',
        'save_to'    => 'slug',
    ];
    
    //
    protected $fillable = [
    	'name', 'fields'
    ];
}
