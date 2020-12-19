<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datacrud extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'name', 'content'
    ];
}
