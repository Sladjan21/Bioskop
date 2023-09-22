@extends('layouts.adminLayout')

@section('content')

    <div id="sviFilmoviTabela2" class="container pt-5 mt-5 mb-5">
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body text-center">
                        <h2>Pregled zahteva za rezervaciju</h2>
                        <table class="table table-dark table-striped text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Status rezervacije</th>
                                    <th scope="col">Korisnikov email</th>
                                    <th scope="col">Email osobe koje je odobrila</th>
                                    <th scope="col">Film</th>
                                    <th scope="col">Vreme</th>
                                    <th scope="col">Akcija</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($korisnik as $k)
                                    @if (is_null($k->Status))
                                        <tr>
                                        @elseif ($k->Status == true)
                                        <tr class='table-success'>
                                        @elseif($k->Status == false)
                                        <tr class='table-danger'>
                                        @else
                                        <tr>
                                    @endif
                                    <td>
                                        @if (is_null($k->Status))
                                            Na cekanju
                                        @elseif($k->Status == true)
                                            Potvrdjeno
                                        @else
                                            Odbijeno
                                        @endif
                                    </td>
                                    <td>
                                        {{ $k->email }}
                                    </td>
                                    <td>
                                        {{$k->EmailOdgovornog}}
                                    </td>
                                    <td>
                                        @foreach ($filmovi as $f)
                                            @if ($k->IDFilma == $f->IDFilma)
                                                {{ $f->NazivFilma }}
                                            @break
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($filmovi as $f)
                                        @if ($k->IDFilma == $f->IDFilma)
                                            {{ $f->VremeProjekcije }}
                                        @break
                                    @endif
                                @endforeach

                            </td>
                            <td>
                                @if (is_null($k->Status))
                                    <button type="button" class="btn btn-success"><a
                                            href="{{ url('rezervisiFilm/' . $k->IDFilma . '/' . $k->ID) }}">Odobri
                                            rezervaciju</a></button>
                                    <button type="button" class="btn btn-danger " data-bs-toggle="modal"
                                        data-bs-target="#exampleModal"
                                        onclick="odbij({{ $k->IDFilma }},{{ $k->ID }})">Odbij
                                        rezervaciju</button>
                                @elseif($k->Status == false)
                                    Nista
                                @else
                                @endif
                            </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                @php
                    //  var_dump($korisnik);
                    //  var_dump($film);
                @endphp
            </div>
        </div>
    </div>
    <div class="col-md-1">

    </div>
</div>

</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <form action="{{ route('odbijRezervaciju') }}" method="POST">
            @csrf
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Razlog odbijanja rezervacije</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <textarea class="form-control" id="iPoruka" name="nPoruka" placeholder="Ovde unesite razlog odbijanja" cols="10"
                    rows="10"></textarea>
                <input type="hidden" value="Film" name="nFilm" id="iFilm">
                <input type="hidden" value="Korisnik" name="nKorisnik" id="iKorisnik">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Odustani</button>
                <button type="submit" class="btn btn-danger">Potvrdi</button>
            </div>
        </form>
    </div>
</div>
</div>

<script>
    function odbij(IDFilma, IDKorisnika) {
        let film = document.getElementById('iFilm');
        let korisnik = document.getElementById('iKorisnik');

        film.value = IDFilma;
        korisnik.value = IDKorisnika;

    }
</script>

@stop
