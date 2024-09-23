@if(Session::has('message'))

<div style="margin-inline: auto;" class="alert alert-warning alert-dismissible fade show col-7" role="alert">
    <strong>{{Session::get('message')}}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

@endif
