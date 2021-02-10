<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;

class CandidateController extends Controller
{
    public function index(Request $request)
    {
        if(request()->input('status')){
            return Candidate::where('status', request()->input('status'))->get();
        }elseif(request()->input('id'))
        {
            return Candidate::where('id', request()->input('id'))->first();
        }
        return Candidate::all();
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
