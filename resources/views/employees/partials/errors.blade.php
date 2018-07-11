@if ($errors->any())
    <div class="col-xs-offset-2 col-xs-4">
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif