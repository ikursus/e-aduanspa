@extends('layout.induk')

@push('js-extra')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('/') }}themes/sbadmin/assets/demo/chart-area-demo.js"></script>
<script src="{{ asset('/') }}themes/sbadmin/assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('/') }}themes/sbadmin/js/datatables-simple-demo.js"></script>
@endpush

@section('isi-kandungan-utama')

<h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Primary Card</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Warning Card</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Success Card</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Danger Card</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-area me-1"></i>
                    Area Chart Example
                </div>
                <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-bar me-1"></i>
                    Bar Chart Example
                </div>
                <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
            </div>
        </div>
    </div>
    <div class="card mb-4">
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
                        <td>{{ $aduan['nama_pengadu'] }}</td>
                        <td>{{ $aduan['email_pengadu'] }}</td>
                        <td>{{ $aduan['telefon_pengadu'] }}</td>
                        <td>{{ $aduan['jenis_aduan'] }}</td>
                        <td>{{ $aduan['tarikh_aduan'] }}</td>
                        <td>{{ $aduan['status_aduan'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('isi-kandungan-kedua')
<h1>Test Isi Kandungan Kedua</h1>
@endsection
