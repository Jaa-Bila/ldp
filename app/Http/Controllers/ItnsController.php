<?php

namespace App\Http\Controllers;

use App\Models\Addr_Itn;
use App\Models\Itn;
use App\Models\Partc;
use App\Models\Partcr;
use App\Models\Partcp;


use Illuminate\Http\Request;

class ItnsController extends Controller
{

    public function itn_list()
    {
        //     $batches = Batch::orderBy('id', 'desc')->take(3)->get();
        //     $itns = Itn::latest()->take(3)->get();
        $itns = Itn::all();
        return view('pages.dashboard.itn_list')
            ->with('itns', $itns);
    }

    public function itn_show($id)
    {
        $partcs = Partc::where('id_itn', $id)->get();
        $partcrs = Partcr::where('id_itn', $id)->get();
        $partcps = Partcp::where('id_itn', $id)->get();
        $itn = Itn::find($id);
        $addr = Addr_Itn::where('itn_id', $id)->get();
        return view('pages.dashboard.itn_show')
            ->with('itn', $itn)
            ->with('partcs', $partcs)
            ->with('partcrs', $partcrs)
            ->with('partcps', $partcps)
            ->with('addr', $addr);
    }

    public function addr_input(Request $request, $id)
    {
        //validate
        $this->validate(
            $request,
            ['addr' => 'required']
        );

        //get fields from signup form using $request
        $name = $request['addr'];


        //create new user - use App\User;
        $itn = new Addr_Itn();
        $itn->name = $name;
        $itn->itn_id = $id;
        $itn->save(); //save to the db.

        return redirect()->route('itn_show', $id)->with('itn', 'Alamat Instansi ter-input');
    }

    public function addr_hapus($addr_id)
    {
        $id = Addr_Itn::where('id', $addr_id)->pluck('itn_id');
        $addr = Addr_Itn::where('id', $addr_id)
            ->delete();

        return redirect()->back()->with('itn_hapus', 'Alamat telah terhapus');
    }
}
