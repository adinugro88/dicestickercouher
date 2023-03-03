<?php

namespace App\Http\Livewire\Toko;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Toko;

class Index extends Component
{
    use WithPagination;
    public $nama,$alamat,$no_telpon,$pic,$tokoid,$nama_bank,$Akun_Bank;
    public $search;

    protected function rules()
    {
        return [
            'nama'      => 'required',
            'alamat'    => 'required',
            'no_telpon' => 'required',
            'pic'       => 'required',
            'nama_bank'  => 'required',
            'Akun_Bank'    => 'required',
        ];
    }
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function simpan()
    {
        $validatedData = $this->validate();
        Toko::create($validatedData);
        session()->flash('message','Toko berhasil input');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    
    }

    public function edits(int $tokoid)
    {
        $toko = Toko::find($tokoid);
        if($toko){
            $this->tokoid       = $toko->id;
            $this->nama         = $toko->nama;
            $this->alamat       = $toko->alamat;
            $this->no_telpon    = $toko->no_telpon;
            $this->pic          = $toko->PIC;
            $this->nama_bank    = $toko->nama_bank;
            $this->Akun_Bank    = $toko->Akun_Bank;
        }else{
            return redirect()->to('/dashboard/admin/toko');
        }
    }

    public function updatetoko()
    {
        $validatedData = $this->validate();

        Toko::where('id',$this->tokoid)->update([
            'nama' => $validatedData['nama'],
            'alamat' => $validatedData['alamat'],
            'no_telpon' => $validatedData['no_telpon'],
            'pic' => $validatedData['pic'],
            'nama_bank' => $validatedData['nama_bank'],
            'Akun_Bank' => $validatedData['Akun_Bank'],
        ]);
        session()->flash('message','toko Updated ');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function deleteStudent(int $tokoid)
    {
        $this->tokoid = $tokoid;
    }

    public function destroyStudent()
    {
        Toko::find($this->tokoid)->delete();
        $this->dispatchBrowserEvent('close-modal');
        session()->flash('message','Toko dihapus');
    
    }

    public function resetInput()
    {
        $this->nama = '';
        $this->alamat = '';
        $this->no_telpon = '';
        $this->pic = '';
        $this->nama_bank = '';
        $this->Akun_Bank = '';
    }
    
 

    public function render()
    {
       
        $toko = Toko::where('nama', 'like', '%'.$this->search.'%')->orderBy('id','ASC')->paginate(10);
        return view('livewire.toko.index', ['toko' => $toko]);
    }
}
