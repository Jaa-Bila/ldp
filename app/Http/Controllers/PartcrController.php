<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Batch;
use App\Models\Itn;
use App\Models\Partc;
use App\Models\Partcr;
use WordTemplate;


class PartcrController extends Controller
{
    public function partcr_input(Request $request)
    {
        $itn = Itn::where('id', $request['id_itn'])->pluck('name')->first();
        $batch = Batch::where('id', $request['id_batch'])->pluck('name')->first();

        //validate
        $this->validate(
            $request,
            [
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
                'itn_addr' => 'max:255|required',
                'ktp' => 'required|mimes:jpg,png,jpeg|max:2048',
                'ijazah' => 'required|mimes:jpg,png,jpeg,pdf|max:2048',
                'skb' => 'required|mimes:jpg,png,jpeg,pdf|max:2048',
                'foto4x6' => 'required|mimes:jpg,png,jpeg|max:2048',
                'foto2x3' => 'required|mimes:jpg,png,jpeg|max:2048',
                'serti' => 'required|mimes:jpg,png,jpeg,pdf|max:2048',
                'skp' => 'required|mimes:jpg,png,jpeg,pdf|max:2048',
                'lisen' => 'required|mimes:jpg,png,jpeg,pdf|max:2048',
                'ak3' => 'required|mimes:jpg,png,jpeg,pdf|max:2048',
            ],
            [
                'name.required' => 'Nama belum di isi !',
                'ttl.required' => 'Tempat Tanggal Lahir belum di isi !',
                'nik.required' => 'NIK belum di isi !',
                'pddk.required' => 'Pendidikan belum di isi !',
                'email.required' => 'E-Mail belum di isi !',
                'notel.required' => 'Nomor Telepon belum di isi !',
                'addr.required' => 'Alamat belum di isi !',
                'itn_addr.required' => 'Alamat Instansi belum di isi !',
            ]
        );

        if ($request->hasFile('ktp')) {
            $ktpFileNameExt = $request->file('ktp')->getClientOriginalName();
            $ktpFileName = pathinfo($ktpFileNameExt, PATHINFO_FILENAME);
            $extKtp = $request->file('ktp')->getClientOriginalExtension();
            $storeKtp = $ktpFileName . '_' . time() . '.' . $extKtp;
            $ktpPath = $request->file('ktp')->storeAs('public/k3r/master_ktp', $storeKtp);
        } else {
            $storeKtp = 'noimage.jpg';
        }

        if ($request->hasFile('ijazah')) {
            $ijazahFileNameExt = $request->file('ijazah')->getClientOriginalName();
            $ijazahFileName = pathinfo($ijazahFileNameExt, PATHINFO_FILENAME);
            $extIjazah = $request->file('ijazah')->getClientOriginalExtension();
            $storeIjazah = $ijazahFileName . '_' . time() . '.' . $extIjazah;
            $ijazahPath = $request->file('ijazah')->storeAs('public/k3r/master_ijazah', $storeIjazah);
        } else {
            $storeIjazah = 'noimage.jpg';
        }

        if ($request->hasFile('skb')) {
            $skbFileNameExt = $request->file('skb')->getClientOriginalName();
            $skbFileName = pathinfo($skbFileNameExt, PATHINFO_FILENAME);
            $extSkb = $request->file('skb')->getClientOriginalExtension();
            $storeSkb = $skbFileName . '_' . time() . '.' . $extSkb;
            $skbPath = $request->file('skb')->storeAs('public/k3r/master_skb', $storeSkb);
        } else {
            $storeSkb = 'noimage.jpg';
        }

        if ($request->hasFile('foto4x6')) {
            $foto4x6FileNameExt = $request->file('foto4x6')->getClientOriginalName();
            $foto4x6FileName = pathinfo($foto4x6FileNameExt, PATHINFO_FILENAME);
            $extFoto4x6 = $request->file('foto4x6')->getClientOriginalExtension();
            $storeFoto4x6 = $foto4x6FileName . '_' . time() . '.' . $extFoto4x6;
            $foto4x6Path = $request->file('foto4x6')->storeAs('public/k3r/master_foto4x6', $storeFoto4x6);
        } else {
            $storeFoto4x6 = 'noimage.jpg';
        }

        if ($request->hasFile('foto2x3')) {
            $foto2x3FileNameExt = $request->file('foto2x3')->getClientOriginalName();
            $foto2x3FileName = pathinfo($foto2x3FileNameExt, PATHINFO_FILENAME);
            $extFoto2x3 = $request->file('foto2x3')->getClientOriginalExtension();
            $storeFoto2x3 = $foto2x3FileName . '_' . time() . '.' . $extFoto2x3;
            $foto2x3Path = $request->file('foto2x3')->storeAs('public/k3r/master_foto2x3', $storeFoto2x3);
        } else {
            $storeFoto2x3 = 'noimage.jpg';
        }

        if ($request->hasFile('serti')) {
            $sertiFileNameExt = $request->file('serti')->getClientOriginalName();
            $sertiFileName = pathinfo($sertiFileNameExt, PATHINFO_FILENAME);
            $extSerti = $request->file('serti')->getClientOriginalExtension();
            $storeSerti = $foto2x3FileName . '_' . time() . '.' . $extSerti;
            $sertiPath = $request->file('serti')->storeAs('public/k3r/master_serti', $storeSerti);
        } else {
            $storeSerti = 'noimage.jpg';
        }

        if ($request->hasFile('skp')) {
            $skpFileNameExt = $request->file('skp')->getClientOriginalName();
            $skpFileName = pathinfo($skpFileNameExt, PATHINFO_FILENAME);
            $extSkp = $request->file('skp')->getClientOriginalExtension();
            $storeSkp = $foto2x3FileName . '_' . time() . '.' . $extSkp;
            $skpPath = $request->file('skp')->storeAs('public/k3r/master_skp', $storeSkp);
        } else {
            $storeSkp = 'noimage.jpg';
        }

        if ($request->hasFile('lisen')) {
            $lisenFileNameExt = $request->file('lisen')->getClientOriginalName();
            $lisenFileName = pathinfo($lisenFileNameExt, PATHINFO_FILENAME);
            $extLisen = $request->file('lisen')->getClientOriginalExtension();
            $storeLisen = $lisenFileName . '_' . time() . '.' . $extLisen;
            $lisenPath = $request->file('lisen')->storeAs('public/k3r/master_lisen', $storeLisen);
        } else {
            $storeLisen = 'noimage.jpg';
        }

        if ($request->hasFile('ak3')) {
            $ak3FileNameExt = $request->file('ak3')->getClientOriginalName();
            $ak3FileName = pathinfo($ak3FileNameExt, PATHINFO_FILENAME);
            $extAk3 = $request->file('ak3')->getClientOriginalExtension();
            $storeAk3 = $ak3FileName . '_' . time() . '.' . $extAk3;
            $ak3Path = $request->file('ak3')->storeAs('public/k3r/master_ak3', $storeAk3);
        } else {
            $storeAk3 = 'noimage.jpg';
        }

        //get fields from signup form using $request
        $id_batch = $request['id_batch'];
        $batch_name = $batch;
        $name = $request['name'];
        $ttl = $request['ttl'];
        $nik = $request['nik'];
        $pddk = $request['pddk'];
        $id_itn = $request['id_itn'];
        $itn_addr = $request['itn_addr'];
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
        $serti = $storeSerti;
        $skp = $storeSkp;
        $lisen = $storeLisen;
        $ak3 = $storeAk3;


        //create new user - use App\User;
        $partcr = new Partcr();
        $partcr->id_batch = $id_batch;
        $partcr->batch_name = $batch_name;
        $partcr->name = $name;
        $partcr->ttl = $ttl;
        $partcr->nik = $nik;
        $partcr->pddk = $pddk;
        $partcr->id_itn = $id_itn;
        $partcr->itn_addr = $itn_addr;
        $partcr->itn_name = $itn_name;
        $partcr->notel = $notel;
        $partcr->email = $email;
        $partcr->size = $size;
        $partcr->addr = $addr;
        $partcr->ktp = $ktp;
        $partcr->ijazah = $ijazah;
        $partcr->skb = $skb;
        $partcr->foto4x6 = $foto4x6;
        $partcr->foto2x3 = $foto2x3;
        $partcr->serti = $serti;
        $partcr->skp = $skp;
        $partcr->lisen = $lisen;
        $partcr->ak3 = $ak3;
        $partcr->save(); //save to the db.

        return redirect()->route('data_input')->with('partcr', 'Input data peserta pelatihan K3 Umum Refresh Berhasil !');
    }

