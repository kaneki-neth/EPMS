<?php

namespace App\Http\Controllers;

use App\Models\StratPlan;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class StratPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $stratPlans = StratPlan::all();

        return Response()->json([
            'data' => $stratPlans,
            'total' => $stratPlans->count()
        ], 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): JsonResponse
    {
        StratPlan::create($request->validate([
            'key_function_id' => 'required',
            'sector_id' => 'required',
            'task_id' => 'required',
            'performance_measure_id' => 'required',
            'goal' => 'required'
        ]));

        return Response()->json([
            'status' => true,
            'message' => 'Strat Plan successfully created'
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
        $stratPlans = StratPlan::find($id);

        return Response()->json([
            'data' => $stratPlans
        ], 201);
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
        $stratPlans = StratPlan::find($id);
        $stratPlans->update($request->all());

        return Response()->json([
            'status' => true,
            'message' => 'Strat Plan updated successfully'
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): JsonResponse
    {
        StratPlan::destroy($id);

        return Response()->json([
            'status' => true,
            'message' => 'Strat Plan has been deleted'
        ], 201);
    }
}
