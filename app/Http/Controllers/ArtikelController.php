<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\ArtikelImage;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikel = Artikel::orderBy('no_urut', 'asc')->get();

        return view('artikel.index', compact('artikel'));
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
        $request->validate([
            'judul' => 'required',
            'subjudul' => 'required',
            'deskripsi' => 'required',
            'link' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // get last no_urut value
        $lastNoUrut = Artikel::orderBy('no_urut', 'desc')->first();

        $artikel = Artikel::create([
            'judul' => $request->judul,
            'subjudul' => $request->subjudul,
            'deskripsi' => $request->deskripsi,
            'link' => $request->link,
            'no_urut' => $lastNoUrut ? $lastNoUrut->no_urut + 1 : 1,
        ]);

        if ($request->hasFile('image')) {
            $images = $request->file('image');

            foreach ($images as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('artikel', $imageName, 'public');

                ArtikelImage::create([
                    'artikel_id' => $artikel->id,
                    'image' => $imageName,
                ]);
            }
        }

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil dibuat');
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
            'judul' => 'required',
            'subjudul' => 'required',
            'deskripsi' => 'required',
            'link' => 'required',
            'no_urut' => 'required',
        ]);

        $artikel = Artikel::findOrFail($id);

        $data = [
            'judul' => $request->input('judul'),
            'subjudul' => $request->input('subjudul'),
            'deskripsi' => $request->input('deskripsi'),
            'link' => $request->input('link'),
            'no_urut' => $request->input('no_urut'),
        ];

        // find artikel with no_urut == $request->no_urut
        $artikelWithSameNoUrut = Artikel::where('no_urut', $request->no_urut)->first();

        // if artikel with same no_urut exist swap no_urut
        if ($artikelWithSameNoUrut) {
            $data['no_urut'] = $artikelWithSameNoUrut->no_urut;

            $artikelWithSameNoUrut->update([
                'no_urut' => $artikel->no_urut,
            ]);
        }

        $artikel->update($data);

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);
        $artikel->delete();

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil dihapus!');
    }
}
