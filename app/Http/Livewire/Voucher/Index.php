<?php

namespace App\Http\Livewire\Voucher;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Voucher;
use App\Models\Toko;


class Index extends Component
{
    use WithPagination;
    public $kode,$status,$nilai,$tokoid,$voucherid,$tokolist,$jmlvoucher,$i;
    public $search;

    public function nyimpencoy()
    {
        $this->validate([
            'kodemulai' => 'required',
            'kodeakhir' => 'required',
            'nilai' => 'required',
            'tokoid' => 'required',
        ]);

        for($this->i=0;$this->i<=$this->jmlvoucher;$this->i++)
        {
            $voucher = Voucher::create([
                'kode'          => $this->i,
                'status'        => 'active',
                'nilai_value'   => $this->nilai,
                'toko_id'       => $this->tokoid,
            ]);
        }
        
       
        
        session()->flash('message','Toko berhasil input');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function resetInput(){
        $this->kodemulai = '';
        $this->kodeakhir = '';
        $this->nilai = '';
        $this->toko_id = '';
    }

    public function render()
    {
        $cekdata = Toko::latest();
        dd($cekdata->kode);
        $tokodata = Toko::all();
        $voucher = Voucher::paginate(10);
        return view('livewire.voucher.index', ['voucher' => $voucher,'tokodata'=>$tokodata]);
    }
}
