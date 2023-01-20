<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\PBatch;
use App\Models\Partc;
use App\Models\Partcp;
use App\Models\Partcr;
use Illuminate\Http\Request;

class BatchsController extends Controller
{

    public function batch_list()
    {
        $batchs = Batch::all();
        $partcps = Partcp::all();
        $partcs = Partc::all();
        $partcrs = Partcr::all();
        return view('pages.dashboard.batch_list')
            ->with('batchs', $batchs)
            ->with('partcs', $partcs)
            ->with('partcrs', $partcrs)
            ->with('partcps', $partcps);
    }

    public function batch_show($id)
    {
        $partcs = Partc::where('id_batch', $id)->get();
        $partcrs = Partcr::where('id_batch', $id)->get();
        $partcps = Partcp::where('id_batch', $id)->get();
        $batch = batch::find($id);
        return view('pages.dashboard.batch_show')
            ->with('batch', $batch)
            ->with('partcs', $partcs)
            ->with('partcrs', $partcrs)
            ->with('partcps', $partcps);
    }

    public function pbatch_show($id)
    {
        $partcs = Partc::where('id_batch', $id)->get();
        $partcrs = Partcr::where('id_batch', $id)->get();
        $partcps = Partcp::where('id_batch', $id)->get();
        $pbatch = Pbatch::find($id);
        return view('pages.dashboard.pbatch_show')
            ->with('pbatch', $pbatch)
            ->with('partcs', $partcs)
            ->with('partcrs', $partcrs)
            ->with('partcps', $partcps);
    }
}
