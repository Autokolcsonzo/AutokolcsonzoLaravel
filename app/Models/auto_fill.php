<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class auto_fill extends Model
{
    use HasFactory;

    protected $table = 'auto_fill';
    protected $primaryKey = ['alvazSzam'];
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'alvazSzam',
        'modell',
        'telephely',
        'napiAr',
        'szin',
        'statusz',
        'marka',
        'tipus',
        'modell',
        'evjarat',
        'kivitel',
        'uzemanyag',
        'teljesitmeny',
        'tulajdonsag',
        'kep',
        'extra_megnevezese',
        'megye',
        'ir_szam',
        'varos',
        'utca',
        'hazszam'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
