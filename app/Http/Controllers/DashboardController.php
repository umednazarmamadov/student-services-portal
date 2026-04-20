<?php

namespace App\Http\Controllers;

use App\Models\Ticket;

class DashboardController extends Controller
{
    public function index()
    {
        $total = Ticket::count();
        $open = Ticket::where('status', 'open')->count();
        $in_progress = Ticket::where('status', 'in_progress')->count();
        $closed = Ticket::where('status', 'closed')->count();

        return view('dashboard', compact('total', 'open', 'in_progress', 'closed'));
    }
}