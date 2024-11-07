<?php
namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {

        $user = $request->session()->get('user');


        if (!$user) {
            return redirect('/login')->with('error', 'Please log in to access the events.');
        }

        if ($user['role'] != 'admin') {
            return redirect('/');
        }


        return view('admin.dashboard');
    }
    public function manageEvents()
{
    $events = Event::all();
    return view('admin.events.manage-events', compact('events'));
}
public function edit($id)
{
    $event = Event::findOrFail($id);
    return view('admin.events.edit-event', compact('event'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'date' => 'required|date',
        'time' => 'required',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
    ]);


    $event = Event::findOrFail($id);
    $event->update([
        'title' => $request->input('title'),
        'date' => $request->input('date'),
        'time' => $request->input('time'),
        'description' => $request->input('description'),
        'price' => $request->input('price'),
    ]);

    return redirect()->route('admin.events.index')->with('success', 'Event updated successfully!');
}
public function destroy($id)
{
    $event = Event::findOrFail($id);
    $event->delete();

    return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully!');
}

}

