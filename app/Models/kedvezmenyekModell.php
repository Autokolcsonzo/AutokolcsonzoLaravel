<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KedvezmenyekModell extends Model
{
    use HasFactory;

    protected $table = 'kedvezmeny';
    //protected $primaryKey = ['tulajdonsag'];
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'szazalek',
        'naptol'
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
