<div id="page-header">
    <div class="container">
        <h1>{{ Title::last() }}</h1>

        <p>
            <span>{{ $description }}</span>
        </p>
    </div>
</div>

@if (!empty($errors) AND ($errors->has()))
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            {{ $error }}
        </div>
    @endforeach
@endif