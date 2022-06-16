<?php

namespace App\Http\Controllers;

// use App\Count;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        //SLA data
        $sla= DB::table('ticketit')
        ->join('ticketit_priorities','ticketit.priority_id','=','ticketit_priorities.id')
        ->select(DB::raw('MONTH(ticketit.created_at) AS "Month"'),DB::raw('YEAR(ticketit.created_at) AS "Year"'),
            DB::raw('SUM(CASE WHEN (ticketit_priorities.name="Low") THEN 1 ELSE 0 END) AS Low'),
            DB::raw('SUM(CASE WHEN (ticketit_priorities.name="Medium") THEN 1 ELSE 0 END) AS "Medium"'),
            DB::raw('SUM(CASE WHEN (ticketit_priorities.name="High") THEN 1 ELSE 0 END) AS High'),
            DB::raw('SUM(CASE WHEN (ticketit_priorities.name="NON-SLA @ SEVERITY 0") THEN 1 ELSE 0 END) AS "NonSLA"'))
        ->where(DB::raw('YEAR(ticketit.created_at)'),Carbon::now()->year)
        ->groupBy(DB::raw('Month(ticketit.created_at)'),DB::raw('YEAR(ticketit.created_at)'))
        ->get();

        //Category data
        $cat = DB::table('ticketit')
        ->join('ticketit_categories','ticketit.category_id','=','ticketit_categories.id')
        ->select(DB::raw('ticketit_categories.name AS "Category"'),DB::raw('COUNT(ticketit.id) AS "Tickets"'))
        ->groupBy('Category')
        ->orderBy('Tickets', 'DESC')
        ->get();

        //Model data
        $model = DB::table('ticketit')
        ->join('model','ticketit.model','=','model.id')
        ->select(DB::raw('model.name AS "Model"'),DB::raw('COUNT(ticketit.id) AS "Tickets"'))
        ->where(DB::raw('model.id'),'!=','0')
        ->groupBy('model.name')
        ->limit(5)
        ->orderBy('Tickets', 'DESC')
        ->get();

        //Lokasi
        $lokasi = DB::table('lokasi')
        ->select(DB::raw('lokasi.name AS "Lokasi"'),DB::raw('COUNT(id) AS "Tickets"'))
        ->where(DB::raw('id'),'!=','0')
        ->groupBy('lokasi.name')
        ->limit(5)
        ->orderBy('Tickets', 'DESC')
        ->get();

        //Agent Perfomances
        $agent = DB::table('ticketit')
        ->join('users','ticketit.agent_id','=','users.id')
        ->select(DB::raw('users.name AS "Name"'),DB::raw('COUNT(ticketit.status_id) AS "Closed Tickets"'))
        ->where(DB::raw('ticketit.status_id'),'=',2)
        ->groupBy('users.name')
        ->limit(5)
        ->orderBy('Closed Tickets', 'DESC')
        ->get();

        //Card
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

        return view('dashboard',
        ['sla'=>$sla,'cat' => $cat,'model'=> $model, 'lokasi' => $lokasi,'agent' => $agent],
        compact('totaltickets','todaytickets','weektickets','monthtickets','lastmonthtickets',
        'closetickets','closethisweek','pendingtickets'));
    }

    public function aadk(Request $request)
    {
        //SLA data
        $sla_aadk= DB::connection('mysql2')
        ->table('ticketit')
        ->join('ticketit_priorities','ticketit.priority_id','=','ticketit_priorities.id')
        ->select(DB::raw('MONTH(ticketit.created_at) AS "Month"'),DB::raw('YEAR(ticketit.created_at) AS "Year"'),
            DB::raw('SUM(CASE WHEN (ticketit_priorities.name="Low (S-3)") THEN 1 ELSE 0 END) AS Low'),
            DB::raw('SUM(CASE WHEN (ticketit_priorities.name="Medium (s-2)") THEN 1 ELSE 0 END) AS "Medium"'),
            DB::raw('SUM(CASE WHEN (ticketit_priorities.name="High (S-1)") THEN 1 ELSE 0 END) AS High'),
            DB::raw('SUM(CASE WHEN (ticketit_priorities.name="Non-SLA (S-0)") THEN 1 ELSE 0 END) AS "NonSLA"'))
        ->where(DB::raw('YEAR(ticketit.created_at)'),Carbon::now()->year)
        ->groupBy(DB::raw('Month(ticketit.created_at)'),DB::raw('YEAR(ticketit.created_at)'))
        ->get();

        //Category data
        $cat_aadk = DB::connection('mysql2')
        ->table('ticketit')
        ->join('ticketit_categories','ticketit.category_id','=','ticketit_categories.id')
        ->select(DB::raw('ticketit_categories.name AS "Category"'),DB::raw('COUNT(ticketit.id) AS "Tickets"'))
        ->groupBy('Category')
        ->orderBy('Tickets', 'DESC')
        ->get();

        //Model data
        $model_aadk = DB::connection('mysql2')
        ->table('ticketit')
        ->join('model','ticketit.model','=','model.id')
        ->select(DB::raw('model.name AS "Model"'),DB::raw('COUNT(ticketit.id) AS "Tickets"'))
        ->where(DB::raw('model.id'),'!=','0')
        ->groupBy('model.name')
        ->limit(5)
        ->orderBy('Tickets', 'DESC')
        ->get();

        //Lokasi
        $lokasi_aadk = DB::connection('mysql2')
        ->table('lokasi')
        ->select(DB::raw('lokasi.name AS "Lokasi"'),DB::raw('COUNT(id) AS "Tickets"'))
        ->where(DB::raw('id'),'!=','0')
        ->groupBy('lokasi.name')
        ->limit(5)
        ->orderBy('Tickets', 'DESC')
        ->get();

        //Agent Perfomances
        $agent_aadk = DB::connection('mysql2')
        ->table('ticketit')
        ->join('users','ticketit.agent_id','=','users.id')
        ->select(DB::raw('users.name AS "Name"'),DB::raw('COUNT(ticketit.status_id) AS "Closed Tickets"'))
        ->where(DB::raw('ticketit.status_id'),'=',2)
        ->groupBy('users.name')
        ->limit(5)
        ->orderBy('Closed Tickets', 'DESC')
        ->get();

        //Card
        $totaltickets_aadk= DB::connection('mysql2')
        ->table('ticketit')
        ->select(DB::raw('*'))
        ->count();

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

        return view('dashboard_aadk',
        ['sla_aadk'=>$sla_aadk,'cat_aadk' => $cat_aadk,
        'model_aadk'=> $model_aadk, 'lokasi_aadk' => $lokasi_aadk,'agent_aadk' => $agent_aadk],
        compact('totaltickets_aadk','todaytickets_aadk','weektickets_aadk','monthtickets_aadk','lastmonthtickets_aadk','closetickets_aadk',
        'closethisweek_aadk','pendingtickets_aadk'));
    }

    public function hsnz(Request $request)
    {
        //SLA data
        $sla_hsnz= DB::connection('mysql3')
        ->table('ticketit')
        ->join('ticketit_priorities','ticketit.priority_id','=','ticketit_priorities.id')
        ->select(DB::raw('MONTH(ticketit.created_at) AS "Month"'),DB::raw('YEAR(ticketit.created_at) AS "Year"'),
            DB::raw('SUM(CASE WHEN (ticketit_priorities.name="Low (S-3)") THEN 1 ELSE 0 END) AS Low'),
            DB::raw('SUM(CASE WHEN (ticketit_priorities.name="Medium (s-2)") THEN 1 ELSE 0 END) AS "Medium"'),
            DB::raw('SUM(CASE WHEN (ticketit_priorities.name="High (S-1)") THEN 1 ELSE 0 END) AS High'),
            DB::raw('SUM(CASE WHEN (ticketit_priorities.name="Non-SLA (S-0)") THEN 1 ELSE 0 END) AS "NonSLA"'))
        ->where(DB::raw('YEAR(ticketit.created_at)'),Carbon::now()->year)
        ->groupBy(DB::raw('Month(ticketit.created_at)'),DB::raw('YEAR(ticketit.created_at)'))
        ->get();

        //Category data
        $cat_hsnz = DB::connection('mysql3')
        ->table('ticketit')
        ->join('ticketit_categories','ticketit.category_id','=','ticketit_categories.id')
        ->select(DB::raw('ticketit_categories.name AS "Category"'),DB::raw('COUNT(ticketit.id) AS "Tickets"'))
        ->groupBy('Category')
        ->orderBy('Tickets', 'DESC')
        ->get();

        //Model data
        $model_hsnz = DB::connection('mysql3')
        ->table('ticketit')
        ->join('model','ticketit.model','=','model.id')
        ->select(DB::raw('model.name AS "Model"'),DB::raw('COUNT(ticketit.id) AS "Tickets"'))
        ->where(DB::raw('model.id'),'!=','0')
        ->groupBy('model.name')
        ->limit(5)
        ->orderBy('Tickets', 'DESC')
        ->get();

        //Lokasi
        $lokasi_hsnz = DB::connection('mysql3')
        ->table('lokasi')
        ->select(DB::raw('lokasi.name AS "Lokasi"'),DB::raw('COUNT(id) AS "Tickets"'))
        ->where(DB::raw('id'),'!=','0')
        ->groupBy('lokasi.name')
        ->limit(5)
        ->orderBy('Tickets', 'DESC')
        ->get();

        //Agent Perfomances
        $agent_hsnz = DB::connection('mysql3')
        ->table('ticketit')
        ->join('users','ticketit.agent_id','=','users.id')
        ->select(DB::raw('users.name AS "Name"'),DB::raw('COUNT(ticketit.status_id) AS "Closed Tickets"'))
        ->where(DB::raw('ticketit.status_id'),'=',2)
        ->groupBy('users.name')
        ->limit(5)
        ->orderBy('Closed Tickets', 'DESC')
        ->get();

        //Card
        $totaltickets_hsnz= DB::connection('mysql3')
        ->table('ticketit')
        ->select(DB::raw('*'))
        ->count();

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

        return view('dashboard_hsnz',
        ['sla_hsnz'=>$sla_hsnz,'cat_hsnz' => $cat_hsnz,
        'model_hsnz'=> $model_hsnz, 'lokasi_hsnz' => $lokasi_hsnz,'agent_hsnz' => $agent_hsnz],
        compact('totaltickets_hsnz','todaytickets_hsnz','weektickets_hsnz','monthtickets_hsnz','lastmonthtickets_hsnz','closetickets_hsnz',
        'closethisweek_hsnz','pendingtickets_hsnz'));
    }

    
}