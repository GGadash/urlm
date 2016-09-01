<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\UrlMapping;
use Validator;


class GurlmapController extends Controller
{
    // Home
    public function showGurl() {
    $url_mappings = UrlMapping::orderBy('created_at', 'asc')->get();

    return view('welcome', [
        'url_mappings' => $url_mappings
    ]);
    }


	// Add URL
	public function addUrl (Request $request) {

    $validator = Validator::make($request->all(), [
        'longurl' => 'required|url|max:9999',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }
	
    $urlmapping = new UrlMapping;
    $urlmapping->longurl = $request->longurl;
    $urlmapping->save();

	return redirect('/urlinfo/'.$urlmapping->id);
	}


	// Delete URL
    public function delUrl (UrlMapping $urlmapping) {
    $urlmapping->delete();

    return redirect('/');
	}


	// Display Info
    public function displayInfo ($id) {
	
	$urlinfo = UrlMapping::where('id', $id)->first();
	
	return view('displayinfo', ['urlinfo' => $urlinfo]);
	
}

}

