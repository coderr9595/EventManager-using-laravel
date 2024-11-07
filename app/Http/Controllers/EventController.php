<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use App\Models\Registration;
use Carbon\Carbon;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->session()->get('user');

        if (!$user) {
            return redirect('/login')->with('error', 'Please log in to access the events.');
        }

        $registeredEventIds = Registration::where('user_id', $user['id'])
            ->pluck('event_id')->toArray();

        $events = Event::whereDate('date', '>=', now())
            ->whereNotIn('id', $registeredEventIds)
            ->orderBy('date', 'asc')
            ->get();

        return view('event', compact('events'));
    }

    public function show($id)
{
    $event = Event::findOrFail($id);

    $user = session('user');

    $isRegistered = false;

    if ($user) {
        $isRegistered = $event->users->contains('id', $user['id']);
    }

    return view('events.show', compact('event', 'user', 'isRegistered'));
}

    public function create()
    {
        return view('admin.events.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'price' => 'required|numeric',
        ]);

        Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'time' => $request->time,
            'price' => $request->price,
        ]);

        return redirect()->route('admin.events.create')->with('success', 'Event created successfully!');
    }
    public function register($eventId)
{
    $event = Event::findOrFail($eventId);
    $user = session('user');

    if ($user) {

        $isRegistered = $event->users->contains($user['id']);

        if (!$isRegistered) {
            $event->users()->attach($user['id']);
            return back()->with('success', 'You have successfully registered for the event!');
        } else {
            return back()->with('error', 'You are already registered for this event.');
        }
    }

    return redirect()->route('login')->with('error', 'Please log in to register.');
}

public function showMyEvents()
{
    $userData = session('user');

    if (!$userData) {
        return redirect()->route('login')->with('error', 'Please log in to view your events.');
    }


    $userId = $userData['id'];

    $user = User::find($userId);

    if (!$user) {
        return redirect()->route('login')->with('error', 'User not found.');
    }


    $events = $user->registeredEvents;


    return view('events.my-events', compact('events'));
}
public function cancelRegistration($eventId)
{

    $userData = session('user');

    if (!$userData) {
        return redirect()->route('login')->with('error', 'Please log in to cancel your registration.');
    }


    $user = User::find($userData['id']);

    $event = Event::findOrFail($eventId);
    $registration = $user->registrations()->where('event_id', $eventId)->first();

    if (!$registration) {
        return redirect()->route('events.show', $eventId)->with('error', 'You are not registered for this event.');
    }

    $eventStart = Carbon::parse($event->date . ' ' . $event->time);
    $currentTime = Carbon::now();

    $hoursLeft = $eventStart->diffInHours($currentTime);

    if ($hoursLeft < 24) {
        $registration->delete();

        return redirect()->route('events.show', $eventId)->with('success', 'Your registration has been canceled.');
    } else {
        return redirect()->route('events.show', $eventId)->with('error', 'You cannot cancel your registration less than 24 hours before the event.');
    }
}

}
