<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $someVar = 'Some text';
        return view('vendor.backpack.base.dashboard', compact('someVar'));
    }
}
