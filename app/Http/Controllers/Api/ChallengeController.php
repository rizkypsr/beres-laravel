<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\challenges;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ChallengeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = $request->input('limit', 10);
        $page = $request->input('page', 1);
        $dayFilter = $request->input('day');

        if ($dayFilter) {
            $validDays = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu'];
            if (!in_array(strtolower($dayFilter), $validDays)) {
                return response()->json(['error' => 'Hari yang diberikan tidak valid'], 422);
            }
        }

        $query = challenges::with(['userChallenges', 'challengeImages']);

        if ($dayFilter) {
            $query->where('hari', strtolower($dayFilter));
        }

        $elearnings = $query->paginate($perPage, ['*'], 'page', $page);

        $data = [
            'currentPage' => $elearnings->currentPage(),
            'limit' => $elearnings->perPage(),
            'total' => $elearnings->total(),
            'data' => $elearnings->items(),
        ];

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
