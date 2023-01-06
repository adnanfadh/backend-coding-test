<?php

namespace App\Http\Controllers;

use App\Models\CheckList;
use App\Models\CheckListItem;
use Illuminate\Http\Request;

class CheckListItemController extends Controller
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
    public function index($checklistid)
    {
        $checkListItems = CheckListItem::where('checklistid' ,$checklistid)->get();

        return response()->json([
            'status' => 'success',
            'Checklistitem' => $checkListItems,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $checklistid)
    {
        $request->validate([
            // 'checklistid' => 'required',
            'itemName' => 'required|string',
        ]);

        $checkListItems = CheckListItem::create([
            'checklistid' => $checklistid,
            'itemName' => $request->itemName,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Tambah data Berhasil',
            'checklist' => $checkListItems,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CheckListItem  $checkListItem
     * @return \Illuminate\Http\Response
     */
    public function show($itemId, $checklistid)
    {
        $checkListItems = CheckListItem::find($itemId)->where('checklistid','=' ,$checklistid)->first();

        return response()->json([
            'status' => 'success',
            'Checklistitem' => $checkListItems,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CheckListItem  $checkListItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $itemId, $checklistid)
    {
        $request->validate([
            // 'checklistid' => 'required',
            'itemName' => 'required|string',
        ]);

        $checkListItems = CheckListItem::find($itemId)->update([
            'itemName' => $request->itemName,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Ubah data Berhasil',
            'checklist' => $checkListItems,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CheckListItem  $checkListItem
     * @return \Illuminate\Http\Response
     */
    public function destroy($itemId, $checklistid)
    {
        $checkListItems =  CheckListItem::find($itemId)->where('checklistid','=' ,$checklistid);
        $checkListItems->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'hapus data Berhasil',
            'checklist' => $checkListItems,
        ]);
    }
}
