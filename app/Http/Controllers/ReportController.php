<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ReportController extends Controller
{
    public function index(Request $request) {
        $projects = Project::orderBy('name', 'asc')->get();
        $this->data['projects'] = $projects;
        return view('admin.report.index', $this->data);
    }

    public function create(Request $request) {
        $projectId = $request->project_id;

        return 'create report';
    }
}
