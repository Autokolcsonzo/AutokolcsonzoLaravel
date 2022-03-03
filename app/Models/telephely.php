<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telephely extends Model
{
    use HasFactory;

    protected $fillable = [
        'megye',
            'ir_szam',
            'varos',
            'utca',
            'hazszam'
    ];
}