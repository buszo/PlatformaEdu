<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sheet extends Model
{
    protected $table = 'sheets';
    protected $fillable = ['title', 'content', 'desc', 'updated_at'];

    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
