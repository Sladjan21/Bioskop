<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


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
        $vreme = DB::select("Select * from vremeprikaza v ");

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
        if($nazivFilma == null || $cenaFilma == null || $vremeFilma==null)
        {
            echo("<script>alert('Ne moze');</script>");
            return $this->filmovi();
        }
        $premijeraFilma = false;
        if(isset($request['nPremijera']))
        {
            $premijeraFilma = true;
        }
        
        DB::insert("insert into filmovi(NazivFilma,Premijera,Cena,BrojKarta) values (?,?,?,?)",[$nazivFilma,$premijeraFilma,$cenaFilma,$karte]);

        $pom = DB::select("select IDFilma from filmovi order by IDFilma desc limit 1");
        
        DB::insert("insert into vremeprikaza(IDFilma, Vreme) values (?,?)",[$pom[0]->IDFilma,$vremeFilma]);

        return $this->filmovi();
        
    }

    public function brisiFilm($id)
    {
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
            echo("<script>alert('Ne moze');</script>");
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


    public function izmeniVreme($idVreme)
    {
        echo $idVreme;

        $vreme = DB::select('select * from vremeprikaza where IDVreme = ?',[$idVreme]);

        return view('vremeprojekcije',['vreme'=>$vreme]);
    }
}
