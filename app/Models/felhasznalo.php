<?php

namespace App\Models;

/* use Illuminate\Contracts\Auth\MustVerifyEmail; */
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/* use Illuminate\Foundation\Auth\User as Authenticatable; */
use Illuminate\Notifications\Notifiable;
/* use Laravel\Sanctum\HasApiTokens; */

class felhasznalo extends Model
{
    protected $table = 'felhasznalo';
    use HasFactory, Notifiable;

/*     public $timestamps = false;
    public $email = false; */

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
        protected $fillable = [
        /* 'name',
        'email',
        'password', */
        'vezeteknev',
        'keresztnev',
        'felhasznalonev',
        'jelszo',
        'szul_ido',
        'ir_szam',
        'megye',
        'varos',
        'utca',
        'hazszam',
        'tel_szam',
        'e_mail'
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