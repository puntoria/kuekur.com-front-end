<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\MediaFile;

class MediaController extends Controller
{

	public function getMedia( $file, $size = null ){
		$filePath = MediaFile::getPath( $file, $size );
		$image = \Image::make( $filePath );
		return $image->response();
	}

}
