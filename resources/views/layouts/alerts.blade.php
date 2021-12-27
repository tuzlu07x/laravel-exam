@if (session('success'))
    <div class="alert alert-success">
        <i class="fas fa-check"></i>
        {{ session('success') }}
    </div>
@endif

@foreach ($errors->all() as $error)
    <div class="alert alert-danger">
        {{ $error }}
    </div>
@endforeach

@if (session('warning'))
    <div class="alert alert-warning">
        <i class="fas fa-radiation"></i>
        {{ session('warning') }}
    </div>
@endif
