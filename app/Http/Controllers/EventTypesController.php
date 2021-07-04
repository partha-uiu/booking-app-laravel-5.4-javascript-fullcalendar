<?php

namespace App\Http\Controllers;

use App\EventType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventTypesController extends Controller
{
	public function index()
	{
		$eventTypes = Auth::user()->communityCenter->selectedEventTypes;

		return view('event-types.index')->with('eventTypes', $eventTypes);
	}

	public function select()
	{
		$eventTypes = EventType::get();
		$selectedEventTypeIds = Auth::user()->communityCenter
								->selectedEventTypes
								->pluck('id')
								->toArray();

		return view('event-types.select')
			->with('eventTypes', $eventTypes)
			->with('selectedEventTypeIds', $selectedEventTypeIds);
	}

	public function saveSelected(Request $request)
	{
		Auth::user()->communityCenter->selectedEventTypes()->sync($request->event_types);

		return redirect()->route('eventTypes')->with('success', 'Event type has been updated');
	}

	public function add()
	{
		return view('event-types.add');
	}

	public function store(Request $request)
	{
		$this->validate($request, [
			'name' => 'required|unique:event_types,name'
		]);

		$event = new EventType();
		$event->name = $request->name;
		$event->save();

		Auth::user()->communityCenter->selectedEventTypes()->attach($event->id);

		return redirect()->route('eventTypes')->with('success', 'Event type has been added and selected');
	}

}
