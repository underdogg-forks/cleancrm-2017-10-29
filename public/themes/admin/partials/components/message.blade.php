<div class="container">
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible" role="alert">
    @else
        <div class="alert alert-success alert-dismissible" role="alert">
    @endif
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{ session('message') }}
    </div>
</div>
