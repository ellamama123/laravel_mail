<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Models\History;

class HistoryController extends Controller
{
    //Hiển thị dữ liệu
    public function index(Request $request)
    {
        $history = History::orderBy('created_at', 'desc');
        if($request->has('category') && request()->input('category') != 0 )
        {
            $history->where('template_id', request()->input('category'));
        }

        if($request->has('position') && request()->input('position') != 0)
        {
            $history->where('position', request()->input('position'));
        }

        if($request->has('name') && request()->input('name') != ''){
            $candidate = Candidate::Where('name',  request()->input('name'))->pluck('id');
            $history->whereIn('candidate_id', $candidate);
        }

        if($request->has('email') && request()->input('email') != ''){
            $history->where('candidate_email', request()->input('email'));
        }

        if($request->has('date') && request()->input('date') != '')
        {
            $history->whereDate('created_at', '=' , request()->input('date'));
        }

        if($request->has('status') && request()->input('status') != -1)
        {
            $history->where('status', request()->input('status'));
        }
        
        return $history->get();
    }

    //Hiển thị dữ liệu theo id
    public function show(History $history)
    {
        return $history;
    }

    //Lưu dữ liệu
    public function store(Request $request)
    {
        $history = History::create($request->all());

        return response()->json($history, 201);
    }

    //Sửa dữ liệu
    public function update(Request $request, History $history)
    {
        $history->update($request->all());

        return response()->json($history, 200);
    }

    //Xóa dữ liệu
    public function destroy(History $history)
    {
        $history->delete();

        return response()->json(null, 204);
    }
}
