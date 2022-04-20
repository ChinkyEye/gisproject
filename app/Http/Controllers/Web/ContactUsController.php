<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\ContactUs;

class ContactUsController extends Controller
{
     public function index()
    {
    	$datas = ContactUs::get();
    	// dd($datas->phone);
    	return view('web.contactus', compact('datas'));
    }

}
