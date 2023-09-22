@extends('layouts.adminLayout')

@section('content')

<div class="row mt-5 pt-5 mb-5">
    <div class="col-md-1">
    </div>
    <div class="col-md-10">
        <div class="card text-center">
            <div class="card-header">
                <h2>Unesite sve neophodne informacije kako bi ste dodali film</h2>
            </div>
            <div class="card-body">
                
                <form action="{{route('dodajFilm')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <fieldset class="mb-4">
                                <legend>Naziv filma</legend>
                                <input class="form-control" id="iNaziv" name="nNaziv" required type="text">
                            </fieldset>
                            <fieldset class="mb-4">
                                <legend>Premijera</legend>
                                <input id="cbDodajFilm" name="nPremijera" class="form-check-input" type="checkbox">
                            </fieldset>
                            <fieldset class="mb-4">
                                <legend>Cena</legend>
                                <input class="form-control" id="iCena" min="0" value="0" name="nCena" required type="number">
                            </fieldset>
                            <fieldset class="mb-4">
                                <legend>Vreme projekcije</legend>
                                <input class="form-control" id="iVreme" name="nVreme" required type="time" >
                                
                            </fieldset>

                        </div>
                        <div class="col-md-4">
                            <fieldset class="mb-4">
                                <legend>Broj karta</legend>
                                <input class="form-control" id="iKarte" min="1" value="0" name="nKarte" required type="number">
                            </fieldset>
                            <fieldset class="mb-4">
                                <legend>Trajanje</legend>
                                <input class="form-control" id="iTrajanje" min="0" value="0" name="nTrajanje" required type="number">
                            </fieldset>
                            <fieldset class="mb-4">
                                <legend>Zanr</legend>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" value="Avantura" type="checkbox" name="nCheckBox[]">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Avantura</label>
                                    <br>
                                    <input class="form-check-input" value="Akcija" type="checkbox" name="nCheckBox[]">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Akcija</label>
                                    <br>
                                    <input class="form-check-input" value="Komedija" type="checkbox" name="nCheckBox[]">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Komedija</label>
                                    <br>
                                    <input class="form-check-input" value="Romantika" type="checkbox" name="nCheckBox[]">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Romantika</label>
                                </div>
                            </fieldset>

                            <input class="form-control btn btn-success mt-5" type="submit" value="Dodaj film" />

                        </div>
                        <div class="col-md-4">
                            <fieldset class="mb-4">
                                <legend>Glumci</legend>
                                <input class="form-control" id="iGlumci" name="nGlumci" required type="text" />
                            </fieldset>
                            <fieldset class="mb-4">
                                <legend>Slika</legend>
                                <input type="file" name="nImage" required class="form-control">
                            </fieldset>
                            <fieldset class="mb-4">
                                <legend>Opis</legend>
                                <textarea class="form-control" id="iOpis" name="nOpis" required></textarea>
                            </fieldset>

                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-1">
    </div>

</div>

@stop