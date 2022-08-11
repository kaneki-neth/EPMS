<?php

namespace App\Http\Controllers;

use App\Models\OfficeMember;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OfficeMemberController extends Controller
{
    public function index(): JsonResponse
    {
        $officeMembers = OfficeMember::query()
            ->with([
                'office',
                'member'
            ])
            ->get();

        return response()->json([
            'data' => $officeMembers,
            'total' => $officeMembers->count()
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        OfficeMember::create($request->validate([
            'office_id' => 'required',
            'member_id' => 'required'
        ]));

        return response()->json([
            'success' => true,
            'message' => 'Data saved'
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
        return OfficeMember::find($id);
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
        $officeMembers = OfficeMember::find($id);
        $officeMembers->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Rating updated successfully'
        ]);
    }

    /**
     * Search the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search($id): JsonResponse
    {
        $officeMembers = OfficeMember::where('office_id', 'like', '%' . $id . '%')
            ->with([
                'office',
                'member'
            ])->get();

        return response()->json([
            'data' => $officeMembers,
            'total' => $officeMembers->count()
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
        OfficeMember::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Deleted successfully'
        ]);
    }
}
