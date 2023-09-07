@extends('layout.induk')

@section('isi-kandungan-utama')

<h1 class="mt-4">Kemaskini Aduan</h1>

<div class="card">
    <div class="card-body">

        @include('layout.alerts')

        <form method="POST" action="{{ route('admin.aduan.update', $aduan->id) }}">

            @csrf
            @method('PATCH')
            <input type="hidden" name="_method" value="PATCH">

            <div class="mb-3">
                <label class="form-label">Nama Pengadu</label>
                <input type="text" class="form-control @error('nama_pengadu') is-invalid @enderror" name="nama_pengadu" value="{{ $aduan->nama_pengadu }}">
                @error('nama_pengadu')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Email Pengadu</label>
                <input type="email" class="form-control @error('email_pengadu') is-invalid @enderror" name="email_pengadu" value="{{ $aduan->email_pengadu }}">
                @error('email_pengadu')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
              <label class="form-label">Telefon Pengadu</label>
              <input type="text" class="form-control" name="telefon_pengadu" value="{{ $aduan->telefon_pengadu }}">
            </div>

            <div class="mb-3">
              <label class="form-label">Jenis Aduan</label>
              <input type="text" class="form-control" name="jenis_aduan" value="{{ $aduan->jenis_aduan }}">
            </div>

            <div class="mb-3">
              <label class="form-label">Kandungan Aduan</label>
              <textarea class="form-control" name="kandungan_aduan">{{ $aduan->kandungan_aduan }}</textarea>
            </div>

            <div class="mb-3">
              <label class="form-label">Lokasi Aduan</label>
              <textarea class="form-control" name="lokasi_aduan"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>


    </div>
</div>

@endsection
