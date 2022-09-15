<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ataque extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'daño_total'
    ];
}
