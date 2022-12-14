<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Batch;
use App\Models\Itn;
use App\Models\Partc;

class PartcController extends Controller
{
    public function partc_input(Request $request){

            //validate
            $this->validate($request, [
                'id_batch' => 'max:120|required',
                'name' => 'max:120|required',
                'ttl' => 'max:120|required',
                'nik' => 'max:120|required',
                'pddk' => 'max:120|required',
                'id_itn' => 'max:120|required',
                'notel' => 'max:120|required',
                'email' => 'max:120|required',
                'size' => 'max:120|required',
                'addr' => 'max:120|required',
                'ktp' => 'required|mimes:jpg,png,jpeg|max:2048',
                'ijazah' => 'required|mimes:jpg,png,jpeg,pdf|max:2048',
                'skb' => 'required|mimes:jpg,png,jpeg,pdf|max:2048',
                'foto4x6' => 'required|mimes:jpg,png,jpeg|max:2048',
                'foto2x3' => 'required|mimes:jpg,png,jpeg|max:2048',],
                ['name.required' => 'Nama belum di isi !',
                'ttl.required' => 'Tempat Tanggal Lahir belum di isi !',
                'nik.required' => 'NIK belum di isi !',
                'pddk.required' => 'Pendidikan belum di isi !',
                'email.required' => 'E-Mail belum di isi !',
                'notel.required' => 'Nomor Telepon belum di isi !',
                'addr.required' => 'Alamat belum di isi !',]
            );

            if($request->hasFile('ktp')){
                    $ktpFileNameExt = $request->file('ktp')->getClientOriginalName();
                    $ktpFileName = pathinfo($ktpFileNameExt, PATHINFO_FILENAME);
                    $extKtp = $request->file('ktp')->getClientOriginalExtension();
                    $storeKtp = $ktpFileName.'_'.time().'.'.$extKtp;
                    $ktpPath = $request->file('ktp')->storeAs('public/master_ktp', $storeKtp);
            } else {
                    $storeKtp = 'noimage.jpg';
            }

            if($request->hasFile('ijazah')){
                    $ijazahFileNameExt = $request->file('ijazah')->getClientOriginalName();
                    $ijazahFileName = pathinfo($ijazahFileNameExt, PATHINFO_FILENAME);
                    $extIjazah = $request->file('ijazah')->getClientOriginalExtension();
                    $storeIjazah = $ijazahFileName.'_'.time().'.'.$extIjazah;
                    $ijazahPath = $request->file('ijazah')->storeAs('public/master_ijazah', $storeIjazah);
            } else {
                    $storeIjazah = 'noimage.jpg';
            }

            if($request->hasFile('skb')){
                    $skbFileNameExt = $request->file('skb')->getClientOriginalName();
                    $skbFileName = pathinfo($skbFileNameExt, PATHINFO_FILENAME);
                    $extSkb = $request->file('skb')->getClientOriginalExtension();
                    $storeSkb = $skbFileName.'_'.time().'.'.$extSkb;
                    $skbPath = $request->file('skb')->storeAs('public/master_skb', $storeSkb);
            } else {
                    $storeSkb = 'noimage.jpg';
            }

            if($request->hasFile('foto4x6')){
                    $foto4x6FileNameExt = $request->file('foto4x6')->getClientOriginalName();
                    $foto4x6FileName = pathinfo($foto4x6FileNameExt, PATHINFO_FILENAME);
                    $extFoto4x6 = $request->file('foto4x6')->getClientOriginalExtension();
                    $storeFoto4x6 = $foto4x6FileName.'_'.time().'.'.$extFoto4x6;
                    $foto4x6Path = $request->file('foto4x6')->storeAs('public/master_foto4x6', $storeFoto4x6);
            } else {
                    $storeFoto4x6 = 'noimage.jpg';
            }

            if($request->hasFile('foto2x3')){
                    $foto2x3FileNameExt = $request->file('foto2x3')->getClientOriginalName();
                    $foto2x3FileName = pathinfo($foto2x3FileNameExt, PATHINFO_FILENAME);
                    $extFoto2x3 = $request->file('foto2x3')->getClientOriginalExtension();
                    $storeFoto2x3 = $foto2x3FileName.'_'.time().'.'.$extFoto2x3;
                    $foto2x3Path = $request->file('foto2x3')->storeAs('public/master_foto2x3', $storeFoto2x3);
            } else {
                    $storeFoto2x3 = 'noimage.jpg';
            }

            $itn = Itn::where('id', $request['id_itn'])->pluck('name')->first();
            $batch = Batch::where('id', $request['id_batch'])->pluck('name')->first();

            //get fields from signup form using $request
            $id_batch = $request['id_batch'];
            $batch_name = $batch;
            $name = $request['name'];
            $ttl = $request['ttl'];
            $nik = $request['nik'];
            $pddk = $request['pddk'];
            $id_itn = $request['id_itn'];
            $itn_name = $itn;
            $notel = $request['notel'];
            $email = $request['email'];
            $size = $request['size'];
            $addr = $request['addr'];
            $ktp = $storeKtp;
            $ijazah = $storeIjazah;
            $skb = $storeSkb;
            $foto4x6 = $storeFoto4x6;
            $foto2x3 = $storeFoto2x3;


            //create new user - use App\User;
            $partc = new Partc();
            $partc->id_batch = $id_batch;
            $partc->batch_name = $batch_name;
            $partc->name = $name;
            $partc->ttl = $ttl;
            $partc->nik = $nik;
            $partc->pddk = $pddk;
            $partc->id_itn = $id_itn;
            $partc->itn_name= $itn_name;
            $partc->notel = $notel;
            $partc->email = $email;
            $partc->size = $size;
            $partc->addr = $addr;
            $partc->ktp = $ktp;
            $partc->ijazah = $ijazah;
            $partc->skb = $skb;
            $partc->foto4x6 = $foto4x6;
            $partc->foto2x3 = $foto2x3;
            $partc->save(); //save to the db.

            return redirect()->route('data_input')->with('partc', 'Input data peserta pelatihan K3 Umum Berhasil !');
    }

