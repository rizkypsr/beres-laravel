<?php

namespace App\Http\Controllers;

use App\Models\ChallengeImage;
use App\Models\challenges;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class ChallengeImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $challengeId = $request->query('challenge_id');

        $challenges = challenges::all();

        if ($challengeId) {
            $challengeImages = ChallengeImage::with(['challenge'])->where('challenge_id', $challengeId)->get();
        } else {
            $challengeImages = ChallengeImage::with(['challenge'])->get();
        }

        return view('challenge.images.index', compact('challengeImages', 'challenges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        try {
            $request->validate([
                'challenge_id' => 'required',
                'image.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $imageNames = [];

            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $image) {
                    $imageName = time() . '_' . $image->getClientOriginalName();
                    $image->storeAs('challenges', $imageName, 'public');
                    $imageNames[] = $imageName;
                }
            }

            foreach ($imageNames as $imageName) {
                ChallengeImage::create([
                    'challenge_id' => $request->challenge_id,
                    'image' => $imageName,
                ]);
            }

            return redirect()->route('challenge-image.index')->with('success', 'Gambar berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->route('challenge-image.index')->with('error', 'Gambar gagal ditambahkan');
        }
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
        try {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $challengeImage = ChallengeImage::findOrFail($id);
            $oldImage = $challengeImage->image;

            $image = $request->file('image');

            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('challenges', $imageName, 'public');

            $challengeImage->image = $imageName;

            if ($challengeImage->save()) {
                Storage::disk('public')->delete('challenges/' . $oldImage);
            }

            return redirect()->route('challenge-image.index')->with('success', 'Gambar berhasil diubah');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Throwable $th) {
            return redirect()->route('challenge-image.index')->with('error', 'Gambar gagal diubah');
        }

        return redirect()->route('challenge-image.index')->with('success', 'Gambar berhasil diubah');
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
            $challengeImage = ChallengeImage::findOrFail($id);

            Storage::disk('public')->delete('challenges/' . $challengeImage->image);

            $challengeImage->delete();

            return redirect()->route('challenge-image.index')->with('success', 'Gambar berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->route('challenge-image.index')->with('error', 'Gambar gagal dihapus');
        }
    }
}
