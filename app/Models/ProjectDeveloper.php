<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Project;
use App\Models\Developer;
use App\Models\User;


class ProjectDeveloper extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function project() {
        return $this->belongsTo(Project::class, 'project_id');
    }
    
    public function developer() {
        return $this->belongsTo(Developer::class, 'developer_id');
    }
    
    public function user() {
        return $this->belongsTo(User::class, 'created_id');
    }
}
