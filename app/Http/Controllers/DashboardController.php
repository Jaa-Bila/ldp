<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\DataFeed;
use App\Models\Batch;
use App\Models\PBatch;
use App\Models\Itn;
use App\Models\Partc;
use App\Models\Partcr;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    /**
     * Displays the dashboard screen
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $dataFeed = new DataFeed();

        return view('pages.dashboard.dashboard', compact('dataFeed'));
    }

    public function data_input()
    {
        //     $batches = Batch::orderBy('id', 'desc')->take(3)->get();
        //     $itns = Itn::latest()->take(3)->get();
        $partcs = Partc::all();
        $partcps = Partc::all();
        $partcrs = Partcr::all();
        $batches = Batch::all();
        $pbatches = PBatch::all();
        $batch_drop = Batch::orderBy('id', 'desc')->take(5)->get();
        $pbatch_drop = PBatch::orderBy('id', 'desc')->take(5)->get();
        $itns = Itn::all();
        $itn_drop = Itn::orderBy('id', 'desc')->take(10)->get();
        $itns_d = DB::table('partcs')->distinct('id_itn')->count('id_itn');
        return view('pages.dashboard.data_input')
            ->with('partcs', $partcs)
            ->with('partcps', $partcps)
            ->with('partcrs', $partcrs)
            ->with('batches', $batches)
            ->with('batch_drop', $batch_drop)
            ->with('pbatches', $pbatches)
            ->with('pbatch_drop', $pbatch_drop)
            ->with('itn_drop', $itn_drop)
            ->with('itns', $itns)
            ->with('itns_d', $itns_d);
    }

    public function itn_input(Request $request)
    {

        //validate
        $this->validate(
            $request,
            ['name' => 'max:120|required|unique:itns'],
            ['name.unique' => 'Instansi sudah ada']
        );

        //get fields from signup form using $request
        $name = $request['name'];
        $sektor = $request['itn-sektor'];
        $notel = $request['itn-notel'];


        //create new user - use App\User;
        $itn = new Itn();
        $itn->name = $name;
        $itn->itn_sektor = $sektor;
        $itn->itn_notel = $notel;
        $itn->save(); //save to the db.

        return redirect()->route('data_input')->with('itn', 'Data Instansi ter-input');
    }

    public function batch_input(Request $request)
    {

        //validate
        $this->validate(
            $request,
            [
                'name' => 'max:120|required|unique:p_batches',
                'period' => 'max:255|required',
            ],
            [
                'name.unique' => 'Batch PaPa sudah ada',
            ]
        );

        //get fields from signup form using $request
        $name = $request['name'];
        $period = $request['period'];


        //create new user - use App\User;
        $batch = new Batch();
        $batch->name = $name;
        $batch->period = $period;
        $batch->save(); //save to the db.

        return redirect()->route('data_input')->with('batch', 'Batch di buat');
    }

    public function batch_hapus($id)
    {
        $batch = Batch::where('id', $id)
            ->delete();

        return redirect()->route('data_input')->with('batch_hapus', 'Batch telah terhapus');
    }

    public function pbatch_input(Request $request)
    {

        //validate
        $this->validate(
            $request,
            [
                'name' => 'max:120|required|unique:p_batches',
                'period' => 'max:255|required',
            ],
            [
                'name.unique' => 'Batch PaPa sudah ada',
            ]
        );

        //get fields from signup form using $request
        $name = $request['name'];
        $period = $request['period'];


        //create new user - use App\User;
        $pbatch = new PBatch();
        $pbatch->name = $name;
        $pbatch->period = $period;

        $pbatch->save(); //save to the db.

        return redirect()->route('data_input')->with('batch', 'Batch PaPa di buat');
    }

    public function pbatch_hapus($id)
    {
        $batch = PBatch::where('id', $id)
            ->delete();

        return redirect()->route('data_input')->with('batch_hapus', 'Batch PaPa telah terhapus');
    }

    public function itn_hapus($id)
    {
        $itn = Itn::where('id', $id)
            ->delete();

        return redirect()->route('data_input')->with('itn_hapus', 'Instansi telah terhapus');
    }
}
