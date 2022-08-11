<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\PerformanceMeasure;
use Symfony\Component\HttpFoundation\Response;

class PerformanceMeasureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $performanceMeasures = PerformanceMeasure::all();

        return Response()->json([
            'data' => $performanceMeasures,
            'total' => $performanceMeasures->count()
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
        PerformanceMeasure::create($request->validate([
            'year' => 'required',
            'nominal_target' => 'required'
        ]));

        return Response()->json([
            'status' => true,
            'message' => 'Added seccussfully'
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
        $performanceMeasures = PerformanceMeasure::find($id);

        return Response()->json([
            'data' => $performanceMeasures,
        ], 200);
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
        $performanceMeasures = PerformanceMeasure::find($id);
        $performanceMeasures->update($request->all());

        return Response()->json([
            'status' => true,
            'message' => 'Updated successfully'
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
        PerformanceMeasure::destroy($id);

        return Response()->json([
            'status' => true,
            'message' => 'Deleted successfully'
        ], 200);
    }
}
