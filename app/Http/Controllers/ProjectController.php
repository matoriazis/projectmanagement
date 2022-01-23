<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Project;
use App\Models\Developer;
use App\Models\ProjectDeveloper;
use App\Models\Ticket;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with(['client', 'developers.developer'])->orderBy('name', 'ASC')->get();
        $developers = Developer::orderBy('fullname', 'ASC')->get();
        $this->data['projects'] = $projects;
        $this->data['developers'] = $developers;
        return view('admin/project/index', $this->data);
    }

    public function create()
    {
        $clients = Client::orderBy('fullname', 'ASC')->get();
        $this->data['clients'] = $clients;
        return view('admin/project/editor', $this->data);
    }

    public function store(Request $request)
    {
        $params = $request->except(['_token']);
        $params['status'] = 'Aktif';
        $create = Project::create($params);

        if($create) {
            return redirect(route('admin.project.index'))->with('success', 'Berhasil menambahkan project baru!');
        }
        return redirect(route('admin.project.index'))->with('failed', 'Gagal menambahkan project baru!');
    }
    
    public function markAsDone($id)
    {
        $project = Project::find($id);
        
        if($project) {
            $project->status = 'Selesai';
            $project->update();
            
            return redirect(route('admin.project.index'))->with('success', 'Berhasil mengubah status project!');
        }
        return redirect(route('admin.project.index'))->with('failed', 'Gagal mengubah status project!');
    }

    public function assignDeveloper(Request $request) {
        $devs = $request->developer;
        $projectId = $request->project_id;

        $createdId = \Auth::user()->id;

        foreach($devs as $dev) {
            $param = [
                'project_id' => $projectId,
                'developer_id' => $dev,
                'created_id' => $createdId
            ];
            $projectDev = ProjectDeveloper::where('project_id', $projectId)->where('developer_id', $dev)->first();
            if(!$projectDev) {
                ProjectDeveloper::create($param);
            }
        }

        return redirect(route('admin.project.index'))->with('success', 'Berhasil menambahkan developer kedalam project!');
        
    }
    
    public function removeAssignedDeveloper(Request $request) {
        $pd = ProjectDeveloper::find($request->id);
        if($pd) {
            $pd->delete();
            return redirect(route('admin.project.index'))->with('success', 'Berhasil mengeluarkan developer dari tim!');
        }
        return redirect(route('admin.project.index'))->with('failed', 'Gagal mengeluarkan developer dari tim, silahkan coba lagi!');
    }

    // DEVELOPER SECTION
    public function developerProject(Request $request)
    {
        $dev = \Auth::user()->developer;

        if($dev) {
            $pd = ProjectDeveloper::with('project.client')->where('developer_id', $dev->id)->get();
            $this->data['projects'] = $pd;
            return view('developers/project/index', $this->data);
        }
        return redirect(route('developer.index'))->with('failed', 'Gagal mengeluarkan developer dari tim, silahkan coba lagi!');
    }
    
    public function developerProjectDetail($id, Request $request) {
        $project = Project::find($id);
        
        if($project) {
            $devId = \Auth::user()->developer->id;
            $pd = ProjectDeveloper::where('developer_id', $devId)->where('project_id', $id)->first();

            if($pd) {
                $ticketTodo = Ticket::where('project_id', $id)->where('assigned_by', '!=', $devId)
                                    ->orWhere('project_id', $id)->where('assigned_by', null)->get();
                $myTickets = Ticket::where('project_id', $id)->where('assigned_by', $devId)->get();
                

                $this->data['todo_tickets'] = $ticketTodo;
                $this->data['my_tickets'] = $myTickets;
                $this->data['project'] = $project;

                return view('developers.project.detail', $this->data);
            }
            
            return redirect(route('developer.project'))->with('failed', 'Anda tidak memiliki akses!');
        }
        return redirect(route('developer.project'))->with('failed', 'Project tidak ditemukan!');
    }

    public function developerHistory()
    {
        $devId = \Auth::user()->developer->id;

        $pd = \DB::select(\DB::raw("SELECT p.*, pd.developer_id 
        from projects p 
        join project_developers pd on p.id = pd.project_id
        where p.status = ?
        and pd.developer_id = ?"), ['Selesai', $devId]);

        $this->data['projects'] = $pd;
        return view('developers/history/index', $this->data);
    }

    // CLIENT SECTION
    public function clientProject(Request $request) {
        return view('client.project.index', $this->data);
    }
}
