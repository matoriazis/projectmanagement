<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin(Request $request) {
        //View dashboard admin
        return view('admin/index');
    }

    public function client(Request $request) {
        //View dashboard client
        return view('client/index');
    }

    public function developer(Request $request) {
        //View dashboard developer
        return view('developers/index');
    }
}
