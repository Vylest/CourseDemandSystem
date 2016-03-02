@if(Session::has('message'))
    <div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> {{ Session::get('message') }}</div>
@endif