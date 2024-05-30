@extends('products.layout')

@section('content')
    <div class="card mt-5">
        <h2 class="card-header">Level Almet 2024</h2>
        <div class="card-body">

            @if (session('message'))
                <div class="alert alert-{{ session('alert-type') }}">
                    {{ session('message') }}
                </div>
            @endif
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-success btn-sm" href="{{ route('levels.create') }}"> <i class="fa fa-plus"></i> Create New
                    Level</a>
            </div>

            <table class="table table-bordered table-striped mt-4">
                <thead>
                    <tr>
                        <th width="80px">No</th>
                        <th>Nama Level</th>
                        <th width="250px">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($levels as $level)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $level->nama_level }}</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{ route('levels.edit', $level->id) }}"><i
                                        class="fa-solid fa-pen-to-square"></i></a>

                                <form id="deleteForm{{ $level->id }}" class="d-inline"
                                    action="{{ route('levels.destroy', $level->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="button" onclick="deleteproduct({{ $level->id }})"
                                        class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>

                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">There are no data.</td>
                        </tr>
                    @endforelse
                </tbody>

            </table>

            {!! $levels->links() !!}

        </div>
    </div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function deleteproduct(id) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Deleted!",
                    icon: "success",
                    title: "Data Berhasil Dihapus",
                    timer: 5000
                });
                document.getElementById('deleteForm'+id).submit();
            }
        });
    }
</script>