    public function partcr_update(Request $request, $id)
    {

        $itn = Itn::where('id', $request['id_itn'])->pluck('name')->first();
        $batch = Batch::where('id', $request['id_batch'])->pluck('name')->first();
        $upktp = Partcr::where('id', $request['id'])->pluck('ktp')->first();
        $upijazah = Partcr::where('id', $request['id'])->pluck('ijazah')->first();
        $upskb = Partcr::where('id', $request['id'])->pluck('skb')->first();
        $upfoto2x3 = Partcr::where('id', $request['id'])->pluck('foto2x3')->first();
        $upfoto4x6 = Partcr::where('id', $request['id'])->pluck('foto4x6')->first();
        $upserti = Partcr::where('id', $request['id'])->pluck('serti')->first();
        $upskp = Partcr::where('id', $request['id'])->pluck('skp')->first();
        $uplisen = Partcr::where('id', $request['id'])->pluck('lisen')->first();
        $upak3 = Partcr::where('id', $request['id'])->pluck('ak3')->first();


        //validate
        $this->validate(
            $request,
            [
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
                'itn_addr' => 'max:255|required',
                'ktp' => 'mimes:jpg,png,jpeg|max:2048',
                'ijazah' => 'mimes:jpg,png,jpeg,pdf|max:2048',
                'skb' => 'mimes:jpg,png,jpeg,pdf|max:2048',
            ],
            [
                'name.required' => 'Nama belum di isi !',
                'ttl.required' => 'Tempat Tanggal Lahir belum di isi !',
                'nik.required' => 'NIK belum di isi !',
                'pddk.required' => 'Pendidikan belum di isi !',
                'email.required' => 'E-Mail belum di isi !',
                'notel.required' => 'Nomor Telepon belum di isi !',
                'addr.required' => 'Alamat belum di isi !',
                'itn_addr.required' => 'Alamat Instansi belum di isi !',
            ]
        );

        if ($request->hasFile('ktp')) {
            $ktpFileNameExt = $request->file('ktp')->getClientOriginalName();
            $ktpFileName = pathinfo($ktpFileNameExt, PATHINFO_FILENAME);
            $extKtp = $request->file('ktp')->getClientOriginalExtension();
            $storeKtp = $ktpFileName . '_' . time() . '.' . $extKtp;
            $ktpPath = $request->file('ktp')->storeAs('public/k3r/master_ktp', $storeKtp);
        } else {
            $storeKtp = $upktp;
        }

        if ($request->hasFile('ijazah')) {
            $ijazahFileNameExt = $request->file('ijazah')->getClientOriginalName();
            $ijazahFileName = pathinfo($ijazahFileNameExt, PATHINFO_FILENAME);
            $extIjazah = $request->file('ijazah')->getClientOriginalExtension();
            $storeIjazah = $ijazahFileName . '_' . time() . '.' . $extIjazah;
            $ijazahPath = $request->file('ijazah')->storeAs('public/k3r/master_ijazah', $storeIjazah);
        } else {
            $storeIjazah = $upijazah;
        }

        if ($request->hasFile('skb')) {
            $skbFileNameExt = $request->file('skb')->getClientOriginalName();
            $skbFileName = pathinfo($skbFileNameExt, PATHINFO_FILENAME);
            $extSkb = $request->file('skb')->getClientOriginalExtension();
            $storeSkb = $skbFileName . '_' . time() . '.' . $extSkb;
            $skbPath = $request->file('skb')->storeAs('public/k3r/master_skb', $storeSkb);
        } else {
            $storeSkb = $upskb;
        }

        if ($request->hasFile('foto4x6')) {
            $foto4x6FileNameExt = $request->file('foto4x6')->getClientOriginalName();
            $foto4x6FileName = pathinfo($foto4x6FileNameExt, PATHINFO_FILENAME);
            $extFoto4x6 = $request->file('foto4x6')->getClientOriginalExtension();
            $storeFoto4x6 = $foto4x6FileName . '_' . time() . '.' . $extFoto4x6;
            $foto4x6Path = $request->file('foto4x6')->storeAs('public/k3r/master_foto4x6', $storeFoto4x6);
        } else {
            $storeFoto4x6 = $upfoto4x6;
        }

        if ($request->hasFile('foto2x3')) {
            $foto2x3FileNameExt = $request->file('foto2x3')->getClientOriginalName();
            $foto2x3FileName = pathinfo($foto2x3FileNameExt, PATHINFO_FILENAME);
            $extFoto2x3 = $request->file('foto2x3')->getClientOriginalExtension();
            $storeFoto2x3 = $foto2x3FileName . '_' . time() . '.' . $extFoto2x3;
            $foto2x3Path = $request->file('foto2x3')->storeAs('public/k3r/master_foto2x3', $storeFoto2x3);
        } else {
            $storeFoto2x3 = $upfoto2x3;
        }

        if ($request->hasFile('serti')) {
            $sertiFileNameExt = $request->file('serti')->getClientOriginalName();
            $sertiFileName = pathinfo($sertiFileNameExt, PATHINFO_FILENAME);
            $extSerti = $request->file('serti')->getClientOriginalExtension();
            $storeSerti = $foto2x3FileName . '_' . time() . '.' . $extSerti;
            $sertiPath = $request->file('serti')->storeAs('public/k3r/master_serti', $storeSerti);
        } else {
            $storeSerti = $upserti;
        }

        if ($request->hasFile('skp')) {
            $skpFileNameExt = $request->file('skp')->getClientOriginalName();
            $skpFileName = pathinfo($skpFileNameExt, PATHINFO_FILENAME);
            $extSkp = $request->file('skp')->getClientOriginalExtension();
            $storeSkp = $foto2x3FileName . '_' . time() . '.' . $extSkp;
            $skpPath = $request->file('skp')->storeAs('public/k3r/master_skp', $storeSkp);
        } else {
            $storeSkp = $upskp;
        }

        if ($request->hasFile('lisen')) {
            $lisenFileNameExt = $request->file('lisen')->getClientOriginalName();
            $lisenFileName = pathinfo($lisenFileNameExt, PATHINFO_FILENAME);
            $extLisen = $request->file('lisen')->getClientOriginalExtension();
            $storeLisen = $lisenFileName . '_' . time() . '.' . $extLisen;
            $lisenPath = $request->file('lisen')->storeAs('public/k3r/master_lisen', $storeLisen);
        } else {
            $storeLisen = $uplisen;
        }

        if ($request->hasFile('ak3')) {
            $ak3FileNameExt = $request->file('ak3')->getClientOriginalName();
            $ak3FileName = pathinfo($ak3FileNameExt, PATHINFO_FILENAME);
            $extAk3 = $request->file('ak3')->getClientOriginalExtension();
            $storeAk3 = $ak3FileName . '_' . time() . '.' . $extAk3;
            $ak3Path = $request->file('ak3')->storeAs('public/k3r/master_ak3', $storeAk3);
        } else {
            $storeAk3 = $upak3;
        }

        //get fields from signup form using $request
        $id_batch = $request['id_batch'];
        $batch_name = $batch;
        $name = $request['name'];
        $ttl = $request['ttl'];
        $nik = $request['nik'];
        $pddk = $request['pddk'];
        $id_itn = $request['id_itn'];
        $itn_addr = $request['itn_addr'];
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
        $serti = $storeSerti;
        $skp = $storeSkp;
        $lisen = $storeLisen;
        $ak3 = $storeAk3;


        //create new user - use App\User;
        $partcr = Partcr::find($id);
        $partcr->id_batch = $id_batch;
        $partcr->batch_name = $batch_name;
        $partcr->name = $name;
        $partcr->ttl = $ttl;
        $partcr->nik = $nik;
        $partcr->pddk = $pddk;
        $partcr->id_itn = $id_itn;
        $partcr->itn_addr = $itn_addr;
        $partcr->itn_name = $itn_name;
        $partcr->notel = $notel;
        $partcr->email = $email;
        $partcr->size = $size;
        $partcr->addr = $addr;
        $partcr->ktp = $ktp;
        $partcr->ijazah = $ijazah;
        $partcr->skb = $skb;
        $partcr->foto4x6 = $foto4x6;
        $partcr->foto2x3 = $foto2x3;
        $partcr->serti = $serti;
        $partcr->skp = $skp;
        $partcr->lisen = $lisen;
        $partcr->ak3 = $ak3;
        $partcr->save(); //save to the db.

        return redirect()->route('partcr_list')->with('partcr_update', 'Update data peserta pelatihan K3 Umum Refresh Berhasil !');
    }

