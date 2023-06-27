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
                        <form action="" method="POST">
                            @csrf
                            <table class="table table-dark table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Vreme projekcije</th>
                                        <th>Novo vreme</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    foreach($vreme as $vrem)
                                    {
                                        echo "<tr>";

                                        echo "<td>";
                                        echo $vrem->Vreme;
                                        echo "</td>";

                                        echo "</tr>";
                                        ?>
                                        <input type="text">



                                        <?php
                                    }
                                
                                ?>


                                </tbody>
                            </table>
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