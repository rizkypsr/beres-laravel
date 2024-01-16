<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\UserChallenge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class UserChallengeControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userChallenges = UserChallenge::with(['challenge', 'customer', 'user_challenge_images'])->orderBy('created_at', 'desc')->get();

        $files = Storage::disk('public')->files('user-challenges/videos');
        $totalVideos = count($files);

        return view('challenge.user-challenges.index', compact('userChallenges', 'totalVideos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        $request->validate([
            'status' => 'required|string',
        ]);

        $elearning = UserChallenge::with('challenge')->findOrFail($id);

        // find customer by $elearning->customer_id

        $elearning->status = $request->status;

        if ($request->status == 1) {
            $customer = Customer::findOrFail($elearning->customer_id);
            $customer->saldo_customer = $customer->saldo_customer + $elearning->challenge->point;

            $customer->save();
        }

        $elearning->save();

        return redirect()->route('user-challenges.index')->with('success', 'Status berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $userChallenge = UserChallenge::findOrFail($id);

            if ($userChallenge->delete()) {
                if ($userChallenge->link) {
                    Storage::disk('public')->delete($userChallenge->link);
                }

                if ($userChallenge->image) {
                    Storage::disk('public')->delete($userChallenge->image);
                }
            }

            return redirect()->route('user-challenges.index')->with('success', 'Berhasil Menghapus');
        } catch (\Exception $e) {
            return redirect()->route('user-challenges.index')->with('toast_error', 'Terjadi kesalahan saat menghapus');
        }
    }

    public function destroyAllVideos()
    {
        try {
            $files = Storage::disk('public')->files('user-challenges/videos');

            $userChallenges = UserChallenge::all();

            foreach ($userChallenges as $userChallenge) {
                $userChallenge->link = null;
                $userChallenge->save();
            }

            foreach ($files as $file) {
                Storage::disk('public')->delete($file);
            }

            return redirect()->route('user-challenges.index')->with('success', 'Berhasil Menghapus Semua Video');
        } catch (\Exception $e) {
            return redirect()->route('user-challenges.index')->with('toast_error', 'Terjadi kesalahan saat menghapus video');
        }
    }
}
