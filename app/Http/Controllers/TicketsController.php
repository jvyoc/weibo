<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
            'content' => 'required'
        ]);

        Auth::user()->tickets()->create([
            'content' => $request['content'],
            'prio'=> $request['prio'],
            'status' => $request['status']
        ]);
         session()->flash('success', '发布成功！');
        return redirect()->back();
    }


}