    public function partcr_edit($id)
    {
        $partcr = Partcr::find($id);
        $batch_drop = Batch::orderBy('id', 'desc')->take(5)->get();
        $itn_drop = Itn::orderBy('id', 'desc')->take(10)->get();
        return view('pages.dashboard.partcr_edit')
            ->with('partcr', $partcr)
            ->with('itn_drop', $itn_drop)
            ->with('batch_drop', $batch_drop);
    }

    public function partcr_list()
    {
        //     $batches = Batch::orderBy('id', 'desc')->take(3)->get();
        //     $itns = Itn::latest()->take(3)->get();
        $batches = Batch::all();
        $batch_drop = Batch::orderBy('id', 'desc')->take(5)->get();
        $itns = Itn::all();
        $itn_drop = Itn::orderBy('id', 'desc')->take(10)->get();
        return view('pages.dashboard.partcr_list')
            ->with('batches', $batches)
            ->with('batch_drop', $batch_drop)
            ->with('itn_drop', $itn_drop)
            ->with('itns', $itns);
    }

    public function partcr_show($id)
    {
        $partcr = partcr::find($id);
        return view('pages.dashboard.partcr_show')
            ->with('partcr', $partcr);
    }

    public function partcr_print($id)
    {
        $file = public_path('surat_pernyataan_partcr.rtf');
        $partc_name = Partcr::where('id', $id)->pluck('name')->first();
        $id_batch = Partcr::where('id', $id)->pluck('id_batch')->first();
        $batch = Batch::where('id', $id_batch)->pluck('name')->first();
        $batch_period = Batch::where('id', $id_batch)->pluck('period')->first();
        $itn = Partcr::where('id', $id)->pluck('itn_name')->first();
        $itn_addr = Partcr::where('id', $id)->pluck('itn_addr')->first();
        $ttl = Partcr::where('id', $id)->pluck('ttl')->first();
        $date_time = Partcr::where('id', $id)->pluck('created_at')->first();
        $new_date = date("d - M - Y", strtotime($date_time));




        $array = array(
            '[BATCH]' => $batch,
            '[PERIOD]' => $batch_period,
            '[ITN]' => $itn,
            '[NAMA]' => $partc_name,
            '[ITN_ADDR]' => $itn_addr,
            '[TTL]' => $ttl,
            '[DATE]' => $new_date,
        );

        $nama_file = $partc_name . '_' . 'surat-keterangan-K3-Umum-Refresh.doc';

        return WordTemplate::export($file, $array, $nama_file);
    }

