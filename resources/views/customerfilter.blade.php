@extends('layouts.base_admin.base_dashboard')
@section('judul', 'Voucher')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Report Voucher</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">voucher </li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">
        <form action="" method="get">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        @foreach ( $namatoko as $data )
                        <label>Toko  : {{$data->nama}}</label>
                        @endforeach
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label> Tanggal Start  : {{ \Carbon\Carbon::parse($tglawal)->format('d F Y')}}</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label> Tanggal Akhir  : {{ \Carbon\Carbon::parse($tglakhir)->format('d F Y')}}</label>
                    </div>
                </div>

                <div class="col-md-2 ml-5">
                    <div class="form-group">
                        <a href="/dashboard/admin/report" class="btn btn-primary col start">
                            <i class="fas fa-back"></i>
                            <span>Kembali</span>
                        </a>
                    </div>
                </div>
            </div>


        </form>

        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <div class="col-md-12">
                @if (session()->has('message'))
                <p id="hideMe" class="alert alert-success">{{ session('message') }}</p>
                @endif
                <!-- TABLE: LATEST ORDERS -->
                <div class="card">
                    <div class="card-header border-transparent">
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            {{-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button> --}}
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                    <tr>
                                        <th>tanggal</th>
                                        <th>No_invoice</th>
                                        <th>Voucher </th>
                                        <th>Fee</th>
                                        <th>Cabang Claim</th>

                                    </tr>
                                </thead>
                                <tbody>
                                  @php
                                      $total = 0;
                                  @endphp
                                    @forelse ($listcust as $custs)
                                    <tr>
                                        <td>{{ $custs->created_at }}</td>
                                        <td>{{ $custs->No_Invoice }}</td>
                                        <td>{{ 'DS -'.str_pad($custs->voucher->kode,4,'0',STR_PAD_LEFT)}}</td>
                                        <td>Rp {{number_format( $custs->voucher->fee_voucer, 0, ',', '.') }}</td>
                                        <td>{{ $custs->Cabang->nama  }}</td>
                                    </tr>
                                    @php
                                    $total += $custs->voucher->fee_voucer
                                    @endphp
                                    @empty
                                    <tr>
                                        <td colspan="5">No Record Found</td>
                                    </tr>

                                    
                                    @endforelse
                                </tbody>
                            </table>

                           


                        </div>
                        
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                   
                </div>
                <!-- /.card -->
                <h4>    
                  Total Fee Toko sebesar Rp {{ number_format( $total, 0, ',', '.')}}
              </h4>
            </div>
            <!-- /.col -->

            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!--/. container-fluid -->
</section>


@endsection


@section('script_footer')
<script>
    window.addEventListener('close-modal', event => {
        $('#modal-lg').modal('hide');
        $('#modaledit').modal('hide');
        $('#modalhapus').modal('hide');
    })

</script>
@endsection
