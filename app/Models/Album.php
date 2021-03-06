<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'album';
    use HasFactory;

    protected $fillable = ['nombre','idArtista','gestionLanzamiento'];
    public $timestamps = true;
}
