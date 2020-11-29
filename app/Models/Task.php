<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'task';
    protected $fillable = ['title', 'description'];

    protected $attributes = [
        'createdBy' => 0,
    ];
    use HasFactory;
}
