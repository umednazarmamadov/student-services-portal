<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    // Показать все тикеты
    public function index()
    {
        $user = auth()->user();
    
        if ($user->role === 'admin' || $user->role === 'staff') {
            // Админ и стафф видят все тикеты
            $tickets = Ticket::all();
        } else {
            // Студент видит только свои тикеты
            $tickets = Ticket::where('user_id', $user->id)->get();
        }
        
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
            'user_id' => auth()->id()
        ]);

        return redirect('/tickets');
    }

    // Показать один тикет
    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('tickets.show', compact('ticket'));
    }
    public function updateStatus(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->update(['status' => $request->status]);
        return redirect('/tickets/' . $id);
    }
}