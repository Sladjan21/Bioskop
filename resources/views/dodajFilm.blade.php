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
                <div class="row">
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-4">
                        <form action="{{route('dodajFilm')}}" method="POST">
                            @csrf
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
                                <input class="form-control" id="iVreme" name="nVreme" required type="time">
                            </fieldset>
                            <fieldset class="mb-4">
                                <legend>Broj karta</legend>
                                <input class="form-control" id="iKarte" min="1" value="0" name="nKarte" required type="number">
                            </fieldset>
                            <input class="form-control btn btn-success" type="submit" value="Dodaj film"/>
                        </form>
                    </div>
                    <div class="col-md-4">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-1">
    </div>

</div>

@stop