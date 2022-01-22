<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Project;
use App\Models\Developer;
use App\Models\Client;

class DashboardController extends Controller
{
    public function admin(Request $request) {
        //View dashboard admin
        $this->data['count'] = [
            'developer' => Developer::count(),
            'client' => Client::count(),
            'project_done' => Project::where('status', 'Selesai')->count(),
            'project_progress' => Project::where('status', 'Aktif')->count()
        ];
        $this->data['projects'] = Project::with(['client'])->where('status', 'Aktif')->orderBy('name', 'ASC')->get();
        return view('admin/index', $this->data);
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
