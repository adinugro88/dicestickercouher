<?php

namespace App\Http\Livewire\Cabang;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Cabang;

class Index extends Component
{

    use WithPagination;
    public $nama,$lokasi,$telpon,$keterangan = 'active',$cabangid;
    public $search = '';

    protected function rules()
    {
        return [
            'nama' => 'required|string|min:6',
            'lokasi' => 'required',
            'telpon' => 'required|string',
            'keterangan' => 'required',
        ];
    }
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function simpan()
    {
        $validatedData = $this->validate();
        Cabang::create($validatedData);
        session()->flash('message','Cabang berhasil input');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    
    }

    public function edits(int $cabangid)
    {
        $cabang = Cabang::find($cabangid);
        if($cabang){

            $this->cabangid = $cabang->id;
            $this->nama = $cabang->nama;
            $this->lokasi = $cabang->lokasi;
            $this->telpon = $cabang->telpon;
            $this->keterangan = $cabang->keterangan;
        }else{
            return redirect()->to('/dashboard/admin/cabang');
        }
    }

    public function updatecabang()
    {
        $validatedData = $this->validate();

        Cabang::where('id',$this->cabangid)->update([
            'nama' => $validatedData['nama'],
            'lokasi' => $validatedData['lokasi'],
            'telpon' => $validatedData['telpon'],
            'keterangan' => $validatedData['keterangan'],
        ]);
        session()->flash('message','cabang Updated ');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function deleteStudent(int $cabangid)
    {
        $this->cabangid = $cabangid;
    }

    public function destroyStudent()
    {
        Cabang::find($this->cabangid)->delete();
        $this->dispatchBrowserEvent('close-modal');
        session()->flash('message','Cabang dihapus');
    
    }

    public function resetInput()
    {
        $this->nama = '';
        $this->lokasi = '';
        $this->telpon = '';
        $this->keterangan = 'active';
    }
    public function render()
    {
        $cabang = Cabang::where('nama', 'like', '%'.$this->search.'%')->orderBy('id','ASC')->paginate(10);
        return view('livewire.cabang.index', ['cabang' => $cabang]);
    }
}
