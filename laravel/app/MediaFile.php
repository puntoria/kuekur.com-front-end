<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MediaFile extends Model
{
	protected static $sizes = [
		'thumb' => [370,200,true],
		'single-event-thumb' => [330,200,true]
	];

	protected $fillable = [
		'filename', 'user_id'
	];

    protected $appends = ['url'];

	public function getUrlAttribute(){
		return $this->url();
	}

	public function url( $size = null ){
		return MediaFile::app_url( $this->filename, $size );
	}

	public function path( $size = null ){
		return MediaFile::getPath( $this->filename, $size );
	}

	public static function getPath( $filename, $size = null ){
		return MediaFile::generateSize( $filename, $size );
	}

	public static function generateSize( $filename, $size = null){
		if( $size == null ){
			return MediaFile::app_path( $filename );
		}

		$ext = pathinfo( $filename , PATHINFO_EXTENSION );
		$basename = pathinfo( $filename , PATHINFO_FILENAME );

		$sizeObj = MediaFile::$sizes[$size];
		if( !isset( $sizeObj ) ){
			throw new Exception("Size {$size} does not exist");
		}

		$size_ext = [];
		if($sizeObj[0]) $size_ext[] = "W".$sizeObj[0];
		if($sizeObj[1]) $size_ext[] = "H".$sizeObj[1];
		if($sizeObj[2]) $size_ext[] = "C1";
		else $size_ext[] = "C2";

		$size_ext = "_resize_" . implode("_", $size_ext);

		$size_filename = "{$basename}{$size_ext}.{$ext}";


		if( !\File::exists( MediaFile::app_path($size_filename) ) ){

			$img = \Image::make( MediaFile::app_path($filename) );

			if( $sizeObj[2] == true ){
				$img->fit($sizeObj[0], $sizeObj[1]);
			}else{
	        	$img->resize($sizeObj[0], $sizeObj[1], function($constraint){
	        		$constraint->aspectRatio();
	        	});
			}
	        $img->save( MediaFile::app_path($size_filename) );
		}

		return MediaFile::app_path( $size_filename );
	}

	public static function createFromUpload( $files ){
		if( is_array($files) ){
			$images = [];
			foreach( $files as $img ){
				$image = MediaFile::uploadImage( $img );
				$images[] = MediaFile::create_media_file( $image['filename'] );
			}
			return $images;
		}else{
			$image = MediaFile::uploadImage( $files );
			return MediaFile::create_media_file( $image['filename'] );
		}
	}

	protected static function create_media_file( $filename ){
		return MediaFile::create(['filename' => $filename, 'user_id' => \Auth::user()->id ]);
	}

	protected static function app_url( $filename, $size = null ){
		return url("media/{$filename}" . (($size != null) ? "/{$size}" : '') );
	}

	protected static function app_path( $filename ){
		return storage_path("app/{$filename}");
	}
	
	protected static function uploadImage( $image ){
		// Extension
		$ext = $image->getClientOriginalExtension();

		// Filename
        $filename  = time() . '.' . $ext;

        // Path
        $path = MediaFile::app_path($filename);

        // Intervention Image
        $int_image = \Image::make($image->getRealPath())->save($path);

        return compact('image', 'path', 'int_image', 'ext', 'filename');
	}

}
