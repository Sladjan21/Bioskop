@extends('layouts.projekatLayout')
@section('content')
    <div id="sviFilmoviTabela" class="container table-responsive mt-5 pt-1">
        <div class="card mb-2">
            <div class="card-header text-center ">
                <h3>Ispod se nalaze svi zahtevi vasih rezervacija kao i njihovi statusi</h3>

            </div>
        </div>
        <table class="table table-dark table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Status rezervacije</th>
                    <th scope="col">Film</th>
                    <th scope="col">Vreme</th>
                    <th scope="col">Poruka</th>
                    <th scope="col">Akcija</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($podaci as $podatak)
                    @if (is_null($podatak->Status))
                        <tr>
                        @elseif ($podatak->Status == true)
                        <tr class='table-success'>
                        @elseif($podatak->Status == false)
                        <tr class='table-danger'>
                        @else
                        <tr>
                    @endif
                    <td>
                        @if (is_null($podatak->Status))
                            Na cekanju
                        @elseif($podatak->Status == true)
                            Rezervisano
                        @else
                            Odbijeno
                        @endif
                    </td>

                    <td>
                        {{ $podatak->NazivFilma }}
                    </td>
                    <td>
                        {{$podatak->VremeProjekcije}}
                    </td>
                    <td>
                        @if ($podatak->Poruka == null)
                            Nema poruke
                        @else
                            {{ $podatak->Poruka }}
                        @endif
                    </td>
                    <td>
                        @if ($podatak->Status == true)
                            <form action="{{ route('skiniTXT') }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{$podatak->ID}}" name="nID">
                                <input type="hidden" value="{{$podatak->IDFilma}}" name="nIDFilma">
                                <input type="submit" value="Preuzmite vasu kartu" class="btn btn-success">
                            </form>
                        @else
                            <p>Trenutno ne postoji moguca akcija</p>
                        @endif
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
