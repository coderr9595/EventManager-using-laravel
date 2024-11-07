<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $totalUsers = User::count();

        $newEvents = Event::where('created_at', '>=', now()->subMonth())->count();

        $activeSessions = 12;

        $recentEvents = Event::orderBy('created_at', 'desc')->limit(3)->get();

        return view('dashboard', compact('totalUsers', 'newEvents', 'activeSessions', 'recentEvents'));
    }
}
