<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JojoController extends Controller
{
    //
    public function add()
    {
        return view('admin.jojo.create');
    }
}
