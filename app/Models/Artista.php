<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artista extends Model
{
    protected $table = 'artista';
    use HasFactory;

    protected $fillable = ['nombre'];
    public $timestamps = true;
}
