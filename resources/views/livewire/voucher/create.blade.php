<div>

    <div wire:ignore.self x-data="{ open: false }" x-cloak class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Input Voucher</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form  wire:submit.prevent="nyimpencoy">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label>Jumlah Voucher</label>
                                <input type="text" wire:model="jmlvoucher" class="form-control">
                                @error('jmlvoucher') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label>Nilai Voucher</label>
                                <input type="text" wire:model="nilai" class="form-control">
                                @error('nilai') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label>Toko</label>
                                <select class="form-control select2" wire:model="tokoid" style="width: 100%;">
                                    @foreach($tokodata as $tokodatas)
                                        <option value="{{$tokodatas->id}}">{{$tokodatas->nama}}</option>
                                    @endforeach
                                </select>
                                @error('tokoid') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>

                    </form>
                </div>
                <div class="modal-footer justify-content-between">

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div wire:ignore.self x-data="{ open: false }" x-cloak class="modal fade" id="modal-manual">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Input Voucher Manual</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if (session()->has('gagalinput'))
                    <p id="hideMe" class="alert alert-warning">{{ session('gagalinput') }}</p>
                    @endif
                    <form  wire:submit.prevent="simpandata">
                        <div class="modal-body">
                            
                           
                            <div class="mb-3">
                                <label>Kode Awal Voucher</label>
                                <input type="text" wire:model="kodeawal" class="form-control">
                                @error('kodeawal') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label>Kode Akhir Voucher</label>
                                <input type="text" wire:model="kodeakhir" class="form-control">
                                @error('kodeakhir') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            
                            
                            <div class="mb-3">
                                <label>Nilai Voucher</label>
                                <input type="text" wire:model="nilai" class="form-control">
                                @error('nilai') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label>Toko</label>
                                <select class="form-control select2" wire:model="tokoid" style="width: 100%;">
                                    @foreach($tokodata as $tokodatas)
                                        <option value="{{$tokodatas->id}}">{{$tokodatas->nama}}</option>
                                    @endforeach
                                </select>
                                @error('tokoid') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>

                    </form>
                 
                  
                </div>
                <div class="modal-footer justify-content-between">

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    {{-- <div wire:ignore.self x-data="{ open: false }" x-cloak class="modal fade" id="modal-bykode">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Input Voucher Manual</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form  wire:submit.prevent="datakode">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label>By Kode</label>
                                <input type="text" wire:model="bykode" class="form-control">
                                @error('bykode') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label>Nilai Voucher</label>
                                <input type="text" wire:model="nilaiv" class="form-control">
                                @error('nilaiv') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label>Toko</label>
                                <select class="form-control select2" wire:model="tokoidm" style="width: 100%;">
                                    @foreach($tokodata as $tokodatas)
                                        <option value="{{$tokodatas->id}}">{{$tokodatas->nama}}</option>
                                    @endforeach
                                </select>
                                @error('telpon') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div> --}}

    <div wire:ignore.self class="modal fade" id="modaledit">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Toko </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form x-on:company-added.window="open = false" wire:submit.prevent="updatetoko">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label>Nama</label>
                                <input type="text" wire:model="nama" class="form-control">
                                @error('nama') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label>Alamat</label>
                                <input type="text" wire:model="alamat" class="form-control">
                                @error('alamat') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label>Telepon</label>
                                <input type="text" wire:model="no_telpon" class="form-control">
                                @error('no_telpon') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label>PIC</label>
                                <input type="text" wire:model="pic" class="form-control">
                                @error('pic') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>

                    </form>
                </div>
                <div class="modal-footer justify-content-between">

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <!-- Delete Student Modal -->
    <div wire:ignore.self class="modal fade" id="modalhapus" tabindex="-1"
        aria-labelledby="deleteStudentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteStudentModalLabel">Delete Student</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form wire:submit.prevent="hapuspermanen">
                    <div class="modal-body">
                        <b>hapus data secara permanen ?</b>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Yes! Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>

