<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Project;
use App\Models\Developer;

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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
