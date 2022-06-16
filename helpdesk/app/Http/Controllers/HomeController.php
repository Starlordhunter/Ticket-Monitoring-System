<?php

namespace App\Http\Controllers;

// use App\Count;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $totaltickets= DB::table('ticketit')
        ->select(DB::raw('*'))
        ->count();

         $todaytickets= DB::table('ticketit')
        ->select(DB::raw('*'))
        ->whereRaw('Date(created_at) = CURDATE()')
        ->count();

        $weektickets= DB::table('ticketit')
        ->select(DB::raw('*'))
        ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
        ->count();

        $monthtickets= DB::table('ticketit')
        ->select(DB::raw('*'))
        ->whereMonth('created_at', date('m'))
        ->whereYear('created_at', date('Y'))
        ->count();

        $lastmonthtickets= DB::table('ticketit')
        ->select(DB::raw('*'))
        ->whereMonth('created_at', '=', Carbon::now()->subMonth()->month)
        ->count();

        $closetickets= DB::table('ticketit')
        ->select(DB::raw('*'))
        // ->whereRaw('Date(created_at) = CURDATE()')
        ->whereRaw('status_id = 2')
        ->count();

        $closethisweek=DB::table('ticketit')
        ->select(DB::raw('*'))
        ->whereRaw('status_id = 2')
        ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
        ->count();

        $pendingtickets= DB::table('ticketit')
        ->select(DB::raw('*'))
        // ->whereRaw('Date(created_at) = CURDATE()')
        ->whereRaw('status_id != 2')
        ->count();

        //AADK
        $todaytickets_aadk= DB::connection('mysql2')
        ->table('ticketit')
        ->select(DB::raw('*'))
        ->whereRaw('Date(created_at) = CURDATE()')
        ->count();

        $weektickets_aadk= DB::connection('mysql2')
        ->table('ticketit')
        ->select(DB::raw('*'))
        ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
        ->count();

        $monthtickets_aadk= DB::connection('mysql2')
        ->table('ticketit')
        ->select(DB::raw('*'))
        ->whereMonth('created_at', date('m'))
        ->whereYear('created_at', date('Y'))
        ->count();

        $lastmonthtickets_aadk= DB::connection('mysql2')
        ->table('ticketit')
        ->select(DB::raw('*'))
        ->whereMonth('created_at', '=', Carbon::now()->subMonth()->month)
        ->count();

        $closetickets_aadk= DB::connection('mysql2')
        ->table('ticketit')
        ->select(DB::raw('*'))
        // ->whereRaw('Date(created_at) = CURDATE()')
        ->whereRaw('status_id = 2')
        ->count();

        $closethisweek_aadk=DB::connection('mysql2')
        ->table('ticketit')
        ->select(DB::raw('*'))
        ->whereRaw('status_id = 2')
        ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
        ->count();

        $pendingtickets_aadk= DB::connection('mysql2')
        ->table('ticketit')
        ->select(DB::raw('*'))
        // ->whereRaw('Date(created_at) = CURDATE()')
        ->whereRaw('status_id != 2')
        ->count();
        
        //HSNZ
        $todaytickets_hsnz= DB::connection('mysql3')
        ->table('ticketit')
        ->select(DB::raw('*'))
        ->whereRaw('Date(created_at) = CURDATE()')
        ->count();

        $weektickets_hsnz= DB::connection('mysql3')
        ->table('ticketit')
        ->select(DB::raw('*'))
        ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
        ->count();

        $monthtickets_hsnz= DB::connection('mysql3')
        ->table('ticketit')
        ->select(DB::raw('*'))
        ->whereMonth('created_at', date('m'))
        ->whereYear('created_at', date('Y'))
        ->count();

        $lastmonthtickets_hsnz= DB::connection('mysql3')
        ->table('ticketit')
        ->select(DB::raw('*'))
        ->whereMonth('created_at', '=', Carbon::now()->subMonth()->month)
        ->count();

        $closetickets_hsnz= DB::connection('mysql3')
        ->table('ticketit')
        ->select(DB::raw('*'))
        // ->whereRaw('Date(created_at) = CURDATE()')
        ->whereRaw('status_id = 2')
        ->count();

        $closethisweek_hsnz=DB::connection('mysql3')
        ->table('ticketit')
        ->select(DB::raw('*'))
        ->whereRaw('status_id = 2')
        ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
        ->count();

        $pendingtickets_hsnz= DB::connection('mysql3')
        ->table('ticketit')
        ->select(DB::raw('*'))
        // ->whereRaw('Date(created_at) = CURDATE()')
        ->whereRaw('status_id != 2')
        ->count();

     return view('welcome',compact('totaltickets','todaytickets','weektickets',
     'monthtickets','lastmonthtickets','closetickets','closethisweek','pendingtickets',
     'todaytickets_aadk','weektickets_aadk','monthtickets_aadk','lastmonthtickets_aadk','closetickets_aadk',
     'closethisweek_aadk','pendingtickets_aadk',
     'todaytickets_hsnz','weektickets_hsnz','monthtickets_hsnz','lastmonthtickets_hsnz','closetickets_hsnz',
     'closethisweek_hsnz','pendingtickets_hsnz'));
    
    }

    public function verColumn(Request $request){
        $totaltickets= DB::table('ticketit')
        ->select(DB::raw('*'))
        ->count();

         $todaytickets= DB::table('ticketit')
        ->select(DB::raw('*'))
        ->whereRaw('Date(created_at) = CURDATE()')
        ->count();

        $weektickets= DB::table('ticketit')
        ->select(DB::raw('*'))
        ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
        ->count();

        $monthtickets= DB::table('ticketit')
        ->select(DB::raw('*'))
        ->whereMonth('created_at', date('m'))
        ->whereYear('created_at', date('Y'))
        ->count();

        $lastmonthtickets= DB::table('ticketit')
        ->select(DB::raw('*'))
        ->whereMonth('created_at', '=', Carbon::now()->subMonth()->month)
        ->count();

        $closetickets= DB::table('ticketit')
        ->select(DB::raw('*'))
        // ->whereRaw('Date(created_at) = CURDATE()')
        ->whereRaw('status_id = 2')
        ->count();

        $closethisweek=DB::table('ticketit')
        ->select(DB::raw('*'))
        ->whereRaw('status_id = 2')
        ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
        ->count();

        $pendingtickets= DB::table('ticketit')
        ->select(DB::raw('*'))
        // ->whereRaw('Date(created_at) = CURDATE()')
        ->whereRaw('status_id != 2')
        ->count();

     return view('verticalColumn',compact('totaltickets','todaytickets','weektickets','monthtickets','lastmonthtickets','closetickets','closethisweek','pendingtickets'));
    }
}