    public function partcr_delete($id)
    {
        $partcr = Partcr::where('id', $id)
            ->delete();

        return redirect()->route('partcr_list')->with('partcr_hapus', 'Participant telah terhapus');
    }

    public function partcr_ktp($ktp)
    {
        $batch = Partcr::where('id', $ktp)->pluck('batch_name')->first();
        $name = Partcr::where('id', $ktp)->pluck('name')->first();
        $file = Partcr::where('id', $ktp)->pluck('ktp')->first();

        $file_path = public_path('storage/k3r/master_ktp' . '/' . $file);
        return response()->download($file_path);
    }

    public function partcr_ijazah($ijazah)
    {
        $batch = Partcr::where('id', $ijazah)->pluck('batch_name')->first();
        $name = Partcr::where('id', $ijazah)->pluck('name')->first();
        $file = Partcr::where('id', $ijazah)->pluck('ijazah')->first();

        $file_path = public_path('storage/k3r/master_ijazah' . '/' . $file);
        return response()->download($file_path);
    }

    public function partcr_skb($skb)
    {
        $batch = Partcr::where('id', $skb)->pluck('batch_name')->first();
        $name = Partcr::where('id', $skb)->pluck('name')->first();
        $file = Partcr::where('id', $skb)->pluck('skb')->first();

        $file_path = public_path('storage/k3r/master_skb' . '/' . $file);
        return response()->download($file_path);
    }

