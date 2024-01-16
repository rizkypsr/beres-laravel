<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\challenges;
use App\Models\UserChallenge;
use App\Models\UserChallengeImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserChallengeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customMessages = [
            'judul.required' => 'Judul wajib diisi!',
            'image.required' => 'Gambar wajib diupload!',
            'image.image' => 'File yang diupload harus berupa gambar.',
            'image.mimes' => 'Format gambar tidak valid. Pilih format jpeg, jpg, atau png.',
            'image.max' => 'Ukuran gambar maksimal 2MB.',
            'point.integer' => 'Point harus berupa angka.',
            'status.in' => 'Status tidak valid.',
            'user_id.required' => 'User ID wajib diisi.',
            'challenge_id.required' => 'Challenge ID wajib diisi.',
        ];

        $validator = Validator::make($request->all(), [
            'judul' => 'required|string',
            'subjudul' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'link' => 'nullable|file|mimes:mp4,mov,avi|max:20480', // 20MB in kilobytes (1MB = 1024KB)
            'point' => 'integer',
            'status' => 'in:-1,0,1',
            'user_id' => 'required',
            'challenge_id' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], $customMessages);

        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
            return response()->json(['error' => 'Pastikan semua data terisi dengan benar dan lengkap', 'details' => $errors], 422);
        }

        try {
            $challenge = challenges::find($request->challenge_id);

            if (!$challenge) {
                return response()->json(['error' => 'Challenge not found'], 404);
            }

            // store video if exist
            if ($request->hasFile('link')) {
                $videoPath = $request->file('link')->store('user-challenges/videos', 'public');
            } else {
                $videoPath = null;
            }

            $userChallenge = UserChallenge::create([
                'judul' => $request->input('judul'),
                'subjudul' => $request->input('subjudul'),
                'deskripsi' => $request->input('deskripsi'),
                'link' => $videoPath,
                'point' => $request->input('point', 0) + $challenge->point,
                'customer_id' => $request->input('user_id'),
                'challenge_id' => $request->input('challenge_id'),
            ]);

            if ($request->hasFile('image')) {
                $images = $request->file('image');

                foreach ($images as $image) {
                    $imageName = time() . '_' . substr($image->getClientOriginalName(), 0, 50) . '.' . $image->getClientOriginalExtension();
                    $image->storeAs('user-challenges/images', $imageName, 'public');

                    UserChallengeImage::create([
                        'user_challenge_id' => $userChallenge->id,
                        'image' => $imageName,
                    ]);
                }
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan saat menyimpan data', 'details' => $e->getMessage()], 500);
        }

        return response()->json(['message' => 'Selamat! Anda berhasil mengikuti challenge'], 201);
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
