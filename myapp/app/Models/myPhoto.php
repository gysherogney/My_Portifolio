<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class myPhoto extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $table='my_photos';
}
