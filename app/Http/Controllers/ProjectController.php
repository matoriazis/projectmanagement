<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Project;
use App\Models\Developer;
use App\Models\ProjectDeveloper;

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

    public function update(Request $request, $id)
    {
        //
    }
}