    public function partc_update(Request $request, $id){

        //validate
        $this->validate($request, [
            'id_batch' => 'max:120|required',
            'name' => 'max:120|required',
            'ttl' => 'max:120|required',
            'nik' => 'max:120|required',
            'pddk' => 'max:120|required',
            'id_itn' => 'max:120|required',
            'notel' => 'max:120|required',
            'email' => 'max:120|required',
            'size' => 'max:120|required',
            'addr' => 'max:120|required',
            'ktp' => 'required|mimes:jpg,png,jpeg|max:2048',
            'ijazah' => 'required|mimes:jpg,png,jpeg,pdf|max:2048',
            'skb' => 'required|mimes:jpg,png,jpeg,pdf|max:2048',
            'foto4x6' => 'required|mimes:jpg,png,jpeg|max:2048',
            'foto2x3' => 'required|mimes:jpg,png,jpeg|max:2048',],
            ['name.required' => 'Nama belum di isi !',
            'ttl.required' => 'Tempat Tanggal Lahir belum di isi !',
            'nik.required' => 'NIK belum di isi !',
            'pddk.required' => 'Pendidikan belum di isi !',
            'email.required' => 'E-Mail belum di isi !',
            'notel.required' => 'Nomor Telepon belum di isi !',
            'addr.required' => 'Alamat belum di isi !',]
        );

        if($request->hasFile('ktp')){
                $ktpFileNameExt = $request->file('ktp')->getClientOriginalName();
                $ktpFileName = pathinfo($ktpFileNameExt, PATHINFO_FILENAME);
                $extKtp = $request->file('ktp')->getClientOriginalExtension();
                $storeKtp = $ktpFileName.'_'.time().'.'.$extKtp;
                $ktpPath = $request->file('ktp')->storeAs('public/master_ktp', $storeKtp);
        } else {
                $storeKtp = 'noimage.jpg';
        }

        if($request->hasFile('ijazah')){
                $ijazahFileNameExt = $request->file('ijazah')->getClientOriginalName();
                $ijazahFileName = pathinfo($ijazahFileNameExt, PATHINFO_FILENAME);
                $extIjazah = $request->file('ijazah')->getClientOriginalExtension();
                $storeIjazah = $ijazahFileName.'_'.time().'.'.$extIjazah;
                $ijazahPath = $request->file('ijazah')->storeAs('public/master_ijazah', $storeIjazah);
        } else {
                $storeIjazah = 'noimage.jpg';
        }

        if($request->hasFile('skb')){
                $skbFileNameExt = $request->file('skb')->getClientOriginalName();
                $skbFileName = pathinfo($skbFileNameExt, PATHINFO_FILENAME);
                $extSkb = $request->file('skb')->getClientOriginalExtension();
                $storeSkb = $skbFileName.'_'.time().'.'.$extSkb;
                $skbPath = $request->file('skb')->storeAs('public/master_skb', $storeSkb);
        } else {
                $storeSkb = 'noimage.jpg';
        }

        if($request->hasFile('foto4x6')){
                $foto4x6FileNameExt = $request->file('foto4x6')->getClientOriginalName();
                $foto4x6FileName = pathinfo($foto4x6FileNameExt, PATHINFO_FILENAME);
                $extFoto4x6 = $request->file('foto4x6')->getClientOriginalExtension();
                $storeFoto4x6 = $foto4x6FileName.'_'.time().'.'.$extFoto4x6;
                $foto4x6Path = $request->file('foto4x6')->storeAs('public/master_foto4x6', $storeFoto4x6);
        } else {
                $storeFoto4x6 = 'noimage.jpg';
        }

        if($request->hasFile('foto2x3')){
                $foto2x3FileNameExt = $request->file('foto2x3')->getClientOriginalName();
                $foto2x3FileName = pathinfo($foto2x3FileNameExt, PATHINFO_FILENAME);
                $extFoto2x3 = $request->file('foto2x3')->getClientOriginalExtension();
                $storeFoto2x3 = $foto2x3FileName.'_'.time().'.'.$extFoto2x3;
                $foto2x3Path = $request->file('foto2x3')->storeAs('public/master_foto2x3', $storeFoto2x3);
        } else {
                $storeFoto2x3 = 'noimage.jpg';
        }

        $itn = Itn::where('id', $request['id_itn'])->pluck('name')->first();
        $batch = Batch::where('id', $request['id_batch'])->pluck('name')->first();

        //get fields from signup form using $request
        $id_batch = $request['id_batch'];
        $batch_name = $batch;
        $name = $request['name'];
        $ttl = $request['ttl'];
        $nik = $request['nik'];
        $pddk = $request['pddk'];
        $id_itn = $request['id_itn'];
        $itn_name = $itn;
        $notel = $request['notel'];
        $email = $request['email'];
        $size = $request['size'];
        $addr = $request['addr'];
        $ktp = $storeKtp;
        $ijazah = $storeIjazah;
        $skb = $storeSkb;
        $foto4x6 = $storeFoto4x6;
        $foto2x3 = $storeFoto2x3;


        //create new user - use App\User;
        $partc = Partc::find($id);
        $partc->id_batch = $id_batch;
        $partc->batch_name = $batch_name;
        $partc->name = $name;
        $partc->ttl = $ttl;
        $partc->nik = $nik;
        $partc->pddk = $pddk;
        $partc->id_itn = $id_itn;
        $partc->itn_name= $itn_name;
        $partc->notel = $notel;
        $partc->email = $email;
        $partc->size = $size;
        $partc->addr = $addr;
        $partc->ktp = $ktp;
        $partc->ijazah = $ijazah;
        $partc->skb = $skb;
        $partc->foto4x6 = $foto4x6;
        $partc->foto2x3 = $foto2x3;
        $partc->save(); //save to the db.

        return redirect()->route('partc_list')->with('partc_update', 'Update data peserta pelatihan K3 Umum Berhasil !');
}

