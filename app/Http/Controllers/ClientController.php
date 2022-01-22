<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Client;
use App\Models\Ticket;
use App\Models\Project;
use App\Models\User;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = Client::orderBy('fullname', 'ASC')->get();

        $this->data['clients'] = $client;

        return view('admin/client/index', $this->data);
    }
    public function developer()
    {
        return view('client/developer/index');
    }

    public function ticket()
    {
        return view('client/ticket/index');
    }
    
    public function report()
    {
        return view('client/report/index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/client/editor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clientParam = $request->except(['password', '_token']);
        $userParam = [
            'name' => $request->fullname,
            'password' => \Hash::make($request->password),
            'email' => $request->email,
            'role' => 'client'
        ];

        $user = User::create($userParam);

        if($user) {
            $clientParam['user_id'] = $user->id;
            $client = Client::create($clientParam);

            if($client) {
                return redirect(route('admin.client.index'))->with('success', 'Berhasil manambahkan client baru!');
            }
        }
        
        return redirect(route('admin.client.index'))->with('failed', 'Gagal manambahkan client baru!');
    }
    
    public function destroy($id)
    {
        $client = Client::find($id);
        
        if($client) {
            $user = User::find($client->user_id);
            $user->delete();
            $client->delete();
            return redirect(route('admin.client.index'))->with('failed', 'Berhasil menghapus data client!');
        }
        return redirect(route('admin.client.index'))->with('failed', 'Gagal menghapus data client!');
    }
}
