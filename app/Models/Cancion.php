<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cancion extends Model
{
    protected $table = 'cancion';
    use HasFactory;

    protected $fillable = ['nombre','idAlbum','nroReproducciones'];
    public $timestamps = true;
}
