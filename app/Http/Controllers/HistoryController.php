<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;

class HistoryController extends Controller
{
    public function index(Request $request)
    {
        return History::all();
    }

    public function show(History $history)
    {
        return $history;
    }

    public function store(Request $request)
    {
        $history = History::create($request->all());

        return response()->json($history, 201);
    }

    public function update(Request $request, History $history)
    {
        $history->update($request->all());

        return response()->json($history, 200);
    }

    public function destroy(History $history)
    {
        $history->delete();

        return response()->json(null, 204);
    }
}
