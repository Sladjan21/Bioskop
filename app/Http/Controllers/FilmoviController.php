<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Log\Logger;
use Illuminate\Support\ViewErrorBag;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class FilmoviController extends Controller
{

    public function __construct()
    {
        
    }

    public function prikaziSveFilmove()
    {
        $filmovi = DB::select("Select distinct(f.IDFilma),f.NazivFilma,f.Slika,f.Cena,f.Premijera,date_format(v.Vreme,'%H:%i') as Vreme from filmovi f join vremeprikaza v on f.IDFilma = v.IDFilma");
        $vreme = DB::select("Select IDFilma,IDVreme,date_format(Vreme,'%H:%i') as Vreme from vremeprikaza v");
        return view('filmovi', ['filmovi' => $filmovi, 'vreme' => $vreme]);
    }

    public function prikaziFilm($id)
    {
        $film = DB::select("Select * from filmovi where IDFilma = " . $id);
        // $film = Film::where('IDFilma',$id)->get();
        // Log::info($film);
        return view('pregledFilma', ['film' => $film]);
    }

    public function pregledKarte($id)
    {
        if(!Gate::allows('authMovieReserve'))
        {
            return redirect('/login');
        }

        $konkretanFilm = DB::select("Select * from filmovi f where f.IDFilma=" . $id);
        $vremePrikazaFilma = DB::select("Select * from vremeprikaza v where v.IDFilma =" . $id);
    
        
    
        return view("pregledKarte", ['film' => $konkretanFilm, 'vreme' => $vremePrikazaFilma,'message' =>'']);
    }


}
