@extends('layouts.projekatLayout')

@section('content')
    <div class="container mb-5" id="pregledKarte">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8 mt-5">
                <div class="card mt-5">
                    <div class="card-body">
                        <div class="alert alert-primary">
                            <h1>Molimo Vas da popunite polje ispod kako bi mogli da uspesno rezervisemo vasu kartu/e</h1>

                        </div>

                        <form action="{{ url('rezervisi') }}" method="POST" class="text-center">
                            @csrf

                            @if (session('message'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong> {{ session('message') }}
                                    </strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <fieldset>
                                <legend>Izabran film</legend>
                                <input class="form-control" type="text" value="{{ $film[0]->NazivFilma }}" readonly
                                    name="nImeFilma" id="iImeFilma">
                            </fieldset>
                            <fieldset>
                                <legend>Broj karata</legend>
                                <input type="number" value="1" min="1" max="5" id="iKarte"
                                    name="nKarte" class="form-control">
                                <strong>Broj karta koje su raspolozive za ovaj film: <?php echo $film[0]->BrojKarta; ?></strong> <br>
                                <small>Najveci broj karta koje mozete rezervisati je 5</small>
                            </fieldset>
                            <fieldset>
                                <legend>Izaberite vreme projekcije</legend>
                                <select class="form-select" name="nVreme" id="iVreme">
                                    <?php
                                    foreach ($vreme as $v) {
                                        echo '<option value=' . $v->IDVreme . ">$v->Vreme</option>";
                                    }
                                    
                                    ?>
                                </select>
                            </fieldset>
                            <fieldset>
                                <legend>Cena</legend>
                                <input type="text" readonly value="{{ $film[0]->Cena }}" name="nCena" id="iCena"
                                    class="form-control">
                                <small>Cena je po karti</small>
                            </fieldset>

                            <fieldset>
                                <legend>Potvrdi</legend>
                                <input type="hidden" value="{{ $film[0]->IDFilma }}" name="nId" id="iId" />
                                <input type="hidden" value="{{auth()->user()->id}}" name="nUserID"/>
                                <input type="submit" value="Potvrdi!!!" class="form-control btn btn-outline-success">
                                <!-- data-bs-toggle="modal" data-bs-target="#staticBackdrop" -->
                            </fieldset>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal koji ti ne treba verovatno-->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">

                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-primary" role="alert">
                        <h2>Da li ste sigurni da zelite da potvrdite rezervaciju ?</h2>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zatvori</button>
                    <button type="button" onclick="preuzimanjeTXT()" class="btn btn-success"><a href="">Rezervisi
                            odmah</a></button>
                </div>
            </div>
        </div>
    </div>
@stop
