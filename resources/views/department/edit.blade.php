@extends('products.layout')

@section('content')

<div class="card mt-5">
  <h2 class="card-header">Edit Product</h2>
  <div class="card-body">

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('department.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>

    <form action="{{ route('departments.update', $departments->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="inputName" class="form-label"><strong>Name:</strong></label>
            <input
                type="text"
                name="nama_dept"
                value="{{ $departments->nama_dept }}"
                class="form-control @error('nama_dept') is-invalid @enderror"
                id="inputName"
                placeholder="Nnama_deptame">
            @error('nama_dept')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Update</button>
    </form>

  </div>
</div>
@endsection
