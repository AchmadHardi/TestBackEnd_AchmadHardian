@extends('products.layout')

@section('content')

<div class="card mt-5">
  <h2 class="card-header">Edit Karyawan</h2>
  <div class="card-body">

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('karyawan.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>

    <form id="editKaryawanForm" action="{{ route('karyawans.update', $karyawan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="inputNomorKaryawan" class="form-label"><strong>Nomor Karyawan:</strong></label>
            <input
                type="text"
                name="nik"
                value="{{ $karyawan->nik }}"
                class="form-control @error('nik') is-invalid @enderror"
                id="inputNomorKaryawan"
                placeholder="Nomor Karyawan">
            @error('nik')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputNama" class="form-label"><strong>Nama:</strong></label>
            <input
                type="text"
                name="nama"
                value="{{ $karyawan->nama }}"
                class="form-control @error('nama') is-invalid @enderror"
                id="inputNama"
                placeholder="Nama">
            @error('nama')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputTanggalLahir" class="form-label"><strong>Tanggal Lahir:</strong></label>
            <input
                type="date"
                name="ttl"
                value="{{ $karyawan->ttl }}"
                class="form-control @error('ttl') is-invalid @enderror"
                id="inputTanggalLahir">
            @error('ttl')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputAlamat" class="form-label"><strong>Alamat:</strong></label>
            <textarea
                name="alamat"
                class="form-control @error('alamat') is-invalid @enderror"
                id="inputAlamat"
                placeholder="Alamat">{{ $karyawan->alamat }}</textarea>
            @error('alamat')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputJabatan" class="form-label"><strong>Jabatan:</strong></label>
            <select name="id_jabatan" class="form-control @error('id_jabatan') is-invalid @enderror" id="inputJabatan">
                <option value="">Select Jabatan</option>
                @foreach($jabatans as $jabatan)
                    <option value="{{ $jabatan->id }}" {{ $karyawan->id_jabatan == $jabatan->id ? 'selected' : '' }}>{{ $jabatan->nama_jabatan }}</option>
                @endforeach
            </select>
            @error('id_jabatan')
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
        $('#updateKaryawanBtn').click(function() {
            var formData = $('#editKaryawanForm').serialize();
            $.ajax({
                type: 'PUT',
                url: $('#editKaryawanForm').attr('action'),
                data: formData,
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    alert('Data berhasil diperbarui!');
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
