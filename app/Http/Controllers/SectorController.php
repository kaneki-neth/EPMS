<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $sectors = Sector::all();

        return response()->json([
            'data' => $sectors,
            'total' => $sectors->count()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): JsonResponse
    {
        Sector::create($request->validate([
            'name' => 'required'
        ]));

        return response()->json([
            'status' => true,
            'message' => 'New sector added'
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): JsonResponse
    {
        $sectors = Sector::find($id);

        return response()->json([
            'data' => $sectors
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id): JsonResponse
    {
        $sectors = Sector::find($id);
        $sectors->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Sector updated successfully'
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
        Sector::destroy($id);

        return response()->json([
            'status' => true,
            'message' => 'Sector deleted successfully'
        ]);
    }
}
