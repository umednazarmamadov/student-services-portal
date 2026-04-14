<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    // Показать все тикеты
    public function index()
    {
        $tickets = Ticket::all();
        return view('tickets.index', compact('tickets'));
    }

    // Показать форму создания
    public function create()
    {
        return view('tickets.create');
    }

    // Сохранить новый тикет
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Ticket::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => 'open',
            'priority' => $request->priority ?? 'medium',
            'user_id' => 1
        ]);

        return redirect('/tickets');
    }

    // Показать один тикет
    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('tickets.show', compact('ticket'));
    }
}