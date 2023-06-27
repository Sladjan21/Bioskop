<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\ViewErrorBag;

class FilmoviController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function prikaziSveFilmove()
    {
        $filmovi = DB::select("Select distinct(f.IDFilma),f.NazivFilma,f.Cena,f.Premijera,v.Vreme from filmovi f join vremeprikaza v on f.IDFilma = v.IDFilma");
        $vreme = DB::select("select * from vremeprikaza v");
        return view('filmovi',['filmovi' => $filmovi,'vreme'=>$vreme]);
    }

    
   public function pregledKarte($id)
   {
        $konkretanFilm = DB::select("Select * from filmovi f where f.IDFilma=".$id);
        $vremePrikazaFilma = DB::select("Select * from vremeprikaza v where v.IDFilma =".$id);
        return view("pregledKarte",['film' => $konkretanFilm,'vreme' => $vremePrikazaFilma]);
   }

}
