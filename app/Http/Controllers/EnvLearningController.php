<?php

namespace App\Http\Controllers;

use App\Models\elearning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Alert;

class EnvLearningController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $elearnings = elearning::with(['challenge', 'user'])->get();

        return view('elearnings.elearnings', compact('elearnings'));
    }

    public function edit($id)
    {
        $elearning = Elearning::findOrFail($id);

        return view('elearnings.edit', compact('elearning'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string',
        ]);

        $elearning = Elearning::with('challenge')->findOrFail($id);

        $elearning->status = $request->status;

        if ($request->status == 1) {
            $elearning->point = $elearning->point + $elearning->challenge->point;
        }

        $elearning->save();

        return redirect()->route('elearning.index')->with('success', 'Status berhasil diubah');
    }

    public function destroy($id)
    {
        $elearning = Elearning::findOrFail($id);
        $elearning->delete();

        return redirect()->route('elearning.index')->with('success', 'Berhasil Menghapus');
    }
}
