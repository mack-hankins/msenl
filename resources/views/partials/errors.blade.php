<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if (!empty($errors) AND ($errors->has()))
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>