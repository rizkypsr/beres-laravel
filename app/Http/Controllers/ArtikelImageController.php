<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\ArtikelImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class ArtikelImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $artikelId = $request->query('artikel_id');

        $artikel = Artikel::all();

        if ($artikelId) {
            $artikelImages = ArtikelImage::with(['artikel'])->where('artikel_id', $artikelId)->get();
        } else {
            $artikelImages = ArtikelImage::with(['artikel'])->get();
        }

        return view('artikel.images.index', compact('artikelImages', 'artikel'));
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
                'artikel_id' => 'required',
                'image.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $imageNames = [];

            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $image) {
                    $imageName = time() . '_' . $image->getClientOriginalName();
                    $image->storeAs('artikel', $imageName, 'public');
                    $imageNames[] = $imageName;
                }
            }

            foreach ($imageNames as $imageName) {
                ArtikelImage::create([
                    'artikel_id' => $request->artikel_id,
                    'image' => $imageName,
                ]);
            }

            return redirect()->route('artikel-image.index')->with('success', 'Gambar berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->route('artikel-image.index')->with('error', 'Gambar gagal ditambahkan');
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

            $artikelImage = ArtikelImage::findOrFail($id);
            $oldImage = $artikelImage->image;

            $image = $request->file('image');

            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('artikel', $imageName, 'public');

            $artikelImage->image = $imageName;

            if ($artikelImage->save()) {
                Storage::disk('public')->delete('artikel/' . $oldImage);
            }

            return redirect()->route('artikel-image.index')->with('success', 'Gambar berhasil diubah');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Throwable $th) {
            return redirect()->route('artikel-image.index')->with('error', 'Gambar gagal diubah');
        }

        return redirect()->route('artikel-image.index')->with('success', 'Gambar berhasil diubah');
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
            $artikelImage = ArtikelImage::findOrFail($id);

            Storage::disk('public')->delete('artikel/' . $artikelImage->image);

            $artikelImage->delete();

            return redirect()->route('artikel-image.index')->with('success', 'Gambar berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->route('artikel-image.index')->with('error', 'Gambar gagal dihapus');
        }
    }
}
