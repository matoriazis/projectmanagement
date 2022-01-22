<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('client')->orderBy('name', 'ASC')->get();
        $this->data['projects'] = $projects;
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
            
            return redirect(route('admin.project.index'))->with('success', 'Berhasi mengubah status project!');
        }
        return redirect(route('admin.project.index'))->with('failed', 'Gagal mengubah status project!');
    }

    public function update(Request $request, $id)
    {
        //
    }
}
