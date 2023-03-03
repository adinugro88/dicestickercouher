<?php

namespace App\Http\Livewire\Voucher;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Voucher;
use App\Models\Toko;

class Master extends Component
{

    use WithPagination;
    public $kodeawal,$kodeakhir, $kode,$status,$nilai,$tokoid,$voucherid,$tokolist,$jmlvoucher,$i,$dataakhir,$checkdel =[] ;
    public $search,$search2;
    public $pilihan= 0, $bykode, $nilaiv, $tokoidm,$lstoko;

    public function nyimpencoy()
    {
        $this->validate([
            'jmlvoucher' => 'required',
            'nilai' => 'required',
            'tokoid' => 'required',
        ]);

        $dataakhir = Voucher::orderBy('id', 'desc')->first();
        if(empty( $dataakhir))
        {
            $vakhir = 1;
            $max = $this->jmlvoucher;
        }
        else
        {
            $ambil = $dataakhir->kode;
            $max = $ambil + $this->jmlvoucher ; 
            $vakhir = $ambil +1;
        }

      
    
        
        // dd($max);
        for($i=$vakhir;$i<=$max ;$i++)
        {
            $simpandata = [
                'kode'          =>  $i,
                'status'        => 'active',
                'nilai_value'   => $this->nilai,
                'fee_voucer'   => 250000,
                'toko_id'       => $this->tokoid,
            ];
            Voucher::create($simpandata);
        }
        
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
        return redirect()->back()->with('message','Voucher autonumber berhasil input');
    }

    public function manual()
    {
        $this->pilihan = 0;
    }
    public function bykode()
    {
        $this->pilihan = 1;
    }

    public function datakode()
    {
        $this->validate([
            'bykode' => 'required',
            'nilai' => 'required',
            'tokoid' => 'required',
        ]);


            $voucher = Voucher::create([
                'kode'          => $this->bykode,
                'status'        => 'active',
                'nilai_value'   => $this->nilaiv,
                'toko_id'       => $this->tokoidm,
            ]);
    
            return redirect()->route('post.index');
        $this->resetInput();
  
        return redirect()->back()->with('message','Voucher manual berhasil input');
    }

    public function simpandata()
    {
        $this->validate([
            'kodeawal' => 'required',
            'kodeakhir' => 'required',
            'nilai' => 'required',
            'tokoid' => 'required',
        ]);

        $result = Voucher::where("kode", $this->kodeawal)->exists();

        $result2 =  Voucher::where("kode", $this->kodeakhir)->exists();

      
        if( $result or  $result2 )
        {
            session()->flash('gagalinput','data sudah ada berikan kode lain ');
            $this->resetInput();
        }
        else
        {
            for($i=$this->kodeawal;$i<=$this->kodeakhir ;$i++)
        {
            $simpandata = [
                'kode'          =>  $i,
                'status'        => 'active',
                'nilai_value'   => $this->nilai,
                'fee_voucer'   => 250000,
                'toko_id'       => $this->tokoid,
            ];
            Voucher::create($simpandata);
        }
        
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('close-modal');
        return redirect()->back()->with('message','Voucher manual berhasil input');
        }
       
        
    }


    public function resetInput(){
        $this->jmlvoucher = '';
        $this->kodeawal = '';
        $this->kodeakhir = '';
        $this->nilai = '';
        $this->toko_id = '';
    }

    public function deleteStudent(int $voucherid)
    {
        $this->checkdel = $voucherid;
    }

    public function hapuspermanen(){
        Voucher::wherekey($this->checkdel)->delete();
        $this->dispatchBrowserEvent('close-modal');
        $this->checkdel = [];
        session()->flash('message','Voucher dihapus');
    }

    public function mount()
    {
        
        $data = Toko::get()->first(); 
        if($data){
            $this->tokoid = $data->id;
        }
        else{
            $this->tokoid = '';
        }
        
    }

    public function render()
    {
        $tokodata = Toko::all();
        $listtoko = Toko::all();
        
        $voucher = Voucher::where('status', 'like', '%'.$this->search.'%')->where('toko_id', 'like', '%'.$this->search2.'%')->orderBy('kode','ASC')->paginate(10);
        return view('livewire.voucher.master', ['voucher' => $voucher,'tokodata'=>$tokodata,'listtoko'=>$listtoko]);
    }

}
