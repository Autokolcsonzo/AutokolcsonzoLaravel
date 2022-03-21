<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class autoKepek extends Model
{
    use HasFactory;

    protected $table = 'auto_kepek';

    protected $fillable = [
        'kep'
    ];
}
