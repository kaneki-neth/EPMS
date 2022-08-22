<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $tasks = Task::all();

        return Response()->json([
            'data' => $tasks,
            'total' => $tasks->count()
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
        Task::create($request->validate([
            'owner_id' => 'required',
            'colaborator_id' => 'required',
            'objectives' => 'required',
            'strategies' => 'required',
            'specific_action' => 'required',
            'success_indicator' => 'required',
            'duration' => 'required',
            'budget' => 'required'
        ]));

        return Response()->json([
            'status' => true,
            'message' => 'Added successfuly'
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
        $tasks = Task::find($id);

        return Response()->json([
            'data' => $tasks
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
        $tasks = Task::find($id);
        $tasks->update($request->all());

        return Response()->json([
            'status' => true,
            'message' => 'Updated successfully'
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
        Task::destroy($id);

        return Response()->json([
            'status' => true,
            'message' => 'Deleted Successfully'
        ], 201);
    }
}
