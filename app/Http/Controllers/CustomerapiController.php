<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use App\Models\Voucher;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Validator;

class CustomerapiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cust = Customers::all();
        //return collection of posts as a resource
        return new PostResource(true, 'List Data Customer',$cust );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( )
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'invoice'     => 'required',
            'vouchers'    => 'required',
            'cabangs'     => 'required',
            'tokos'       => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }


        $cust = Customers::create([
            'No_Invoice' => $request->input('invoice'),
            'voucher_id' => $request->input('vouchers'),
            'cabangs_id' => $request->input('cabangs'),
            'toko_id'    => $request->input('tokos'),
        ]);
        $vouch = Voucher::whereId($request->input('vouchers'))->update([
           'status'     => 'terpakai'
        ]);

        //return response
        return new PostResource(true, 'Data Post Berhasil Ditambahkan!',[$cust,$vouch]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Customers $cust)
    {
        
        return new PostResource(true, 'Data Customer Ditemukan!', $cust);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cust = Customers::where('id',$id)->update([
            'No_Invoice' => $request->input('invoice'),
            'voucher_id' => $request->input('vouchers'),
            'cabangs_id' => $request->input('cabangs'),
            'toko_id'    => $request->input('tokos'),
        ]);
        $vouch = Voucher::whereId($request->input('vouchers'))->update([
            'status'     => 'terpakai'
         ]);

         $datalama = $request->input('voucherlama');
         if($datalama)
         {
            $vouch = Voucher::whereId($datalama)->update([
                'status'     => 'active'
             ]);
         }
       
        return new PostResource(true, 'Data Customer Berhasil diupdate!',$cust);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatedataey($id){

        $vouch = Voucher::where('id',$id)->update([
            'status'     => 'active'
         ]);
         return new PostResource(true, 'Data Customer voucher diupdate!',$vouch);
    }
     
    public function destroy($id)
    {
        $cust = Customers::findOrFail($id);
        $cust->delete();
    }
}
