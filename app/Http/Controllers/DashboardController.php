<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Alert;

class DashboardController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        $surahs = json_encode(Http::get('https://api.quran.sutanlab.id/surah')->json('data'));
        return view('dashboard', ['surahs' => json_decode($surahs, true)]);
    }

    public function surat($surat = "", $ayat = 0)
    {
        $list_surahs = json_encode(Http::get('https://api.quran.sutanlab.id/surah/')->json('data'));

        if ($ayat == 0) {
            $surahs = json_encode(Http::get('https://api.quran.sutanlab.id/surah/' . $surat)->json('data'));
            return view('dashboard_surat', ['surahs' => json_decode($surahs, true),'list_surahs'=> json_decode($list_surahs,true)]);
        } else {
            $verses = json_encode(Http::get('https://api.quran.sutanlab.id/surah/' . $surat . '/' . $ayat)->json('data'));
            return view('dashboard_ayat', ['verses' => json_decode($verses, true), 'list_surahs'=> json_decode($list_surahs,true)]);
        }
    }
}
