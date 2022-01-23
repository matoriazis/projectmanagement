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
        $cId = \Auth::user()->client->id;

        $this->data['counter'] = [
            'active' => Project::where('client_id', $cId)->where('status', 'Aktif')->count(),
            'done' => Project::where('client_id', $cId)->where('status', 'Selesai')->count(),
            'total' => Project::where('client_id', $cId)->count(),
        ];
        return view('client/index', $this->data);
    }

    public function developer(Request $request) {
        //View dashboard developer
        $devId = \Auth::user()->developer->id;

        $pd = \DB::select(\DB::raw("SELECT p.*, pd.developer_id 
        from projects p 
        join project_developers pd on p.id = pd.project_id
        where p.status = ?
        and pd.developer_id = ?"), ['Aktif', $devId]);


        $data = [];

        if(count($pd) > 0) {
            foreach($pd as $item) {
                $temp = [
                    'project_name' => $item->name
                ];

                $temp['counter'] = [
                    'todo' => Ticket::where('project_id', $item->id)->where('status', Ticket::BELUMDIKERJAKAN)->count(),
                    'in_progress' => Ticket::where('project_id', $item->id)->where('assigned_by', $devId)->where('status', Ticket::DIKERJAKAN)->count(),
                    'done' => Ticket::where('project_id', $item->id)->where('assigned_by', $devId)->where('status', Ticket::SELESAI)->count(),
                ];

                $temp['my_inprogress_ticket'] = Ticket::where('project_id', $item->id)
                                                        ->where('assigned_by', $devId)->where('status', Ticket::DIKERJAKAN)->get();

                $data[] = $temp;
            }
        }

        $this->data['dashboard_data'] = $data;
        return view('developers/index', $this->data);
    }
}
