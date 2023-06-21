<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class WebController extends Controller
{
    //
    function index(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255|string',
            'email' => 'required|email',
            'message' => 'required'
        ]);
        
        $data = Http::post('https://blogssmart.com/api/healthcare',$request->only(['name','email','message']));
        return redirect()->back()->with('message','Email Sent');
    }
}
