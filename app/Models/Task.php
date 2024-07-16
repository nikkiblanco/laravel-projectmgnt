<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $table = 'tasks';
    protected $dates = ['due_date'];

    protected $fillable = [
        'project_id',
        'user_id',
        'task_name',
        'description',
        'due_date',
        'priority',
    ];

    protected $casts = [
        'due_date' => 'datetime',
    ];

    public function project() {
        return $this->belongsTo(Project::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getPriorityTextAttribute()
    {
        $priorityTexts = [
            0 => 'Low',
            1 => 'Medium',
            2 => 'High',
        ];

        return $priorityTexts[$this->priority] ?? '';
    }
   
}
