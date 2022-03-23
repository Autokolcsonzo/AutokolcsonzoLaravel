<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telephely extends Model
{
    use HasFactory;

    protected $table = 'telephely';
    protected $primaryKey = 'telephely_id';

    protected $fillable = [
        'megye',
            'ir_szam',
            'varos',
            'utca',
            'hazszam'
    ];
}