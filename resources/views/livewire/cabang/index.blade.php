<div>
    @include('livewire.cabang.create')

    <section class="content">
        <div class="container-fluid">
            <button type="button" class="btn btn-info my-2" data-toggle="modal" data-target="#modal-lg">
                Input Data
            </button>

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
                            <h3 class="card-title">List Cabang</h3>

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
                                           
                                            <th>nama</th>
                                            <th>lokasi</th>
                                            <th>telepon</th>
                                            <th>keterangan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                   

                                        @forelse ($cabang as $cabangs)
                                        <tr>
                                      
                                            <td>{{ $cabangs->nama }}</td>
                                            <td>{{ $cabangs->lokasi }}</td>
                                            <td>{{ $cabangs->telpon }}</td>
                                            <td>{{ $cabangs->keterangan }}</td>
                                            <td>
                                                <button type="button" class="btn btn-info my-2" data-toggle="modal" data-target="#cabangedit" wire:click="edits({{$cabangs->id}})">
                                                    Edit
                                                </button>
                                                <button type="button" data-toggle="modal" data-target="#deletecabang" wire:click="deleteStudent({{$cabangs->id}})" class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="5">No Record Found</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                @if ($cabang->hasPages())
                                <nav role="navigation" aria-label="Pagination Navigation"
                                    class="flex justify-center py-2">
                                    {{-- Previous Page Link --}}
                                    @if ($cabang->onFirstPage())
                                    <span class="mr-3">
                                        Sebelumnya
                                    </span>
                                    @else
                                    <button wire:click="previousPage" rel="prev" class="button btn-info">
                                        Sebelumnya
                                    </button>
                                    @endif

                                    {{-- Next Page Link --}}
                                    @if ($cabang->hasMorePages())
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
