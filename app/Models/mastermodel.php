<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mastermodel extends Model
{
    use HasFactory;
    protected $table='mastertable';
    public $timestamps ='false';
}
