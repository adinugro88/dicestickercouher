@extends('layouts.base_admin.base_dashboard')
@section('judul', 'Dashboard')
@section('content')



<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard v2</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard v2</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Cabang</span>
                        <span class="info-box-number">
                            {{count($cabang)}}

                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Toko</span>
                        <span class="info-box-number"> {{count($toko)}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-bookmark"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Voucher</span>
                        <span class="info-box-number"> {{count($voucher)}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Customers</span>
                        <span class="info-box-number"> {{count($cust)}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->



        <!-- Main row -->
        <div class="row">
            <!-- Left col -->

            <div class="col-md-6">

                <!-- TABLE: LATEST ORDERS -->
                <div class="card">
                    <div class="card-header border-transparent">
                        <h3 class="card-title">List Voucher terpakai</h3>

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
                                        <th>kode </th>
                                        <th>nilai</th>
                                        <th>status</th>
                                        <th>toko</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($voucherpake as $vouch)
                                    <tr>
                                        <td>{{ $vouch->kode }}</td>
                                        <td>{{ $vouch->nilai_value }}</td>
                                        <td>{{ $vouch->status }}</td>
                                        <td>{{ $vouch->toko->nama }} </td>
                                    </tr>
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

                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-6">

                <!-- TABLE: LATEST ORDERS -->
                <div class="card">
                    <div class="card-header border-transparent">
                        <h3 class="card-title">List Toko</h3>

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
                                        <th>Toko </th>
                                        <th>PIC</th>
                                        <th>Alamat</th>
                                        <th>No Telepon </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($toko as $tokodata)
                                    <tr>
                                        <td>{{ $tokodata->nama }}</td>
                                        <td>{{ $tokodata->PIC}}</td>
                                        <td>{{ $tokodata->alamat}}</td>
                                        <td>{{ $tokodata->no_telpon}}</td>
                                    </tr>
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

                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->



            <div class="col-12">


                <div class="card">
                    <div class="card-header border-transparent">
                        <h3 class="card-title">List Customer</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>

                        </div>
                    </div>

                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                    <tr>
                                        <th>nama</th>
                                        <th>Alamat </th>
                                        <th>telepon</th>
                                        <th>Produk</th>
                                        <th>Harga</th>
                                        <th>Voucher </th>
                                        <th>Toko</th>
                                        <th>Cabang</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($cust as $custs)
                                    <tr>
                                        <td>{{ $custs->nama }}</td>
                                        <td>{{ $custs->alamat }}</td>
                                        <td>{{ $custs->telpon }}</td>
                                        <td>{{ $custs->produk }} </td>
                                        <td> Rp {{ number_format( $custs->harga, 0, ',', '.') }}</td>
                                        <td>{{  'DS -'.str_pad($custs->voucher->kode,5,'0',STR_PAD_LEFT)}}</td>
                                        <td>{{ $custs->toko->nama  }}</td>
                                        <td>{{ $custs->Cabang->nama  }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5">No Record Found</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>

            </div>

            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!--/. container-fluid -->
</section>
<!-- /.content -->

@endsection
