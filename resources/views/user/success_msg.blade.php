@if(Session::has('message'))

<div style="margin-top: 10px;" class="alert alert-warning alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert">
        <i class="fa fa-times"></i>
    </button>
    {{ session('message') }}
</div>

@endif
