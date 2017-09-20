@if (count($errors) > 0)
    <div class="alert alert-danger text-center">
        <ul class="list-unstyled">
            @foreach ($errors->all() as $error)
                <li></li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif