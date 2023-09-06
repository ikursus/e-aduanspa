@extends('layout.induk')

@section('isi-kandungan-utama')

<h1 class="mt-4">Borang Aduan</h1>

<div class="card">
    <div class="card-body">

        @include('layout.alerts')

        <form method="POST" action="">

            @csrf
            {{ csrf_field() }}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="mb-3">
                <label class="form-label">Nama Pengadu</label>
                <input type="text" class="form-control @error('nama_pengadu') is-invalid @enderror" name="nama_pengadu">
                @error('nama_pengadu')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Email Pengadu</label>
                <input type="email" class="form-control @error('email_pengadu') is-invalid @enderror" name="email_pengadu">
                @error('email_pengadu')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
              <label class="form-label">Telefon Pengadu</label>
              <input type="text" class="form-control" name="telefon_pengadu">
            </div>

            <div class="mb-3">
              <label class="form-label">Jenis Aduan</label>
              <input type="text" class="form-control" name="jenis_aduan">
            </div>

            <div class="mb-3">
              <label class="form-label">Maklumat Aduan</label>
              <textarea class="form-control" name="maklumat_aduan"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>


    </div>
</div>

@endsection
