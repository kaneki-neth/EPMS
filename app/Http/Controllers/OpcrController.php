<?php

namespace App\Http\Controllers;

use App\Models\Opcr;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OpcrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $opcrs = Opcr::all();

        return Response()->json([
            'data' => $opcrs,
            'total' => $opcrs->count()
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
        Opcr::create($request->validate([
            'office_member_id' => 'required',
            'accomplishment_id' => 'required'
        ]));

        return Response()->json([
            'status' => true,
            'message' => 'OPCR created successfully'
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
        $opcrs = Opcr::find($id);

        return Response()->json([
            'data' => $opcrs,
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
        $opcrs = Opcr::find($id);
        $opcrs->update($request->all());

        return Response()->json([
            'status' => true,
            'message' => 'Opcr updated successfully'
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
        Opcr::destroy($id);

        return Response()->json([
            'status' => true,
            'message' => 'Opcr deleted'
        ], 200);
    }
}
