@if (count($errors))
    <ul class="list-group">
        @foreach($errors->all() as $error)
            <li class="list-group-item list-group-item-danger" role="alert">{{ $error }}</li>
        @endforeach
    </ul>
@endif