<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\UrlMapping;
use Redirect;

class UrlredirController extends Controller {
	public function redirUrl($id) {
		
		// $urlredir = UrlMapping::where('id', $id)->first();
		// return Redirect::away($urlredir->longurl);
		return Redirect::away ( UrlMapping::where ( 'id', $id )->first ()->longurl );
	}
}