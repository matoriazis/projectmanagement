<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Developer;
use App\Models\User;

class DeveloperController extends Controller
{
    public function index()
    {
        $dev = Developer::orderBy('fullname', 'ASC')->get();
        $this->data['developers'] = $dev;
        return view('admin/developer/index', $this->data);
    }

    public function ticket()
    {
        return view('developers/ticket/index');
    }

    public function create()
    {
        return view('admin/developer/editor');
    }

    public function store(Request $request)
    {
        $devParams = $request->except(['password', '_token']);
        $userParam = [
            'name' => $request->fullname,
            'password' => \Hash::make($request->password),
            'email' => $request->email,
            'role' => 'developer'
        ];

        $user = User::create($userParam);

        if($user) {
            $devParams['user_id'] = $user->id;
            $client = Developer::create($devParams);

            if($client) {
                return redirect(route('admin.developer.index'))->with('success', 'Berhasil manambahkan developer baru!');
            }
        }
        
        return redirect(route('admin.developer.index'))->with('failed', 'Gagal manambahkan developer baru!');
    }
}