    public function partc_edit($id)
    {
            $partc= Partc::find($id);
            $batch_drop = Batch::orderBy('id', 'desc')->take(5)->get();
            $itn_drop = Itn::orderBy('id', 'desc')->take(10)->get();
            return view('pages.dashboard.partc_edit')
            ->with('partc', $partc)
            ->with('itn_drop', $itn_drop)
            ->with('batch_drop', $batch_drop);

    }

    public function partc_list()
        {
        //     $batches = Batch::orderBy('id', 'desc')->take(3)->get();
        //     $itns = Itn::latest()->take(3)->get();
            $batches = Batch::all();
            $batch_drop = Batch::orderBy('id', 'desc')->take(5)->get();
            $itns = Itn::all();
            $itn_drop = Itn::orderBy('id', 'desc')->take(10)->get();
            return view('pages.dashboard.partc_list')
            ->with('batches', $batches)
            ->with('batch_drop', $batch_drop)
            ->with('itn_drop', $itn_drop)
            ->with('itns', $itns);
        }

        public function partc_show($id){
            $partc = Partc::find($id);
            return view('pages.dashboard.partc_show')
            ->with('partc', $partc);
    }

        public function partc_delete($id){
                $partc = Partc::where('id', $id)
                        ->delete();

                return redirect()->route('partc_list')->with('partc_hapus', 'Participant telah terhapus');
}

    public function partc_ktp($ktp)
    {
        $file_path = public_path('storage/master_ktp/'.$ktp);
        return response()->download($file_path);
    }

    public function partc_ijazah($ijazah)
    {
        $file_path = public_path('storage/master_ijazah/'.$ijazah);
        return response()->download($file_path);
    }

    public function partc_skb($skb)
    {
        $file_path = public_path('storage/master_skb/'.$skb);
        return response()->download($file_path);
    }

    public function partc_foto4x6($foto4x6)
    {
        $file_path = public_path('storage/master_foto4x6/'.$foto4x6);
        return response()->download($file_path);
    }

    public function partc_foto2x3($foto2x3)
    {
        $file_path = public_path('storage/master_foto2x3/'.$foto2x3);
        return response()->download($file_path);
    }
}
