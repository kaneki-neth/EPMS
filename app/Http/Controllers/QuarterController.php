<?php

namespace App\Http\Controllers;

use App\Models\Quarter;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QuarterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $quarters = Quarter::all();

        return response()->json([
            'data' => $quarters,
            'total' => $quarters->count()
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
        Quarter::create($request->validate([
            'year' => 'required',
            'quarter' => 'required'
        ]));

        return response()->json([
            'status' => true,
            'message' => 'Quarter successfully added'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): JsonResponse
    {
        $quarters = Quarter::find($id);

        return response()->json([
            'data' => $quarters,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $quarters = Quarter::find($id);
        $quarters->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Quarter updated succesfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): JsonResponse
    {
        Quarter::destroy($id);

        return response()->json([
            'status' => true,
            'message' => 'Quarter deleted successfully'
        ]);
    }
}
