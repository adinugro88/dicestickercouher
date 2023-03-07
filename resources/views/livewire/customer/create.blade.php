<div>
    <div wire:ignore.self class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Input Customer Baru</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form x-on:company-added.window="open = false" wire:submit.prevent="simpan">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label>No invoice</label>
                                        <input type="text" wire:model="noinvoice" class="form-control">
                                        @error('noinvoice') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label>Toko </label>
                                        <select class="form-control select2" wire:model="tokopil" style="width: 100%;">
                                            <option value="">pilih Toko</option>
                                            @if(!empty($toko))
                                            @foreach($toko as $datacuk)
                                            <option value="{{$datacuk->id}}">{{$datacuk->nama}}</option>
                                            @endforeach
                                            @endif

                                        </select>
                                        @error('tokopil') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label>Voucher</label>
                                        <select class="form-control select2" wire:model="voucherpil"
                                            style="width: 100%;">
                                            <option value="">pilih Voucher</option>
                                            @if(!empty($lstvoucher))
                                            @foreach($lstvoucher as $vouch)
                                            <option value="{{$vouch->id}}">
                                                {{  'DS -'.str_pad($vouch->kode,5,'0',STR_PAD_LEFT)}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                        @error('voucherpil') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label>Cabang</label>
                                        <select class="form-control select2" wire:model="cabangpil"
                                            style="width: 100%;">
                                            <option value="">pilih cabang</option>
                                            @if(!empty($cabang))
                                            @foreach($cabang as $cabangs)
                                            <option value="{{$cabangs->id}}">{{$cabangs->nama}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                        @error('cabangpil') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>

                                </div>
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

    <div wire:ignore.self class="modal fade" id="modaledit">
        <div class="modal-dialog modal-lg">
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
                            <div class="row">
                            
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label>No invoice</label>
                                        <input type="text" wire:model="noinvoice" class="form-control">
                                        @error('noinvoice') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label>Toko </label>
                                        <select class="form-control select2" wire:model="tokopil" style="width: 100%;">
                                            <option value="">pilih Toko</option>
                                            @if(!empty($toko))
                                            @foreach($toko as $datacuk)
                                            <option @selected(old('version') == $datacuk) value="{{$datacuk->id}}">{{$datacuk->nama}}</option>
                                            @endforeach
                                            @endif

                                        </select>
                                        @error('tokopil') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label>Voucher</label>
                                        <select class="form-control select2" wire:model="voucherpil"
                                            style="width: 100%;">
                                            <option value="">pilih Voucher</option>
                                            @if(!empty($lstvoucher))
                                            @foreach($lstvoucher as $vouch)
                                            <option value="{{$vouch->id}}">
                                                {{  'DS -'.str_pad($vouch->kode,5,'0',STR_PAD_LEFT)}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                        @error('voucherpil') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label>Cabang</label>
                                        <select class="form-control select2" wire:model="cabangpil"
                                            style="width: 100%;">
                                            <option value="">pilih cabang</option>
                                            @if(!empty($cabang))
                                            @foreach($cabang as $cabangs)
                                            <option value="{{$cabangs->id}}">{{$cabangs->nama}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                        @error('cabangpil') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>

                                </div>
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

    <div wire:ignore.self class="modal fade" id="modalhapus" tabindex="-1" aria-labelledby="deleteStudentModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteStudentModalLabel">Delete toko</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="destroyStudent">
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
