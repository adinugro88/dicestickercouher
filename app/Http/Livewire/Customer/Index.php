<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Customers;
use App\Models\Toko;
use App\Models\Cabang;
use App\Models\Voucher;


class Index extends Component
{
    use WithPagination;
    public $lstvoucher,$listtoko,$noinvoice,$tokopil,$voucherpil,$cabangpil,$cust_id;
    public $search;
    public $toko, $cabang;

    protected function rules()
    {
        return [
            'noinvoice' => 'required',
            'tokopil' => 'required',
            'voucherpil' => 'required',
            'cabangpil' => 'required',
        ];
    }
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function simpan()
    {
        $validatedData = $this->validate();
        $customer = Customers::create([
            
            'noinvoice'     => $this->noinvoice,
            'voucher_id'    => $this->voucherpil,
            'cabangs_id'    => $this->cabangpil,
            'toko_id'       => $this->tokopil,
            
        ]);

        Voucher::where('id',$this->voucherpil)->update([
            'status'          => 'terpakai',
           
        ]);

        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
        return redirect()->back()->with('message','customer  berhasil input');
       
    
    }

    public function edits(int $cust_id)
    {
        $cust = Customers::find($cust_id);
        if($cust){
            $this->cust_id      = $cust->id;
            $this->nama         = $cust->nama;
            $this->alamat       = $cust->alamat;
            $this->telpon       = $cust->telpon;
            $this->produk       = $cust->produk;
            $this->harga        = $cust->harga;
            $this->voucherpil   = $cust->voucher_id;
            $this->cabangpil    = $cust->cabangs_id;
            $this->tokopil      = $cust->toko_id;
        }else{
            return redirect()->to('/dashboard/admin/customer');
        }
    }

    public function updatetoko()
    {
        $validatedData = $this->validate();

        Customers::where('id',$this->cust_id)->update([
            'noinvoice'         => $validatedData['noinvoice'],
            'voucher_id'    => $validatedData['voucherpil'],
            'cabangs_id'    => $validatedData['cabangpil'],
            'toko_id'       => $validatedData['tokopil'],
        ]);
        session()->flash('message','toko Updated ');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function deleteStudent(int $custid)
    {
        $this->custid = $custid;
    }

    public function destroyStudent()
    {
        $vcr = Customers::find($this->custid);
        $this->voucherpil =  $vcr -> voucher_id;
        
        Voucher::where('id',$this->voucherpil)->update([
            'status'          => 'active',
        ]);
        Customers::find($this->custid)->delete();

        $this->dispatchBrowserEvent('close-modal');
        session()->flash('message','Customer dihapus, Voucher kembali aktif');
    }

    public function resetInput()
    {
        $this->nama         = '';
        $this->alamat       = '';
        $this->telpon       = '';
        $this->produk       = '';
        $this->harga        = '';
        $this->voucherpil      = '';
        $this->cabangpil     = '';
        $this->tokopil         = '';
    }

  

    public function mount()
    {
    $data = Cabang::get()->first();
   
    }
    

    public function render()
    {
        $this->toko=  Toko::get();
        $this->cabang=  Cabang::get();
        $this->lstvoucher = Voucher::where ('toko_id',$this->tokopil)->where('status','active')->orderBy('kode','ASC')->get();
        $listcust = Customers::where('nama', 'like', '%'.$this->search.'%')->orderBy('id','ASC')->paginate(10);
        return view('livewire.customer.index',['listcust' => $listcust]);
    }
}
