@extends('layout.induk')

@section('isi-kandungan-utama')

<h1 class="mt-4">Borang Aduan</h1>

<div class="card">
    <div class="card-body">


        <form>

            <div class="mb-3">
              <label class="form-label">Nama Pengadu</label>
              <input type="text" class="form-control" name="nama_pengadu">
            </div>

            <div class="mb-3">
              <label class="form-label">Email Pengadu</label>
              <input type="email" class="form-control" name="email_pengadu">
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
