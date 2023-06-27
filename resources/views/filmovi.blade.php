@extends('layouts.projekatLayout')
@section('content')
<div id="sviFilmoviTabela" class="container table-responsive mt-5 pt-1">
    <div class="card mb-2">
        <div class="card-header text-center ">
            <h3>Ispod se nalaze svi trenutno dostupni filmovi za projekciju danas</h3>
        </div>
    </div>
    <table class="table table-dark table-striped table-hover">
        <thead>
            <tr>

                <th scope="col">Naziv filma</th>
                <th scope="col">Vreme projekcije</th>
                <th scope="col">Premijera</th>
                <th scope="col">Cena</th>
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
                echo $film->Vreme;
                // foreach ($vreme as $vrem) {
                //     if ($vrem->IDFilma == $film->IDFilma) {
                        
                //         echo $vrem->Vreme;
                        
                //     }
                //     else
                //     {
                //         echo "ne";
                //     }
                // }

                echo "</td>";
                echo "<td>";
                if ($film->Premijera) {
                    echo "Da";
                } else {
                    echo "Ne";
                }
                echo "</td>";
                echo "<td>";
                echo $film->Cena;
                echo "</td>";
                
            ?>
                <td>
                    <button type="button" class="btn btn-primary"><a href="{{url('pregledKarte/' . $film->IDFilma)}}">Rezervisi odmah</a></button>
                </td>
            <?php
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

</div>
@stop