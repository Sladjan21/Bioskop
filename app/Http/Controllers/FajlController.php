<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class FajlController extends Controller
{
    public function skiniTXT(Request $request)
    {
        // Bitno je da radi konacno

        $ime = $request['nImeFilma'];
        $karte = $request['nKarte'];
        $vreme = $request['nVreme'];
        $cena = $request['nCena'];
        $id = $request['nId'];
        date_default_timezone_set('Europe/Belgrade');
        $string = "Potvrda o izvrsenoj rezervaciji !!!\nNaziv filma: " . $ime . "\nBroj karta: " . $karte . "\nVreme: " . $vreme . "\nCena po karti: " . $cena . "\nDatum i vreme rezervacije: " . date('d-m-y h:i:s');
        $string = $string . "\nUkupna cena: " . $karte * $cena;
        Storage::disk('local')->put('file.txt', $string);
        $storage = Storage::disk('local')->get('file.txt');
        $headers = [
            'Content-type' => 'text/plain',
            'Content-Disposition' => sprintf('attachment; filename="%s"', "file.txt"),
            'Content-Length' =>  Storage::disk('local')->size('file.txt')
        ];

        $stanjeKarta = DB::select("select BrojKarta from filmovi where IDFilma = ?", [$id]);

        if ($stanjeKarta[0]->BrojKarta - $karte < 0) {
            echo ("<script>alert('Zao nam je, nemamo toliko raspolozivih karta trenutno');</script>");
            return view('landing');
        } else {
            DB::update("update filmovi set BrojKarta = BrojKarta-? where IDFilma = ?", [$karte, $id]);

            return Response($storage, 200, $headers);
        }


        //ovo ispod su pokusaji da proradi pomocu storage::download

        // Storage::download("D:/xamp/htdocs/projekatZaWeb(AKTUELAN)/projekatZaWeb/storage/app/kul.txt");

        // return Storage::download("storage/app/file.txt","Karte",$headers);
        // $path = Storage::disk('local')

        // return response()->download("D:/xamp/htdocs/projekatZaWeb(AKTUELAN)/projekatZaWeb/storage/app/file.txt", "Karte", $headers);








    }
}
