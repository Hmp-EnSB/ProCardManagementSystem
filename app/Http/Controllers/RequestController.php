<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Request as CardRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Notifications\RequestStatusNotification;

class RequestController extends Controller
{    public function index()
    {
        $user = Auth::user();

        if ($user->hasRole('admin')) {
            $requests = CardRequest::with('user')->get();
            return view('admin.requests.index', compact('requests'));
        } else {
            $requests = CardRequest::where('user_id', $user->id)->with('user')->get();
            return view('user.dashboard', compact('requests'));
        }
    }

    public function index_p()
    {
        $requests = CardRequest::where('status', 'pending')->with('user')->get();
        return view('admin.requests.pending', compact('requests'));
    }

    public function index_a()
    {
        $requests = CardRequest::where('status', 'approved')->with('user')->get();
        return view('admin.requests.approved', compact('requests'));
    }

    public function index_d()
    {
        $requests = CardRequest::where('status', 'rejected')->with('user')->get();
        return view('admin.requests.rejected', compact('requests'));
    }

    public function create()
    {
        return view('request.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'details' => 'required',
            'photo' => 'required|image',
        ]);

        DB::transaction(function () use ($request) {
            $photoPath = $request->file('photo')->store('public/photos');
            $photoFilename = basename($photoPath);

            $cardRequest = auth()->user()->requests()->create();
            $cardRequest->requestInfo()->create([
                'details' => $request->details,
                'photo' => $photoFilename,
            ]);
        });

        return redirect()->route('user.dashboard')->with('success', 'Request submitted successfully');
    }

    public function show($id)
    {
        $request = CardRequest::findOrFail($id);
        if (Auth::user()->hasRole('admin')) {
            return view('layouts.admin.requests.show', compact('request'));
        } else {
            return view('request.show', compact('request'));
        }
    }

    public function edit($id)
    {
        $request = CardRequest::findOrFail($id);
        return view('request.edit', compact('request'));
    }

    public function update(Request $request, $id)
    {
        $cardRequest = CardRequest::findOrFail($id);
        $cardRequest->requestInfo->update(['details' => $request->details]);

        return redirect()->route('user.dashboard')->with('success', 'Request updated successfully');
    }

    public function approveRequest($id)
    {
        $request = CardRequest::findOrFail($id);
        $request->update(['status' => 'approved']);
        
        $request->user->notify(new RequestStatusNotification($request));
        
        return redirect()->route('admin.requests.index')->with('success', 'Request approved');
    }

    public function declineRequest($id)
    {
        $cardRequest = CardRequest::findOrFail($id);
        $cardRequest->update(['status' => 'rejected']);
        
        $cardRequest->user->notify(new RequestStatusNotification($cardRequest));
        
        return redirect()->route('admin.requests.index')->with('success', 'Request rejected');
    }

    public function undoDecision($id)
    {
        $request = CardRequest::findOrFail($id);
        $request->update(['status' => 'pending']);
        
        $request->user->notify(new RequestStatusNotification($request));
        
        return redirect()->route('admin.requests.index')->with('success', 'Decision undone');
    }

    public function destroy($id)
    {
        $request = CardRequest::findOrFail($id);
        $request->delete();
        return redirect()->route('admin.requests.index')->with('success', 'Request deleted successfully');
    }
}
