<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;
    protected $table = "filmovi";
    protected $fillable = ['IDFilma','NazivFilma','Premijera','Cena','BrojKarta','Slika','Trajanje','Zanr','Opis','Glumci'];
    
}
