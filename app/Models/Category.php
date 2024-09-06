<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description','user_id'];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function user()
{
    return $this->belongsTo(User::class);
}
}
