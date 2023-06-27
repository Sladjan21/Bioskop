@extends('layouts.projekatLayout')
@section('content')
<div class="container">
    <div class="row mt-5">
        <div id="lokacija" class="col-md-6 mt-5">
            <div class="card text-center">
                <div class="card-header">
                    <h2><i class="bi bi-person-add"></i> Kontakt</h2>
                </div>
                <div class="card-body">
                    <form action="mailto:emailid@example.com" method="post" enctype="text/plain">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInputName" required placeholder="name@example.com">
                            <label for="floatingInput">Vase ime i prezime</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInputName" required placeholder="name@example.com">
                            <label for="floatingInput">Vas email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInputName" required placeholder="name@example.com">
                            <label for="floatingInput">Naslov poruke</label>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" required id="floatingTextarea"></textarea>
                            <label for="floatingTextarea">Opis poruke</label>
                        </div>
                        <input type="submit" class="btn btn-success mt-2" value="Posalji">
                    </form>
                </div>
            </div>

        </div>
        <div class="col-md-6 mt-5 mb-5">
            <div class="card text-center">
                <div class="card-header">
                    <h2><i class="bi bi-geo-alt-fill"></i> Lokacija</h2>
                </div>
                <div class="card-body">

                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2830.975615471373!2d20.417924615803937!3d44.80168558542445!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a6fed108da8a7%3A0x9c662a8e931516fb!2sITS%20-%20Visoka%20%C5%A1kola%20za%20informacione%20tehnologije!5e0!3m2!1ssr!2srs!4v1674061165364!5m2!1ssr!2srs" width="475" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>


@stop