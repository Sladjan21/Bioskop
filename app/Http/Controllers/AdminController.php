<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminProvera');
    }

    public function index()
    {
        $korisnici = DB::select("select * from users");
        $trenutni = Auth::user()->id;

        return view("adminPocetna",['korisnici' => $korisnici,'trenutni' =>$trenutni]);
    }

    public function filmovi()
    {
        $filmovi = DB::select("SELECT DISTINCT(f.IDFilma),f.Cena,f.Premijera,f.NazivFilma,f.BrojKarta FROM filmovi f ");
        $vreme = DB::select("Select IDFilma,IDVreme,date_format(Vreme,'%H:%i') as Vreme from vremeprikaza v ");

        return view('adminFilmovi',['filmovi' => $filmovi,'vreme' => $vreme]);
    }

    public function brisiKorisnika($id)
    {
        DB::table('users')->delete($id);

        return $this->index();
    }

    public function dodajFilmPrikaz()
    {
        return view('dodajFIlm');
    }

    public function dodajFilm(Request $request)
    {
        $nazivFilma = $request['nNaziv'];
        $cenaFilma = $request['nCena'];
        $vremeFilma = $request['nVreme'];
        $karte = $request['nKarte'];
        $trajanje = 100;
        $zanrNiz = $request['nCheckBox'];
        $zanr = "";
        $opis = $request['nOpis'];
        $glumci = $request['nGlumci'];
        if($nazivFilma == null || $cenaFilma == null || $vremeFilma==null || $opis == null || $glumci == null)
        {
            echo("<script>alert('Niste popunili sva polja');</script>");
            return $this->filmovi();
        }

        foreach($zanrNiz as $z)
        {
            Log::info($z);
            $zanr = $zanr .", ". $z;
        }

        $zanr = Str::replaceFirst(',', ' ', $zanr);

        $premijeraFilma = false;
        if(isset($request['nPremijera']))
        {
            $premijeraFilma = true;
        }
    
        $slika = 'img/' . time().'.'.$request->nImage->extension();  
     
        $request->nImage->move(public_path('img'), $slika);
  

        DB::insert("insert into filmovi(NazivFilma,Premijera,Cena,BrojKarta,Slika, Trajanje, Zanr, Opis, Glumci) values (?,?,?,?,?,?,?,?,?)"
        ,[$nazivFilma,$premijeraFilma,$cenaFilma,$karte,$slika,$trajanje,$zanr,$opis,$glumci]);

        $pom = DB::select("select IDFilma from filmovi order by IDFilma desc limit 1");
        
        DB::insert("insert into vremeprikaza(IDFilma, Vreme) values (?,?)",[$pom[0]->IDFilma,$vremeFilma]);

        return $this->filmovi();
        
    }

    public function brisiFilm($id)
    {
        $film = DB::select("select * from filmovi where IDFilma = ?",[$id]);
        DB::delete('delete from karta where ImeFilma = ?',[$film[0]->NazivFilma]);
        DB::delete('delete from filmoviusers where IDFilma = ?', [$id]);
        DB::delete("delete from vremeprikaza where IDFilma = ?",[$id]);
        DB::delete("delete from filmovi where IDFilma = ?",[$id]);

        return $this->filmovi();
    }

    public function izmeniFilm($id)
    {
        $film = DB::select("select * from filmovi f left join vremeprikaza v on f.IDFilma=v.IDFilma where f.IDFilma = ?",[$id]);
        $film[0]->IDFilma = intval($id);
        $vreme = DB::select("select * from vremeprikaza where IDFilma = ?",[$id]);
        return view('admiIzmeniFilm',['film' => $film,'vreme'=>$vreme]);
    }

    public function izmeniFilmFunkcija(Request $request)
    {
        
        $nazivFilma = $request['nNaziv'];
        $cenaFilma = $request['nCena'];
        $vremeFilma = $request['nVreme'];
        $id = $request['nIDFilma'];
        $brojKarta = $request['nKarte'];
        if($nazivFilma == null || $cenaFilma == null || $vremeFilma==null)
        {
            echo("<script>alert('Ne mozete da ostavite prazna polja');</script>");
            return $this->filmovi();
        }
        $premijeraFilma = false;
        if(isset($request['nPremijera']))
        {
            $premijeraFilma = true;
        }
        
        DB::update("update filmovi set NazivFilma = ?, Cena=?, Premijera = ?, BrojKarta=? where filmovi.IDFilma = ?",[$nazivFilma,$cenaFilma, $premijeraFilma ,$brojKarta,$id]);

        $postojiVreme = DB::select("select * from vremeprikaza where IDFilma = ?",[$id]);
        if($postojiVreme)
        {
            DB::update("update vremeprikaza set Vreme = ? where IDFilma = ?",[$vremeFilma,$id]);
        }
        else
        {
            DB::insert("insert into vremeprikaza(IDFilma,Vreme) values(?,?)",[$id,$vremeFilma]);
        }
        
        return $this->filmovi();
        
    }

    public function izbrisiVreme($idVreme)
    {
        DB::delete("delete from vremeprikaza where IDVreme = ?",[$idVreme]);
        return $this->filmovi();
    }

    public function dodajVreme(Request $request)
    {
        $idFilma = $request->input('nIDFilmVreme');
        $vreme = $request->input('nTime');

        Log::info($idFilma);
        Log::info($vreme);

        DB::insert('insert into vremeprikaza(IDFilma,Vreme) values(?,?)',[$idFilma,$vreme]);
        return $this->filmovi();
        
    }
}