    public function partcr_foto4x6($foto4x6)
    {
        $batch = Partcr::where('id', $foto4x6)->pluck('batch_name')->first();
        $name = Partcr::where('id', $foto4x6)->pluck('name')->first();
        $file = Partcr::where('id', $foto4x6)->pluck('foto4x6')->first();

        $file_path = public_path('storage/k3r/master_foto4x6' . '/' . $file);
        return response()->download($file_path);
    }

    public function partcr_foto2x3($foto2x3)
    {
        $batch = Partcr::where('id', $foto2x3)->pluck('batch_name')->first();
        $name = Partcr::where('id', $foto2x3)->pluck('name')->first();
        $file = Partcr::where('id', $foto2x3)->pluck('foto2x3')->first();

        $file_path = public_path('storage/k3r/master_foto2x3' . '/' . $file);
        return response()->download($file_path);
    }

    public function partcr_serti($serti)
    {
        $batch = Partcr::where('id', $serti)->pluck('batch_name')->first();
        $name = Partcr::where('id', $serti)->pluck('name')->first();
        $file = Partcr::where('id', $serti)->pluck('serti')->first();

        $file_path = public_path('storage/k3r/master_serti' . '/' . $file);
        return response()->download($file_path);
    }

    public function partcr_skp($skp)
    {
        $batch = Partcr::where('id', $skp)->pluck('batch_name')->first();
        $name = Partcr::where('id', $skp)->pluck('name')->first();
        $file = Partcr::where('id', $skp)->pluck('skp')->first();

        $file_path = public_path('storage/k3r/master_skp' . '/' . $file);
        return response()->download($file_path);
    }

    public function partcr_lisen($lisen)
    {
        $batch = Partcr::where('id', $lisen)->pluck('batch_name')->first();
        $name = Partcr::where('id', $lisen)->pluck('name')->first();
        $file = Partcr::where('id', $lisen)->pluck('lisen')->first();

        $file_path = public_path('storage/k3r/master_lisen' . '/' . $file);
        return response()->download($file_path);
    }

    public function partcr_ak3($ak3)
    {
        $batch = Partcr::where('id', $ak3)->pluck('batch_name')->first();
        $name = Partcr::where('id', $ak3)->pluck('name')->first();
        $file = Partcr::where('id', $ak3)->pluck('ak3')->first();

        $file_path = public_path('storage/k3r/master_ak3' . '/' . $file);
        return response()->download($file_path);
    }
}
