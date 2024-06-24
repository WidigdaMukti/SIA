<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Http\Requests\StoreProgramRequest;
use App\Http\Requests\UpdateProgramRequest;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Program";
        $dataProgram = Program::orderBy('created_at', 'desc')->paginate(6);

        // Konversi paragraf_1 dari setiap program ke HTML
        $dataProgram->map(function ($program) {
            $program->paragraf_1 = convertMarkdownToHtml($program->paragraf_1);
            return $program;
        });

        return view('Program', compact('title', 'dataProgram'));
    }

    public function indexContentProgram($id)
    {
        $title = "Program";
        $program = Program::find($id);

        if ($program) {
            // Konversi paragraf_1 dari program ke HTML
            $program->paragraf_1 = convertMarkdownToHtml($program->paragraf_1);
        } else {
            // Tangani kasus jika program tidak ditemukan
            return redirect()->route('program')->with('error', 'program tidak ditemukan.');
        }

        // Mengarahkan ke file blade card.blade.php di folder partials/card
        return view('content.Program', compact('title', 'program'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProgramRequest $request)
    {
        $request->validate([
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Atur batas ukuran sesuai kebutuhan
        ]);

        // Ambil file dari request
        $file = $request->file('thumbnail');

        // Simpan file ke direktori 'public/img/program'
        $path = $file->store('img/program', 'public');

        // Buat instance program baru dan simpan ke database
        $program = new Program();
        $program->thumbnail = $path;
        $program->save();

        // Redirect atau response sesuai kebutuhan aplikasi Anda
        return redirect()->route('filament.siaAdmin.resources.programs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Program $program)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Program $program)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProgramRequest $request, Program $program)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Program $program)
    {
        //
    }
}
