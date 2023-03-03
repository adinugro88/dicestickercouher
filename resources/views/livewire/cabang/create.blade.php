<div>
    <div wire:ignore.self x-data="{ open: false }" x-cloak class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Input Cabang Baru</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form x-on:company-added.window="open = false" wire:submit.prevent="simpan">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label>Nama</label>
                                <input type="text" wire:model="nama" class="form-control">
                                @error('nama') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label>Lokasi</label>
                                <input type="text" wire:model="lokasi" class="form-control">
                                @error('lokasi') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label>Telepon</label>
                                <input type="text" wire:model="telpon" class="form-control">
                                @error('telpon') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label>Keterangan</label>
                                <select class="form-control select2" wire:model="keterangan" style="width: 100%;">
                                    <option selected="selected">active</option>
                                    <option>non active</option>
                            
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
    </div>

    <div wire:ignore.self class="modal fade" id="cabangedit">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Cabang Baru</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form x-on:company-added.window="open = false" wire:submit.prevent="updatecabang">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label>Nama</label>
                                <input type="text" wire:model="nama" class="form-control">
                                @error('nama') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label>Lokasi</label>
                                <input type="text" wire:model="lokasi" class="form-control">
                                @error('lokasi') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label>Telepon</label>
                                <input type="text" wire:model="telpon" class="form-control">
                                @error('telpon') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label>Keterangan</label>
                                <select class="form-control select2" wire:model="keterangan" style="width: 100%;">
                                    <option selected="selected">active</option>
                                    <option>non active</option>
                             
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
    </div>

    <!-- Delete Student Modal -->
    <div wire:ignore.self class="modal fade" id="deletecabang" tabindex="-1"
        aria-labelledby="deleteStudentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteStudentModalLabel">Delete cabang</h5>
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
