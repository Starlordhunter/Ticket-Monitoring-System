<?php

namespace App\Exports;

use Kordy\Ticketit\Models\Ticket;
use Kordy\Ticketit\Models\HistoryTicket;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use DB;


class TicketExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection($id)
    // {
    //     return Ticket:: where(DB::raw("DATE_FORMAT(ticketit.created_at, '%M-%Y')"),'=',$id)->where('completed_at','!=',null) ->get();
    // }
    // public function __construct($data)
    // {
    //     $this->data = $data;
    // }
    // public function view(): View
    // {
    //     return view('ticketit::admin.laporanA.excelShow', [
    //         'ticket' =>  Ticket::all(),
    //         'history' => HistoryTicket::all()
    //     ]);
    // }
    private $ticket;
    private $history;
    private $detail;

    public function __construct($ticket,$history,$detail)
    {
        $this->ticket = $ticket;
        $this->history = $history;
        $this->detail = $detail;
    }

    public function view(): View
    {
        return view('ticketit::admin.laporanA.excelShow', [
            'ticket' => $this->ticket,
            'history' => $this->history,
            'detail'=> $this->detail
        ]);
    }
}
