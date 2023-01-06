<?php

namespace App\Http\Controllers;

use App\Models\CheckList;
use Illuminate\Http\Request;

class CheckListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $checkList = CheckList::all();

        return response()->json([
            'status' => 'success',
            'Checklist' => $checkList,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $checklist = CheckList::create([
            'name' => $request->name,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'tambah data Berhasil',
            'checklist' => $checklist,
        ]);
    }

    public function destroy($id)
    {
        $data =  Checklist::find($id);
        $data->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'hapus data Berhasil',
            'checklist' => $data,
        ]);
    }
}
