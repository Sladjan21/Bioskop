@extends('layouts.adminLayout')

@section('content')

    <div class="row mt-5 pt-5 mb-5">
        <div class="col-md-1">
        </div>
        <div class="col-md-10">
            <div class="card text-center">
                <div class="card-header">
                    <h2>Unesite sve neophodne informacije kako bi ste izmenili film</h2>
                </div>
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-9">
                            <form action="{{ route('adminIzmeniFilm') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <fieldset class="mb-4">
                                            <legend>Naziv filma</legend>
                                            <input class="form-control" id="iNaziv" name="nNaziv"
                                                value="{{ $film[0]->NazivFilma }}" required type="text">
                                        </fieldset>
                                        <fieldset class="mb-4">
                                            <legend>Premijera</legend>

                                            @if ($film[0]->Premijera > 0)
                                                <input id="cbDodajFilm" name="nPremijera" type="checkbox" checked
                                                    class="form-check-input" />
                                            @else
                                                <input id="cbDodajFilm" name="nPremijera" type="checkbox"
                                                    class="form-check-input" />
                                            @endif


                                        </fieldset>
                                        <fieldset class="mb-4">
                                            <legend>Cena</legend>
                                            <input class="form-control" id="iCena" value="{{ $film[0]->Cena }}"
                                                name="nCena" required type="number">
                                        </fieldset>
                                        <fieldset class="mb-4">
                                            <legend>Vreme projekcije</legend>
                                            {{-- <input class="form-control" id="iVreme" name="nVreme" required
                                                type="time"> --}}

                                            <table class="table">
                                                <thead>
                                                    <th scope="col">Vreme</th>
                                                    <th scope="col"></th>
                                                </thead>
                                                <tbody>
                                                    @foreach ($film as $f)
                                                        @if (is_null($f->Vreme))
                                                        @break
                                                    @endif
                                                    <tr>
                                                        <td>{{ $f->Vreme }}</td>
                                                        <td>
                                                            <a class="btn btn-danger"
                                                                onclick="return confirm('Da li ste sigurni da zelite da izbrisete vreme projekcije?')"
                                                                href="{{ url('brisiVreme/' . $f->IDVreme) }}">Izbrisi</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">Dodaj</button>
                                    </fieldset>

                                </div>
                                <div class="col-md-4">
                                    <fieldset class="mb-4">
                                        <legend>Broj karta</legend>
                                        <input class="form-control" value="{{ $film[0]->BrojKarta }}" id="iKarte"
                                            name="nKarte" required type="number">

                                    </fieldset>
                                    <fieldset class="mb-4">
                                        <legend>Trajanje(u minutima)</legend>
                                        <input class="form-control" id="iTrajanje" min="0" name="nTrajanje"
                                            value="{{ $film[0]->Trajanje }}" required type="number">
                                    </fieldset>
                                    <fieldset class="mb-4">
                                        <legend>Zanr</legend>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" value="Avantura" type="checkbox"
                                                name="nCheckBox[]">
                                            <label class="form-check-label"
                                                for="flexSwitchCheckDefault">Avantura</label>
                                            <br>
                                            <input class="form-check-input" value="Akcija" type="checkbox"
                                                name="nCheckBox[]">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Akcija</label>
                                            <br>
                                            <input class="form-check-input" value="Komedija" type="checkbox"
                                                name="nCheckBox[]">
                                            <label class="form-check-label"
                                                for="flexSwitchCheckDefault">Komedija</label>
                                            <br>
                                            <input class="form-check-input" value="Romantika" type="checkbox"
                                                name="nCheckBox[]">
                                            <label class="form-check-label"
                                                for="flexSwitchCheckDefault">Romantika</label>
                                        </div>
                                    </fieldset>

                                    <input hidden name="nIDFilma" value="{{ $film[0]->IDFilma }}" />
                                    <input class="form-control btn btn-success mt-5" type="submit" value="Izmeni">


                                </div>
                                <div class="col-md-4">
                                    <fieldset class="mb-4">
                                        <legend>Glumci</legend>
                                        <input class="form-control" id="iGlumci" name="nGlumci" required
                                            type="text" value="{{ $film[0]->Glumci }}" />
                                    </fieldset>
                                    <fieldset class="mb-4">
                                        <legend>Slika</legend>
                                        <input type="file" name="nImage" value="{{ $film[0]->Slika }}"
                                            class="form-control">
                                    </fieldset>
                                    <fieldset class="mb-4">
                                        <legend>Opis</legend>
                                        <textarea class="form-control" id="iOpis" name="nOpis" required>{{ $film[0]->Opis }}</textarea>
                                    </fieldset>

                                </div>

                            </div>
                        </form>
                    </div>
                    <div class="col-md-3">
                        <img src="{{ asset($film[0]->Slika) }}" class="border border-5 filmPrikazSlika"
                            alt="">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-1">
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('dodajVreme')}}" method="POST">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input class="form-control" name="nTime" type="time">
                    <input type="hidden" value="{{ $film[0]->IDFilma }}" name="nIDFilmVreme">
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Odustani</button>
                    <input type="submit" class="btn btn-primary" value="Dodaj" />
                </div>
            </form>
        </div>
    </div>
</div>
@stop
