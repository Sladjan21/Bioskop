@extends('layouts.adminLayout')

@section('content')

<div id="sviKorisniciTabela" class="container pt-5 mt-5 mb-5">
    <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-body text-center">
                    <h2>Pregled korisnika</h2>
                    <table class="table table-dark table-striped text-center">
                        <thead>
                            <tr>
                                <th scope="col">Ime</th>
                                <th scope="col">Email</th>
                                <th scope="col">Rola</th>
                                <th scope="col">Akcija</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            foreach ($korisnici as $korisnik) {
                                
                                if($korisnik->id == $trenutni)
                                {
                                    continue;
                                }
                                echo "<tr>";
                                echo "<td>";
                                echo $korisnik->name;
                                echo "</td>";
                                echo "<td>";
                                echo $korisnik->email;
                                echo "</td>";
                                echo "<td>";
                                if ($korisnik->Rola == "moderator") {
                                    echo $korisnik->Rola;
                                } elseif($korisnik->Rola == "admin") {
                                    echo $korisnik->Rola;
                                }
                                else {
                                    echo "Korisnik";
                                }
                                echo "</td>";
                                echo "<td>";
                            ?>
                                
                                <button type='button' class='btn btn-danger' ><a onclick="return confirm('Da li ste sigurni?')" href="{{url('adminBrisi/' . $korisnik->id)}}">Izbrisi</a></button>
                                <!--  Moze da ima da admin ima mogucnost da postavi novog admina a i ne mora
                                <button type='button' class='btn btn-info'>Postavi admina</button> -->
                            <?php
                                echo "</td>";
                                echo "</tr>";
                            }


                            ?>

                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-1">

        </div>
    </div>

</div>

@stop