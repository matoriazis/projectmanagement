<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Project;
use App\Models\Developer;
use \Carbon\Carbon;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::with('assign', 'user')->orderBy('title', 'ASC')->get();
        $this->data['tickets'] = $tickets;
        return view('admin/ticket/index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::where('status', 'Aktif')->orderBy('name', 'ASC')->get();
        $this->data['projects'] = $projects;
        return view('admin/ticket/editor', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $param = $request->except(['_token']);
        $param['created_id'] = \Auth::user()->id;

        $ticket = Ticket::create($param);

        if($ticket) {
            return redirect(route('admin.ticket.index'))->with('success', 'Berhasil menambahkan ticket baru!');
        }
        return redirect(route('admin.ticket.index'))->with('failed', 'Gagal menambahkan ticket baru!');
    }
    
    /**
     * Role Developer.
     */
    public function assignTicket(Request $request) {
        $ticket = Ticket::find($request->id);
        
        if($ticket) {
            if($ticket->assigned_by == null) {
                $devId = \Auth::user()->developer->id;
                $ticket->status = Ticket::DIKERJAKAN;
                $ticket->assigned_by = $devId;
                $ticket->assigned_date = Carbon::now()->format('Y-m-d');
                
                if($ticket->save()){
                    return redirect(route('developer.project.detail', ['id' => $ticket->project_id]))->with('success', 'Berhasil mengambil tiket!');
                }
                return redirect(route('developer.project.detail', ['id' => $ticket->project_id]))->with('failed', 'Gagal mengambil ticket, silahkan coba lagi!');
            }
            return redirect(route('developer.project.detail', ['id' => $ticket->project_id]))->with('failed', 'Gagal mengambil ticket, tiket sudah diambil oleh developer lain!');
        }
        return redirect()->back()->with('failed', 'Gagal mengambil tiket, tiket tidak ditemukan!');
    }

    /**
     * Role Developer.
     */
    public function markAsDone(Request $request) {
        $ticket = Ticket::find($request->id);
        
        if($ticket) {
            $ticket->ticket_done_at = Carbon::now()->format('Y-m-d');
            $ticket->status = Ticket::SELESAI;
            if($ticket->save()){
                // return redirect(route('developer.project.detail', ['id' => $ticket->project_id]))->with('success', 'Berhasil mengubah status tiket menjadi selesai!');
                return redirect()->back()->with('success', 'Berhasil mengubah status tiket menjadi selesai!');
            }
            return redirect(route('developer.project.detail', ['id' => $ticket->project_id]))->with('failed', 'Gagal mengubah status tiket menjadi selesai, silahkan coba lagi!');
        }

        return redirect()->back()->with('failed', 'Gagal mengambil tiket, tiket tidak ditemukan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
