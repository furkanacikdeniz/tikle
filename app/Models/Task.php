<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
    'title',
    'description',
    'due_date',
    'status',
    'type',
    'user_id',
    'team_id',
];
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
    public function assignedUsers()
{
    return $this->belongsToMany(User::class, 'task_user', 'task_id', 'user_id');
}


}
