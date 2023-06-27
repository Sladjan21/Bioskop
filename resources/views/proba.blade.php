@extends('layouts.adminLayout')

@section('content')
<div class="mt-5 pt-5">

    <button type="button" class="btn btn-primary" onclick="toasty()" id="liveToastBtn">Show live toast</button>

    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="..." class="rounded me-2" alt="...">
                <strong class="me-auto">Bootstrap</strong>
                <small>11 mins ago</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Hello, world! This is a toast message.
            </div>
        </div>
    </div>
</div>
<script>
    let option = {
        animation:true,
        delay:2000
    };
    function toasty()
    {
        let toast = document.getElementById('liveToast');

        let toastElement = new bootstrap.Toast(toast,option);

        toastElement.show();
    }
</script>
@stop