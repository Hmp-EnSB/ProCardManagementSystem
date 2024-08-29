<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Request as CardRequest;
use App\Models\RequestInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Notifications\RequestStatusNotification;

class RequestController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        if ($user->hasRole('admin')) {
            $search = $request->input('search');
            $status = $request->input('status', null);
            $requests = CardRequest::with('user', 'requestInfo')
                ->when($search, function ($query) use ($search) {
                    return $query->whereHas('user', function ($query) use ($search) {
                        $query->where('name', 'like', "%{$search}%");
                    });
                });

            if ($status) {
                $requests->where('status', $status);
            }

            $requests = $requests->get();
            return view('admin.requests.index', compact('requests'));
        }
    }

    public function create()
    {
        return view('request.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'CIN' => 'required',
            'institution' => 'required',
            'position' => 'required',
            'type' => 'required|in:academic,administrative',
            'photo' => 'required|image',
        ]);

        $photoPath = $request->file('photo')->store('public/photos');
        $photoFilename = basename($photoPath);

        $cardRequest = Auth::user()->requests()->create([
            'status' => 'pending',
        ]);

        $cardRequest->requestInfo()->create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'CIN' => $request->CIN,
            'institution' => $request->institution,
            'position' => $request->position,
            'type' => $request->type,
            'photo' => $photoFilename,
        ]);

        return redirect()->route('user.dashboard')->with('success', 'Request submitted successfully');
    }

    public function showInfo()
    {
        $user = Auth::user();
        $request = $user->requests()->with('requestInfo')->latest()->first();

        return view('request.edit', compact('request'));
    }

    public function show($id)
    {
        $request = CardRequest::with('requestInfo')->findOrFail($id);
        return view('requests.show', compact('request'));
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
