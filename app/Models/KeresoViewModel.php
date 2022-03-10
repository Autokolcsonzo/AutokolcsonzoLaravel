<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeresoViewModel extends Model
{
    use HasFactory;

    protected $table = 'keresoview';
    //protected $primaryKey = ['tulajdonsag'];
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'marka',
        'modell',
        'evjarat',
        'kivitel',
        'uzemanyag',
        'tulajdonsag',
        'varos'
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
