@extends('products.layout')

@section('content')

<div class="card mt-5">
  <h2 class="card-header">Edit Level</h2>
  <div class="card-body">

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('level.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>

    <form id="editLevelForm" action="{{ route('levels.update', $levels->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="inputName" class="form-label"><strong>Name:</strong></label>
            <input
                type="text"
                name="nama_level"
                value="{{ $levels->nama_level }}"
                class="form-control @error('nama_level') is-invalid @enderror"
                id="inputName"
                placeholder="Nama Level">
            @error('nama_level')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Update</button>
    </form>

  </div>
</div>

@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#editLevelForm').submit(function(event) {
            event.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: 'PUT',
                url: $(this).attr('action'),
                data: formData,
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    alert('Data berhasil diperbarui!');
                    window.location.href = "{{ route('level.index') }}";
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('Terjadi kesalahan saat memperbarui data!');
                }
            });
        });
    });
</script>
@endsection
