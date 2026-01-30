<?php

namespace App\Http\Controllers;

use App\Models\Kunjungan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('laporan.form');
    }

    public function bulanan(Request $request)
    {
        $request->validate([
            'month' => 'required|numeric|min:1|max:12',
            'year' => 'required|numeric'
        ]);

        $month =  (int) $request->get('month');
        $year =  (int) $request->get('year');
        
        $kunjungans = Kunjungan::whereYear('tanggal', $year)
            ->whereMonth('tanggal', $month)
            ->orderBy('tanggal', 'asc')
            ->get();
            
        return view('laporan.bulanan', compact('kunjungans', 'month', 'year'));
    }

    public function tahunan(Request $request) 
    {
        $request->validate([
            'year' => 'required|numeric'
        ]);

        $year = (int) $request->get('year');
        
        $kunjungans = Kunjungan::whereYear('tanggal', $year)
            ->orderBy('tanggal', 'asc')
            ->get();
        
        return view('laporan.tahunan', compact('kunjungans', 'year')); 
    }

    
}
