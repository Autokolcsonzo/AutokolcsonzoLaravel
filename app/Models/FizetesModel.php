<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FizetesModel extends Model
{
    use HasFactory;

    protected $table = 'fizetes';
    protected $primaryKey = 'kifizetes_id';
   

    protected $fillable = [
        'kifizetes_id',
        'fogl_azonosito',
        'kelt',
        'sorszam',
        'fizetes_alapja',
        'befizetett_osszeg',
        'kifizetendo_osszeg',
        'created_at',
        'updated_at'
    ];
}
