<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Developer;
use App\Models\User;

class DeveloperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function history()
    {
        return view('developers/history/index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/developer/editor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
