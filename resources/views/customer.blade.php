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
        <form action="/dashboard/admin/report/date/" method="get">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Toko List :</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <select name="tokoid" class="form-control" id="" required>
                                <option value="">pilih toko</option>
                                @foreach ($toko as $item)
                                <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                            @error('tokoid')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Start Date :</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input type="date" name="tglawal" class="form-control datetimepicker-input"
                                data-target="#reservationdate" required>
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                        @error('tglawal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>End Date :</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input type="date" name="tglakhir" class="form-control datetimepicker-input"
                                data-target="#reservationdate" required>
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                        @error('tglakhir')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Search Data :</label>
                        <button type="submit" class="btn btn-success col start">
                            <i class="fas fa-search"></i>
                            <span>Search Data</span>
                        </button>
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
                                        <th>No_invoice</th>
                                        <th>Voucher </th>
                                        <th>Toko</th>
                                        <th>Cabang</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($listcust as $custs)
                                    <tr>
                                        <td>{{ $custs->No_Invoice }}</td>
                                        <td>{{ 'DS -'.str_pad($custs->voucher->kode,4,'0',STR_PAD_LEFT)}}</td>
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
                            {{$listcust->links()}}
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->

                </div>
                <!-- /.card -->
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
