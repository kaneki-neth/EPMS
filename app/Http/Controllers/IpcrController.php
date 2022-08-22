<?php

namespace App\Http\Controllers;

use App\Models\Ipcr;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IpcrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $ipcrs = Ipcr::all();

        return Response()->json([
            'data' => $ipcrs,
            'total' => $ipcrs->count()
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): JsonResponse
    {
        Ipcr::create($request->validate([
            'user_id' => 'required',
            'accomplishment_id' => 'required'
        ]));

        return Response()->json([
            'status' => true,
            'message' => 'IPCR created'
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
        $ipcrs = Ipcr::find($id);

        return Response()->json([
            'data' => $ipcrs,
        ], 200);
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
        $ipcrs = Ipcr::find($id);
        $ipcrs->update($request->all());

        return Response()->json([
            'status' => true,
            'message' => 'Updated succesfully'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): JsonResponse
    {
        Ipcr::destroy($id);

        return Response()->json([
            'status' => true,
            'message' => 'Deleted successfully'
        ], 200);
    }
}
