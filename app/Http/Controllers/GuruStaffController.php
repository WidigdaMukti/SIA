<?php

namespace App\Http\Controllers;

use App\Models\GuruStaff;
use App\Http\Requests\StoreGuruStaffRequest;
use App\Http\Requests\UpdateGuruStaffRequest;

class GuruStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Guru & Karyawan";
        $guruStaffs = GuruStaff::all();
        return view('guru-karyawan', compact('title', 'guruStaffs'));
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
    public function store(StoreGuruStaffRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(GuruStaff $guruStaff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GuruStaff $guruStaff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGuruStaffRequest $request, GuruStaff $guruStaff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GuruStaff $guruStaff)
    {
        //
    }
}
