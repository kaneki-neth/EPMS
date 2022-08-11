<?php

namespace App\Http\Controllers;

use App\Models\Accomplishment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AccomplishmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(): JsonResponse
    {
        $accomplishments = Accomplishment::query()
            ->with([
                'quarter',
                'rate',
            ])->get();

        return response()->json([
            'data' => $accomplishments,
            'total' => $accomplishments->count()
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
        Accomplishment::create($request->validate([
            'quarter_id' => 'required',
            'rate_id' => 'required',
            'target' => 'required',
            'actual_accomplishment' => 'required',
            'remarks' => 'required'
        ]));

        return response()->json([
            'status' => true,
            'message' => 'Accomplishment added successfully'
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
        return Accomplishment::find($id);
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
        $accomplishments = Accomplishment::find($id);
        $accomplishments->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Accomplishment updated succesfully'
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
        Accomplishment::destroy($id);

        return response()->json([
            'status' => true,
            'message' => "Accomplishment erased and deleted successfully"
        ]);
    }
}
