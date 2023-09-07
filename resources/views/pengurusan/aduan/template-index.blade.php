@extends('layout.induk')

@section('isi-kandungan-utama')

<div class="card mt-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        DataTable Example
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Nama Pengadu</th>
                    <th>Email Pengadu</th>
                    <th>Telefon Pengadu</th>
                    <th>Jenis Aduan</th>
                    <th>Tarikh Aduan</th>
                    <th>Status Aduan</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Nama Pengadu</th>
                    <th>Email Pengadu</th>
                    <th>Telefon Pengadu</th>
                    <th>Jenis Aduan</th>
                    <th>Tarikh Aduan</th>
                    <th>Status Aduan</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($senaraiAduan as $aduan)
                <tr>
                    <td>{{ $aduan->nama_pengadu }}</td>
                    <td>{{ $aduan->email_pengadu }}</td>
                    <td>{{ $aduan->telefon_pengadu }}</td>
                    <td>{{ $aduan->jenis_aduan }}</td>
                    <td>{{ $aduan->created_at }}</td>
                    <td>{{ $aduan->status_aduan }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
