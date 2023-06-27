@extends('layouts.adminLayout')

@section('content')

<div id="sviFilmoviTabela2" class="container pt-5 mt-5 mb-5">
    <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-body text-center">
                    <h2>Pregled filmova</h2>
                    <table class="table table-dark table-striped text-center">
                        <thead>
                            <tr>
                                <th scope="col">Naziv filma</th>
                                <th scope="col">Cena</th>
                                <th scope="col">Premijera</th>
                                <th scope="col">Vreme</th>
                                <th scope="col">Broj karta</th>
                                <th scope="col">Akcija</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            foreach ($filmovi as $film) {
                                echo "<tr>";
                                echo "<td>";
                                echo $film->NazivFilma;
                                echo "</td>";

                                echo "<td>";
                                echo $film->Cena;
                                echo "</td>";
                                echo "<td>";
                                if ($film->Premijera > 0) {
                                    echo "Da";
                                } else {
                                    echo "Ne";
                                }
                                echo "</td>";

                                echo "<td>";
                                // echo $film->Vreme;


                                foreach($vreme as $vrem)
                                {
                                    if ($film->IDFilma == $vrem->IDFilma) {

                                        echo $vrem->Vreme;
                                    }
                                    
                                }



                                echo "</td>";
                                echo "<td>";
                                echo $film->BrojKarta;
                                echo "</td>";
                                echo "<td>";
                            ?>


                                <button type='button' class='btn btn-danger'><a onclick="return confirm('Da li ste sigurni?')" href="{{url('adminBrisiFilm/' . $film->IDFilma )}}">Brisi</a></button>
                                <button type='button' class='btn btn-info'><a href="{{url('adminIzmeniFilm/' . $film->IDFilma )}}">Izmeni film</a></button>

                            <?php
                                echo "</td>";
                                echo "</tr>";
                            }


                            ?>

                    </table>
                    <button type="button" class="btn btn-info"><a href="{{route('dodajFilmPrikaz')}}">Dodaj film</a></button>
                </div>
            </div>
        </div>
        <div class="col-md-1">

        </div>
    </div>

</div>

@stop