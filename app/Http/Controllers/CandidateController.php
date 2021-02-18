<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;

class CandidateController extends Controller
{
    public function index(Request $request)
    {
        $candidate = Candidate::orderBy('created_at','desc');
        if($request->has('name') && request()->input('name') != '' )
        {
            $candidate->where('name', 'LIKE','%'.request()->input('name').'%');
        }
        if($request->has('phone') && request()->input('phone') != '')
        {
            $candidate->where('phone', 'LIKE','%'.request()->input('phone').'%');
        }
        if($request->has('mail') && request()->input('mail') != '')
        {
            $candidate->where('email', 'LIKE','%'.request()->input('mail').'%');
        }
        if($request->has('date'))
        {
            $candidate->whereDate('created_at', '=' , request()->input('date'));
        }
        if($request->has('status') && request()->input('status') != -1 )
        {
            $candidate->where('status', request()->input('status'));
        }
        if($request->has('position') && request()->input('position') != 0 )
        {
            $candidate->where('position', request()->input('position'));
        }
        return $candidate->get();
    }

    public function show(Candidate $candidate)
    {
        return $candidate;
    }

    public function store(Request $request)
    {
        $candidate = Candidate::create($request->all());

        return response()->json($candidate, 201);
    }

    public function update(Request $request, Candidate $candidate)
    {
        $candidate->update($request->all());

        return response()->json($candidate, 200);
    }

    public function destroy(Candidate $candidate)
    {
        $candidate->delete();

        return response()->json(null, 204);
    }
}
