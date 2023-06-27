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
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                        <form action="{{route('adminIzmeniFilm')}}" method="POST">
                            @csrf
                            <fieldset class="mb-4">
                                <legend>Naziv filma</legend>
                                <input class="form-control" id="iNaziv" name="nNaziv" value="<?php echo $film[0]->NazivFilma ?>" required type="text">
                            </fieldset>
                            <fieldset class="mb-4">
                                <legend>Premijera</legend>
                                <?php
                                if ($film[0]->Premijera > 0) {
                                    echo '<input id="cbDodajFilm" name="nPremijera" type="checkbox" checked class="form-check-input"/>';
                                } else {
                                    echo '<input id="cbDodajFilm" name="nPremijera" type="checkbox" class="form-check-input"/>';
                                }

                                ?>
                            </fieldset>
                            <fieldset class="mb-4">
                                <legend>Cena</legend>
                                <input class="form-control" id="iCena" value="<?php echo $film[0]->Cena ?>" name="nCena" required type="number">
                            </fieldset>
                            <fieldset class="mb-4">
                                <?php if (isset($vreme[0])) { ?>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Vreme Projekcije</th>
                                                <th scope="col">Akcije</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            foreach ($vreme as $vrem) {

                                                echo "<tr>";
                                                echo "<td>";

                                            ?>
                                                <input class="form-control" name="nVreme" id="iVreme" type="time" value='<?php echo $vrem->Vreme ?>'>
                                                <?php
                                                echo "</td>";
                                                ?>
                                                <td>
                                                    <button class="btn btn-danger" type="button"><a onclick="return confrim('Da li ste sigurni da zelite da izbrisete');" href="{{url('brisiVreme/' . $vrem->IDVreme)}}">Izbrisi vreme</a></button>
                                                    <input hidden type="text" value='<?php echo $vrem->IDVreme ?>'>
                                                </td>
                                            <?php
                                                echo "</tr>";
                                            }
                                        } else { ?>
                                            <fieldset>
                                                <legend>Vreme projekcije</legend>
                                                <input class="form-control" required name="nVreme" id="iVreme" type="time">

                                            </fieldset>
                                        <?php
                                        }

                                        ?>

                                        </tbody>
                                    </table>
                            </fieldset>
                            <fieldset class="mb-4">
                                <legend>Broj karta</legend>
                                <input class="form-control" value="<?php echo $film[0]->BrojKarta ?>" id="iKarte" name="nKarte" required type="number">
                            </fieldset>
                            <input hidden name="nIDFilma" value="<?php echo $film[0]->IDFilma ?>" />
                            <input class="form-control btn btn-success" type="submit" value="Izmeni">
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