<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EchartsController extends Controller
{
    public function firstShow()
    {
        return view('echarts.first');
    }
}
