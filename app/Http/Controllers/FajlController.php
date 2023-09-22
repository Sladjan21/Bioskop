<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FajlController extends Controller
{
    public function skiniTXT(Request $request)
    {
        // Bitno je da radi konacno

        // $ime = $request['nImeFilma'];
        // $karte = $request['nKarte'];
        // $vreme = $request['nVreme'];
        // $cena = $request['nCena'];
        $id = $request['nID'];
        $filmID = $request['nIDFilma'];

        $karta = DB::select('select *,date_format(Vreme,"%H:%i") as Vreme from karta where IDfilmusers = ?',[$id]);

        Log::info($karta);
        Log::info($id);

        date_default_timezone_set('Europe/Belgrade');
        $string = "Potvrda o izvrsenoj rezervaciji !!!\nNaziv filma: " . 
        $karta[0]->ImeFilma . "\nBroj karta: " . $karta[0]->BrojKarta . "\nVreme: " . $karta[0]->Vreme . "\nCena po karti: " . $karta[0]->Cena . "\nDatum i vreme rezervacije: " . date('d-m-y h:i:s');
        $string = $string . "\nUkupna cena: " . $karta[0]->BrojKarta * $karta[0]->Cena . "\nKorisnikov email: " . auth()->user()->email;
        Storage::disk('local')->put('rezervacija.txt', $string);
        $storage = Storage::disk('local')->get('rezervacija.txt');
        $headers = [
            'Content-type' => 'text/plain',
            'Content-Disposition' => sprintf('attachment; filename="%s"', "rezervacija.txt"),
            'Content-Length' =>  Storage::disk('local')->size('rezervacija.txt')
        ];

            DB::update("update filmovi set BrojKarta = BrojKarta-? where IDFilma = ?", [$karta[0]->BrojKarta, $filmID]);

            return Response($storage, 200, $headers);


        //ovo ispod su pokusaji da proradi pomocu storage::download

        // Storage::download("D:/xamp/htdocs/projekatZaWeb(AKTUELAN)/projekatZaWeb/storage/app/kul.txt");

        // return Storage::download("storage/app/file.txt","Karte",$headers);
        // $path = Storage::disk('local')

        // return response()->download("D:/xamp/htdocs/projekatZaWeb(AKTUELAN)/projekatZaWeb/storage/app/file.txt", "Karte", $headers);

    }

    public function ZahtevZaRezervaciju(Request $request)
    {
        
    }
}
