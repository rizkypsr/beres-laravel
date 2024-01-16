<?php

namespace App\Http\Controllers;

use App\Models\banner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class bannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $banner = banner::all();
        return view('banner.banner')->with('banner', $banner);
    }
    public function addbanner(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'gambar_banner' => 'max:2000',
        ]);

        if ($validation->fails()) {
            return redirect('/banner')->with('warning', 'Ukuran gambar terlalu besar');
        }

        if ($request->hasFile('gambar_banner')) {
            $image = $request->file('gambar_banner');

            $imageName = time() . '_' . substr($image->getClientOriginalName(), 0, 50) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('banner', $imageName, 'public');
        }

        $banner = banner::create([
            'deskripsi_banner' => 'info kamu',
            'gambar_banner' => $imageName,
        ]);

        $title = 'Info Kamu';
        $message = 'Buruan Cek Informasi Terbaru Dari Info Kamu';

        // notification !!!!!!!!!!!
        // $FcmToken =[$registration_id];
        $data = [
            "to" => "/topics/general",
            "notification" => [
                "title" => $title,
                "body" => $message,
            ]
        ];

        // dd($FcmToken);
        $encodedData = json_encode($data);

        $headers = [
            'Authorization:key=' . "	AAAAKwTXf8I:APA91bEwetghzaI4fnVFvnAuxBfWkOvc7eUHQOPs6bDncOUX4__et1l-2LfXDLFMRGtUsB-J4Ehil_GPrU7KG12jT7b0pAg88ghdn2EpwYmcnhj7PgW1J5b1EXHnmRbG9N-3CXXxk1AC",
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://fcm.googleapis.com/fcm/send");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        // Close connection
        curl_close($ch);
        // FCM response
        $banner->save();
        // dd($result);


        return redirect('/banner')->with('success', 'Berhasil Menambahkan banner');
    }
    // public function updatefaq(Request $request, $id)
    // {

    //     $banner = banner::find($id);
    //     $banner->judul_faq = $request->input('judul_faq');
    //     $banner->deskripsi_faq = $request->input('deskripsi_faq');
    //     $banner->save();

    //     return redirect('/faq')->with('success', 'Berhasil update faq');
    // }
    public function deletebanner(Request $request, $id)
    {

        $banner = banner::find($id);

        $banner->delete();

        return redirect('/banner')->with('success', 'Berhasil Delete banner');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, banner $banner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(banner $banner)
    {
        //
    }
}
