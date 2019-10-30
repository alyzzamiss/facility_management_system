<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'Facilities Management System';
    	return view('page.index')->with('title', $title);
    }
}

