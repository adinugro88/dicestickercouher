@extends('layouts.base_admin.base_dashboard')
@section('judul', 'Cabang')
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">cabang v2</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<livewire:cabang.index />

@endsection


@section('script_footer')
<script>
  window.addEventListener('close-modal', event => {
      $('#modal-lg').modal('hide');
      $('#cabangedit').modal('hide');
      $('#deletecabang').modal('hide');
  })
</script>
@endsection

