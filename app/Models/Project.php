<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;
use App\Models\ProjectDeveloper;

class Project extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function client() {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function developers() {
        return $this->hasMany(ProjectDeveloper::class,'project_id');
    }
}
