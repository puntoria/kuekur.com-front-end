<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

use App\Exceptions\AuthException;

class Event extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'name',
        'save_to'    => 'slug',
    ];


    //
    protected $fillable = [
    	'name', 'start', 'featured_image_id', 'description', 'end', 'recurring', 'recurring_data', 'status', 'capacity', 'organizer_id', 'category_id', 'country_id', 'city_id', 'address_1', 'address_2', 'zip', 'latitude', 'longitude', 'created_at', 'updated_at'
    ];

    protected $dates = [
    	'start', 'end'
    ];

    public $timestamps = true;

    public function getRecurringDataAttribute( $value ){
    	return json_decode($value);
    }

	public function organizer(){
		return $this->belongsTo( User::class, 'organizer_id', 'id' );
	}

	public function category(){
		return $this->belongsTo( Category::class );
	}

	public function featured_image(){
		return $this->hasOne( MediaFile::class, 'id', 'featured_image_id' );
	}

	public function logo(){
		return $this->hasOne( MediaFile::class, 'id', 'logo_id' );
	}

	public function country(){
		return $this->hasOne( Country::class, 'id', 'country_id' );
	}

	public function city(){
		return $this->hasOne( City::class, 'id', 'city_id' );
	}

	public function fields(){
		return $this->hasMany( EventField::class );
	}

	public function tags(){
		return $this->belongsToMany( Tag::class );
	}

    public function attendedUsers(){
        return $this->belongsToMany( User::class );
    }

    public function getFeaturedImageIdAttribute(){
    	if( $this->attributes['featured_image_id'] )
	    	return $this->attributes['featured_image_id'];

	    $deafultName = 'event.png';
    	$default = MediaFile::where('filename', $deafultName)->first();
    	if(!$default){
    		\File::copy( public_path('images/defaults/'.$deafultName) , storage_path('app/'.$deafultName)  );
    		$default = MediaFile::create([ 'filename' => $deafultName ]);
    	}
    	return $default->id;
    }

    public function getFeaturedImageAttribute(){
	    return MediaFile::find( $this->featured_image_id );
    }

	public function syncEventTags( $tags ){

		if(!is_array($tags)){
			$tags = explode(",", $tags);
		}

		$tag_ids = [];

		foreach ($tags as $tagName) {
			$tag = Tag::firstOrCreate(['name' => trim($tagName) ]);
			$tag_ids[] = $tag->id;
		}

		$this->tags()->sync( $tag_ids );
	}

	public function updateEvent( $params ){
		if( \Auth::user()->can('update', $this) ){

			$this->update( $params );

			if( isset($params['tags']) ){
				$this->syncEventTags( $params['tags'] ); 
			}

			$this->resluggify();

		}else{
			throw new AuthException('Unauthorized to update this event');
		}

		return $this;
	}


	public static function filter( $params = [], $with = [] ){
		$events = Event::where('id', '>' , 1);

		foreach( $params as $key => $value ){

			if( $value == '' ){
				continue;
			}

			switch( $key ){
				case "name":
				case "description":
					$events = $events->where( $key, 'LIKE', "%{$value}%" );
					break;
				case "start":
				case "end":
					$value = strtotime($value);
					$value = Carbon::createFromTimestamp($value)->toDateTimeString();
					$compare = $key == 'start' ? '>' : '<';
					$events = $events->where('start', $compare, $value );
					break;
				case "recurring":
				case "status":
				case "zip":
					$events = $events->where($key , $value );
					break;
				case "organizer":
				case "category":
				case "country":
				case "city":
					$events = $events->where($key."_id" , $value );
					break;
				case "address":
					$events = $events->where(["address_1","address_2"] , 'LIKE' , "%{$value}%" );
					break;
				case "capacity_min": 
				case "capacity_max":
				case "latitude_min":
				case "latitude_max":
				case "longitude_min":
				case "longitude_max":
					$key = explode( "_", $key );
					$events = $events->where( $key[0], $key[1]=='max' ?'<' :'>' , $value );
					break;
			}
		}

		$page = isset( $params['page'] ) ? $params['page'] : 1;
		$perPage = isset( $params['perPage'] ) ? $params['perPage'] : 10;
		$order = isset( $params['order'] ) && in_array($params['order'],['desc','asc'])  ? $params['order'] : "desc";

		$events = $events->with( $with );

		return $events->orderBy( 'id', $order )->paginate( $perPage, array('*') , 'page' , $page );
	}

	public static function store( $params ){
		$event = Event::create( $params );

		if( isset($params['tags']) ){
			$event->syncEventTags( $params['tags'] ); 
		}

		return $event;
	}

}
