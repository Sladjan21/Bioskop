@extends('layouts.projekatLayout')

@section('content')
    <div class="row ">
        <div class="col-md-1 p-0">
        </div>
        <div class="col-md-10 mt-5 p-0">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('img/avatar.webp') }}" class="d-block w-100" alt="avatar-film-poster">
                        <div class="carousel-caption d-none d-md-block">
                            <h5><strong>Avatar 2</strong></h5>
                            <p><strong>Nabavite vasu kartu vec danas!</strong></p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/transformers.webp') }}" class="d-block w-100" alt="transormers-last-knight">
                        <div id="tamnaSlova" class="carousel-caption d-none d-md-block">
                            <h5><strong>Transformers</strong></h5>
                            <p><strong>Nabavite vasu kartu danas</strong></p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/jumanji.jpeg') }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5><strong>Jumanji</strong></h5>
                            <p><strong>Nabavite vasu kartu danas</strong></p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="row mt-2 mb-2">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <blockquote class="blockquote mb-0">
                                <p><i id="citatLevi">"There's no place like home."</i></p>
                                <footer class="blockquote-footer"><cite title="Source Title" id="filmLevi">The Wizard of
                                        Oz, 1939</cite></footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <blockquote class="blockquote mb-0">
                                <p><i id="citatDesni">"Keep your friends close, but your enemies closer."</i></p>
                                <footer class="blockquote-footer"><cite title="Source Title" id="filmDesni">The Godfather
                                        Part II, 1974</cite></footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row text-center mb-2">
                                <h2><strong>Aktuelni filmovi!</strong></h2>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card h-100" style="width: 18rem;">
                                        <img class="aktuelniSlike" src="{{ asset('img/insidious.jpg') }}"
                                            class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <div class="opisAktuelnih">
                                                <h5 class="card-title">Insidious</h5>
                                                <p class="card-text">Zakoracite u jezivu avanturu koja ce vas drzati na
                                                    ivici stolice</p>
                                            </div>
                                            <a href="{{ url('prikaziSveFilmove') }}" class="btn btn-primary">Rezervisite
                                                odmah</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card h-100" style="width: 18rem;">
                                        <img class="aktuelniSlike" src="{{ asset('img/nottingHill.jpg') }}"
                                            class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <div class="opisAktuelnih">
                                                <h5 class="card-title">Notting Hill</h5>
                                                <p class="card-text">Opustite se i uzivajte u ovoj romanticnoj komediji koja
                                                    je dostupna kod nas</p>
                                            </div>
                                            <a href="{{ url('prikaziSveFilmove') }}" class="btn btn-primary">Rezervisite
                                                odmah</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card h-100" style="width: 18rem; ">
                                        <img class="aktuelniSlike" src="{{ asset('img/blackAdam.jpeg') }}"
                                            class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <div class="opisAktuelnih">
                                                <h5 class="card-title">Black Adam</h5>
                                                <p class="card-text">Dvajne Dzonson kao superheroj</p>
                                            </div>
                                            <a href="{{ url('prikaziSveFilmove') }}" class="btn btn-primary">Rezervisite
                                                odmah</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card h-100" style="width: 18rem; ">
                                        <img class="aktuelniSlike" src="{{ asset('img/ironMan.jpg') }}"
                                            class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <div class="opisAktuelnih">
                                                <h5 class="card-title">Ironman</h5>
                                                <p class="card-text">Toni Stark je bogati egoista za koga sudbina ima
                                                    zanimljiv plan.</p>

                                            </div>
                                            <a href="{{ url('prikaziSveFilmove') }}" class="btn btn-primary">Rezervisite
                                                odmah</a>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2 mb-2">
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-header pb-0 ">
                            <h3>Ne znate koji film da izaberete?</h3>
                        </div>
                        <div class="card-body">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" onclick="nasumicanFilm()"
                                data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                Klikni me!!!
                            </button>


                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- <div class="card">
                        <div class="card-header">
                            <h3><i class="bi bi-geo-alt-fill"></i> Lokacija</h3>
                        </div>
                        <div class="card-body">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2830.975615471373!2d20.417924615803937!3d44.80168558542445!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a6fed108da8a7%3A0x9c662a8e931516fb!2sITS%20-%20Visoka%20%C5%A1kola%20za%20informacione%20tehnologije!5e0!3m2!1ssr!2srs!4v1674055213467!5m2!1ssr!2srs" width="475" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div> -->
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3><i class="bi bi-person-add"></i> Kontakt</h3>

                        </div>
                        <div class="card-body">
                            <i class="bi bi-telephone-inbound-fill"></i>
                            <span>+381-68-784-254</span> <br>
                            <i class="bi bi-envelope-at-fill"></i>
                            <span>primer@gmail.com</span>
                        </div>
                    </div>
                </div>


            </div>

        </div>
        <div class="col-md-1 p-0">


        </div>
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Nas predlog filma</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-success" id="prikazNasumicnogFilma" role="alert">
                            Placeholder
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Vazi</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('glavna-script')
    <script src="/js/main.js"></script>
@endpush
