<div>
    @include('livewire.voucher.create')

    <section class="content">
        <div class="container-fluid">
            <button type="button" class="btn btn-info my-2" data-toggle="modal" data-target="#modal-lg">
                Input Data Urut
            </button>
            <button type="button" class="btn btn-warning my-2" data-toggle="modal" data-target="#modal-manual">
                Input Data Manual
            </button>

            {{-- <button type="button" class="btn btn-primary my-2" data-toggle="modal" data-target="#modal-bykode">
                Input Data bykode
            </button> --}}

            @if ($checkdel)
            <button  type="button" data-toggle="modal" data-target="#modalhapus"  class="btn btn-danger" >hapus data terpilih {{count($checkdel)}}</button>
            @endif
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
                            <div class="row">
                                <div class="col-md-1 text-right" style="width: 50px">
                                    <label for="">Status</label>
                                </div>
                                <div class="col-md-1">
                                    <select class="form-control " wire:model='search'>
                                        <option value="">all</option>
                                        <option value="active">active</option>
                                        <option value="terpakai">terpakai</option>
                                    </select>
                                </div>
                                <div class="col-md-1 text-right" style="width: 50px">
                                    <label for="">Toko</label>
                                </div>
                                <div class="col-md-1">
                                    <select class="form-control " wire:model='search2'>
                                        <option value="">all</option>
                                        @foreach ( $listtoko as $tokolist )
                                        <option value="{{ $tokolist->id  }}" >{{ $tokolist->nama  }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-1 text-right" style="width: 50px">
                                    <label for="">Total Data</label>
                                </div>
                                <div class="col-md-1">
                                   <b>{{count($voucher)}}</b>
                                </div>
                            </div>

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
                                            <th>Kode</th>
                                            <th>status</th>
                                            <th>nilai</th>
                                            <th>Toko</th>
                                            <th>Fee Vouchers</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($voucher as $vouchers)
                                        <tr>
                                            <td>{{  'DS -'.str_pad($vouchers->kode,4,'0',STR_PAD_LEFT)}}</td>
                                            <td> 
                                                @if ( $vouchers->status == 'active')
                                                <span class="badge badge-info">{{ $vouchers->status }}</td></span> 
                                                @else
                                                <span class="badge badge-success">{{ $vouchers->status }}</td></span> 
                                                @endif
                                                
                                            <td>Rp {{ number_format( $vouchers->nilai_value, 0, ',', '.') }}</td>
                                            <td>{{ $vouchers->toko->nama  }}</td>
                                            <td>Rp {{ number_format( $vouchers->fee_voucer, 0, ',', '.')   }}</td>
                                            @if ($vouchers->status == 'active')
                                                 <td><input type="checkbox" wire:model='checkdel' value="{{$vouchers->id}}" id=""></td>
                                            @else
                                            <td></td>   
                                             
                                            @endif
                                            
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="5">No Record Found</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                @if ($voucher->hasPages())
                                <nav role="navigation" aria-label="Pagination Navigation"
                                    class="flex justify-center py-2">
                                    {{-- Previous Page Link --}}
                                    @if ($voucher->onFirstPage())
                                    <span class="mr-3">
                                        Sebelumnya
                                    </span>
                                    @else
                                    <button wire:click="previousPage" rel="prev" class="button btn-info">
                                        Sebelumnya
                                    </button>
                                    @endif

                                    {{-- Next Page Link --}}
                                    @if ($voucher->hasMorePages())
                                    <button wire:click="nextPage" rel="next" class="button btn-primary ml-3">
                                        Selanjutnya
                                    </button>
                                    @else
                                    <span class="ml-3">
                                        Selanjutnya
                                    </span>
                                    @endif
                                </nav>
                                @endif
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


</div>