@extends('products.layout')

@section('content')

<div class="card mt-5">
  <h2 class="card-header">Add New Jabatan</h2>
  <div class="card-body">

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('jabatan.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>

    <form id="jabatanForm" action="{{ route('jabatans.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="inputName" class="form-label"><strong>Nama Jabatan: </strong></label>
            <input
                type="text"
                name="nama_jabatan"
                class="form-control @error('nama_jabatan') is-invalid @enderror"
                id="inputName"
                placeholder="Nama Jabatan">
            @error('nama_jabatan')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputLevel" class="form-label"><strong>Level: </strong></label>
            <select name="id_level" class="form-control @error('id_level') is-invalid @enderror" id="inputLevel">
                <option value="">Select Level</option>
                @foreach($levels as $level)
                    <option value="{{ $level->id }}">{{ $level->nama_level }}</option>
                @endforeach
            </select>
            @error('id_level')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
    </form>

  </div>
</div>

@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#jabatanForm').submit(function(event) {
            event.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    alert('Data berhasil ditambahkan!');
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('Terjadi kesalahan saat menambahkan data!');
                }
            });
        });
    });
</script>
@endsection
