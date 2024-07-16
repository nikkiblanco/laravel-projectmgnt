<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'projects';
    protected $dates = ['due_date'];

    protected $fillable = [
        'project_name',
        'description',
        'due_date',
        'status',
    ];

    protected $casts = [
        'due_date' => 'datetime',
    ];

    public function tasks() {
        return $this->hasMany(Task::class);
    }

    public function getStatusTextAttribute()
    {
        $statusTexts = [
            0 => 'Todo',
            1 => 'In-progress',
            2 => 'Completed',
        ];

        return $statusTexts[$this->status] ?? '';
    }
}
