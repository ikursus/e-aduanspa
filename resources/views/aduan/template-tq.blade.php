@extends('layout.induk')

@section('isi-kandungan-utama')

@if (!is_null($aduan))

<h1>Terima kasih. Berikut adalah maklumat status aduan anda</h1>

<table class="table">
    <thead>
        <tr>
            <th>PERKARA</th>
            <th>BUTIRAN</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>NO TIKET ADUAN</td>
            <td>
                {{ $aduan->no_tiket }}
                <div class="alert alert-info">
                    Sila simpan no tiket ini untuk rujukan anda.
                </div>
            </td>
        </tr>
        <tr>
            <td>NAMA PENGADU</td>
            <td>{{ $aduan->nama_pengadu }}</td>
        </tr>
        <tr>
            <td>JENIS ADUAN</td>
            <td>{{ $aduan->jenis_aduan }}</td>
        </tr>
        <tr>
            <td>STATUS ADUAN</td>
            <td>{{ $aduan->status_aduan }}</td>
        </tr>
    </tbody>
</table>

@else

<h1>Tiada rekod aduan yang dijumpai</h1>

@endif

@endsection
