@extends('layouts.projekatLayout')
@section('content')
    <div class='container mb-5 pb-5 mt-5'>
        <div class='row'>
            <div class='col-md-12 mt-5'>
                <div class='card mt-2'>
                    <div class='card-body row mb-3'>
                        <div class='col-md-3'>
                            <img class='border border-5 filmPrikazSlika' src="{{ asset($film[0]->Slika) }}" alt="Slika filma">
                        </div>
                        <div class='col-md-7'>
                            <h2>Naziv: {{ $film[0]->NazivFilma }}</h2>
                            <h3>Glumci: {{ $film[0]->Glumci }}</h3>
                            <h4>Duzina trajanja: {{ $film[0]->Trajanje }} min</h4>
                            <h4>Zanr: {{ $film[0]->Zanr }}</h4>
                            <h4>Opis: {{ $film[0]->Opis }}</h4>
                            <h4>Cena jedne karte: {{ $film[0]->Cena }}</h4>
                            <button class="btn btn-primary btn-lg m-3"><a
                                    href="{{ url('pregledKarte/' . $film[0]->IDFilma) }}">Rezervisi odmah</a></button>
                            <div>
                                @guest
                                    <div class="alert alert-warning alert-dismissible fade show mb-5" role="alert">
                                        <h4>Izgleda da niste ulogovani! Ako zelite da pogledate komentare morate da
                                            se <a class="alert-link" href="{{ route('login') }}"> ulogujete</a>.
                                        </h4>
                                    </div>
                                @endguest
                                @auth
                                    <div class="row">
                                        <h2>Komentari</h2>
                                        <div id="iOmotacKomentar">

                                        </div>
                                        <div>
                                            <div class="form-floating mb-3">
                                                <input disabled type="Ime" class="form-control" id="iIme"
                                                    placeholder="Branko" value="{{ auth()->user()->name }}" name="nIme">
                                                <label for="floatingInput">Ime</label>
                                            </div>
                                            <div class="form-floating">
                                                <textarea type="text" class="form-control" id="iKomentar" name="nKomentar" placeholder="Komentar"></textarea>
                                                <label for="floatingPassword">Komentar</label>
                                            </div>
                                            <button type="text" class="btn btn-success mt-3" type="button"
                                                onclick="komentarisi()">Komentarisi</button>
                                        </div>
                                    </div>
                                @endauth
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('komentar-script')
    <script>
        function komentari() {
            let omotac = document.getElementById('iOmotacKomentar');

            try {
                const komentari = fetch("http://127.0.0.1:8000/api/komentar/" + {{ $film[0]->IDFilma }})
                    .then(response => response.json())
                    .then(response => {
                        for (let i = 0; i < response.length; i++) {
                            let naslov = document.createElement("h2");
                            naslov.innerText = response[i].Naslov;

                            let komentar = document.createElement("p");
                            komentar.innerText = response[i].Komentar;

                            omotac.appendChild(naslov);
                            omotac.appendChild(komentar);
                        }
                    });
            } catch (error) {
                console.log("Nema komentara");
            }
        };

        window.onload = komentari();

        function komentarisi() {
            let ime = document.getElementById('iIme');
            let komentar = document.getElementById('iKomentar');

            fetch("http://127.0.0.1:8000/api/komentar", {
                method: "POST",
                body: JSON.stringify({
                    IDfilma: {{ $film[0]->IDFilma }},
                    Naslov: ime.value,
                    Komentar: komentar.value
                }),
                headers: {
                    "Content-type": "application/json; charset=UTF-8",
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }).then(response => response.json()).then(data =>{

                let omotac = document.getElementById('iOmotacKomentar');

                let naslov = document.createElement("h2");
                naslov.innerText = data.Naslov;

                let komentar = document.createElement("p");
                komentar.innerText = data.Komentar;

                omotac.appendChild(naslov);
                omotac.appendChild(komentar);
            }).catch(e => {
                console.log(e);
                alert("Morate da popunite polje komentar");
            });

        }
    </script>
@endpush
