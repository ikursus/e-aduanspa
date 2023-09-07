@extends('layout.induk')

@section('isi-kandungan-utama')

<div class="card mt-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Senarai Aduan
    </div>
    <div class="card-body">

        @include('layout.alerts')

        {{-- <form method="POST" action="{{ route('admin.aduan.bulk.update') }}">
            @csrf
            @method('PATCH') --}}
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Pengadu</th>
                    <th>Email Pengadu</th>
                    <th>Telefon Pengadu</th>
                    <th>Jenis Aduan</th>
                    <th>Tarikh Aduan</th>
                    <th>Status Aduan</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Nama Pengadu</th>
                    <th>Email Pengadu</th>
                    <th>Telefon Pengadu</th>
                    <th>Jenis Aduan</th>
                    <th>Tarikh Aduan</th>
                    <th>Status Aduan</th>
                    <th>Tindakan</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($senaraiAduan as $aduan)
                <tr>
                    <td>
                        <input type="checkbox" name="id_aduan[]" value="{{ $aduan->id }}">
                    </td>
                    <td>{{ $aduan->nama_pengadu }}</td>
                    <td>{{ $aduan->email_pengadu }}</td>
                    <td>{{ $aduan->telefon_pengadu }}</td>
                    <td>{{ $aduan->jenis_aduan }}</td>
                    <td>{{ $aduan->created_at }}</td>
                    <td>{{ $aduan->status_aduan }}</td>
                    <td>
                        <a href="{{ route('admin.aduan.edit', $aduan->id) }}" class="btn btn-info">Edit</a>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $aduan->id }}">
                            Delete
                        </button>

                        <!-- Modal Buka -->
                        <form method="POST" action="{{ route('admin.aduan.destroy', $aduan->id) }}">
                            @csrf
                            @method('DELETE')
                        <div class="modal fade" id="modal-delete-{{ $aduan->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Pengesahan Delete</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                Adakah anda bersetuju untuk menghapuskan data ini?
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Teruskan Delete</button>
                                </div>
                            </div>
                            </div>
                        </div>

                        </form>
                        <!-- Modal Tutup -->

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{-- <button type="submit" class="btn btn-primary mt-4">Kemaskini Bulk</button>

        </form> --}}

    </div>
</div>

@endsection

@push('js-extra')
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('/') }}themes/sbadmin/js/datatables-simple-demo.js"></script>
@endpush
