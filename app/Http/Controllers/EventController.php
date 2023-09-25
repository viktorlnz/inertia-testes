<?php

namespace App\Http\Controllers;

use App\Http\Resources\EventResource;
use Illuminate\Http\Request;
use App\Models\Event;
use Inertia\Inertia;

class EventController extends Controller
{
    public function index(){

        $events = EventResource::collection(
            Event::with('address')->with('image')->paginate(20)
        );

        

        return Inertia::render('Event/Index', [
            'events' => $events
        ]);
    }

    public function show(Event $event){

        return Inertia::render('Event/Show', [
            'event' => new EventResource($event)
        ]);
    }
}
