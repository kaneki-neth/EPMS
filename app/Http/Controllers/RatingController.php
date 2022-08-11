<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $ratings = Rating::all();

        return response()->json([
            'data' => $ratings,
            'total' => $ratings->count()
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
        Rating::create($request->validate([
            'value' => 'required',
            'date' => 'required'
        ]));

        return response()->json([
            'status' => true,
            'message' => 'Rating successfully added'
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Rating::find($id);
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
        $ratings = Rating::find($id);
        $ratings->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Rating updated successfully'
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
        Rating::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Rating deleted successfully'
        ]);
    }
}
