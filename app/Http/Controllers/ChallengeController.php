<?php

namespace App\Http\Controllers;

use App\Models\ChallengeImage;
use App\Models\challenges;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ChallengeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $challenges = challenges::all();

        return view('challenge.index', compact('challenges'));
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
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'deskripsi' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'hari' => 'required|unique:challenges',
            'point' => 'required',
            'link' => 'required',
        ], [
            'judul.required' => 'Judul harus diisi.',
            'deskripsi.required' => 'Deskripsi harus diisi.',
            'image.*.image' => 'File harus berupa gambar.',
            'image.*.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
            'image.*.max' => 'Ukuran gambar tidak boleh lebih dari 2048 KB.',
            'hari.required' => 'Hari harus diisi.',
            'hari.unique' => 'Hari sudah digunakan pada challenge lain.',
            'point.required' => 'Point harus diisi.',
            'link.required' => 'Link harus diisi.',
        ]);

        if ($validator->fails()) {
            return back()->with('errors', $validator->messages()->all()[0])->withInput();
        }

        try {
            $challenge = challenges::create([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'hari' => $request->hari,
                'point' => $request->point,
                'link' => $request->link,
            ]);

            if ($request->hasFile('image')) {
                $images = $request->file('image');
                foreach ($images as $image) {
                    $imageName = time() . '_' . $image->getClientOriginalName();
                    $image->storeAs('challenges', $imageName, 'public');

                    ChallengeImage::create([
                        'challenge_id' => $challenge->id,
                        'image' => $imageName,
                    ]);
                }
            }

            return redirect()->route('challenge.index')->with('success', 'Challenge berhasil dibuat');
        } catch (\Exception $e) {
            return redirect()->back()->with('errors', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
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

        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'deskripsi' => 'required',
            'hari' => 'required|unique:challenges,hari,' . $id,
            'point' => 'required',
            'link' => 'required',
        ], [
            'judul.required' => 'Judul harus diisi.',
            'deskripsi.required' => 'Deskripsi harus diisi.',
            'hari.required' => 'Hari harus diisi.',
            'hari.unique' => 'Hari sudah digunakan pada challenge lain.',
            'point.required' => 'Point harus diisi.',
            'link.required' => 'Link harus diisi.',
        ]);


        if ($validator->fails()) {
            return back()->with('errors', $validator->messages()->all()[0]);
        }

        try {

            $challenge = challenges::findOrFail($id);

            $data = [
                'judul' => $request->input('judul'),
                'deskripsi' => $request->input('deskripsi'),
                'hari' => $request->input('hari'),
                'point' => $request->input('point'),
            ];

            $challenge->update($data);

            return redirect()->route('challenge.index')->with('success', 'Challenge berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
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
            $challenges = challenges::findOrFail($id);
            $challengeImages =  ChallengeImage::where('challenge_id', $id)->get();

            if ($challengeImages->isEmpty()) {
                $challenges->delete();
                return redirect()->route('challenge.index')->with('success', 'Challenge berhasil dihapus!');
            }

            $temp = $challengeImages;

            // delete the challenge images from database
            foreach ($challengeImages as $challengeImage) {
                $challengeImage->delete();
            }

            foreach ($temp as $challengeImage) {
                $imagePath = "challenges/{$challengeImage->image}";

                if (Storage::exists($imagePath)) {
                    Storage::delete($imagePath);
                }
            }

            // Remove 'hari' attribute from challenges
            $challenges->hari = null;
            $challenges->save();

            $challenges->delete();

            return redirect()->route('challenge.index')->with('success', 'Challenge berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }
}
