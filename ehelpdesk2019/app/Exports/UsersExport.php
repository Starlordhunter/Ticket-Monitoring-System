<?php

namespace App\Exports;

use Kordy\Ticketit\Models\Ticket;
use Kordy\Ticketit\Models\Sla;
use Kordy\Ticketit\Models\Comment;
use Kordy\Ticketit\Models\HistoryTicket;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use DB;


class UsersExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection($id)
    // {
    //     return Ticket:: where(DB::raw("DATE_FORMAT(ticketit.created_at, '%M-%Y')"),'=',$id)->where('completed_at','!=',null) ->get();
    // }
    // public function view(): View
    // {
    //     return view('ticketit::admin.laporanA.excelEdit', [
    //         'ticket' =>  Ticket::all(),
    //         'history' => HistoryTicket::all(),
    //         'sla' => Sla::all(),
    //         'comment' => Comment::all()
    //     ]);
    // }
    private $ticket;
    private $history;
    private $sla;
    private $comment;
    private $detail;

    public function __construct($ticket,$history,$sla,$comment,$detail)
    {
        $this->ticket = $ticket;
        $this->history = $history;
        $this->sla = $sla;
        $this->comment = $comment;
        $this->detail = $detail;
    }

    public function view(): View
    {
        return view('ticketit::admin.laporanA.excelEdit', [
            'ticket' => $this->ticket,
            'history' => $this->history,
            'sla' => $this->sla,
            'comment' => $this->comment,
            'detail' => $this->detail
        ]);
    }
}
