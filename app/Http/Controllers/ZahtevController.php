<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;


class ZahtevController extends Controller
{


    public function __construct()
    {
    }

    public function ZahtevZaRezervaciju(Request $request)
    {

        $idFilma = $request['nId'];
        $vreme = $request['nVreme'];
        $karte = $request['nKarte'];
        $ime = $request['nImeFilma'];
        $cena = $request['nCena'];
        
        $vremePrikaza = DB::select("select * from vremeprikaza where IDVreme = ?",[$vreme]);
        $stanjeKarta = DB::select("select BrojKarta from filmovi where IDFilma = ?", [$idFilma]);

        if ($stanjeKarta[0]->BrojKarta - $karte < 0) {
            return Redirect::back()->with('message','Nema dovoljno raspolozivih karta');
        }

        $ulogovanKorisnik = auth()->user()->id;
        
        DB::insert('insert into filmoviusers(IDusera,IDfilma,Vreme) values(?,?,?)', [$ulogovanKorisnik, $idFilma, $vreme]);
        
        $latest = DB::select('select * from filmoviusers order by ID DESC LIMIT 1');
        
        DB::insert('insert into karta(ImeFilma,BrojKarta,Vreme,Cena,IDfilmusers) values(?,?,?,?,?)',[$ime, $karte, $vremePrikaza[0]->Vreme, $cena, $latest[0]->ID]);
        
        return redirect("landing");
    }

    public function PrikazZahtevaKorisniku()
    {
        $ulogovanKorisnik = auth()->user()->id;

        $podaci = DB::select('select *,date_format(vp.Vreme,"%H:%i") as VremeProjekcije from filmoviusers fu join filmovi f on f.IDFilma = fu.IDFilma join vremeprikaza vp on vp.IDVreme = fu.vreme where IDUsera = ?', [$ulogovanKorisnik]);

        return view('pregledRezervacija', ["podaci" => $podaci]);
    }

    public function OdobriZahtev($IDFilma, $id)
    {
        DB::update("update filmoviusers set Status = true, EmailOdgovornog = ? where IDFilma = ? and ID = ?",[auth()->user()->email,$IDFilma, $id]);
        

        return redirect('/moderator');
    }

    public function OdbijZahtev(Request $request)
    {
        $poruka = $request['nPoruka'];
        $korisnik = $request['nKorisnik'];
        $film = $request['nFilm'];
        
        DB::update("update filmoviusers set Status = false, Poruka = ? where IDFilma = ? and ID = ?",[$poruka,$film, $korisnik]);

        return redirect('/moderator');
    }
}
