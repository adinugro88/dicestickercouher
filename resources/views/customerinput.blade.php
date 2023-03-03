@extends('layouts.base_admin.base_dashboard')
@section('judul', 'Voucher')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Input Customer</h1>
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
<livewire:customer.index />

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
