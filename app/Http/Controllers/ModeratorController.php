<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModeratorController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $podaciKorisnika = DB::select('SELECT * FROM filmoviusers uf JOIN users u ON uf.IDusera = u.id');
        $podaciFilma = DB::select('select *,date_format(vp.Vreme,"%H:%i") as VremeProjekcije from filmoviusers fu join filmovi f on f.IDFilma = fu.IDFilma join vremeprikaza vp on vp.IDVreme = fu.vreme');
        
// select *,date_format(vp.Vreme,"%H:%i") as VremeProjekcije from filmoviusers fu join filmovi f on f.IDFilma = fu.IDFilma join vremeprikaza vp on vp.IDVreme = fu.vreme
        return view('moderatorPocetna',['korisnik' => $podaciKorisnika, 'filmovi' => $podaciFilma]);
    }

    
}
