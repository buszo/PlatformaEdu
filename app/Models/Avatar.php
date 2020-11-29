<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'avatars';
    protected $fillable = ['hashName', 'user_id'];

    public function categories()
    {

    }
}
