<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Ticket extends Model
{
    use HasFactory;

    public const BELUMDIKERJAKAN = 'Belum Dikerjakan';
    public const DIKERJAKAN = 'Sedang Dikerjakan';
    public const SELESAI = 'Selesai';

    protected $guarded = ['id'];

    public function assign() {
        return $this->belongsTo(User::class, 'assigned_by');
    }

    public function user() {
        return $this->belongsTo(User::class, 'created_id');
    }
}
