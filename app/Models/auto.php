<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    /* protected $table = 'auto'; */
    use HasFactory;
    
    protected $table = 'auto';
    protected $primaryKey = ['alvazSzam'];
    public $incrementing = false;
    public $timestamps = false;
}