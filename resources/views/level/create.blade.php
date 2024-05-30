@extends('products.layout')

@section('content')

<div class="card mt-5">
  <h2 class="card-header">Add New Product</h2>
  <div class="card-body">

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('level.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>

    <form action="{{ route('levels.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="inputName" class="form-label"><strong>Nama level: </strong></label>
            <input
                type="text"
                name="nama_level"
                class="form-control @error('nama_level') is-invalid @enderror"
                id="inputName"
                placeholder="nama_level">
            @error('nama_level')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
    </form>

  </div>
</div>
@endsection
