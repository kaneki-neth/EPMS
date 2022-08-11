<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKeyFunctionRequest;
use App\Models\KeyFunction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class KeyFunctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $keyFunctions = KeyFunction::all();

        return response()->json([
            'date' => $keyFunctions,
            'total' => $keyFunctions->count()
        ]);
    }

    public function store(StoreKeyFunctionRequest $request): JsonResponse
    {
        KeyFunction::create($request->validated());

        return response()->json([
            'status' => true,
            'message' => 'Key Function has been added'
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
        $keyFunctions = KeyFunction::find($id);

        return response()->json([
            'data' => $keyFunctions
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
        $keyFunctions = KeyFunction::find($id);
        $keyFunctions->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Key Function updated successfully'
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
        KeyFunction::destroy($id);

        return response()->json([
            'status' => true,
            'message' => 'Key Function has been deleted successfully'
        ]);
    }
}
