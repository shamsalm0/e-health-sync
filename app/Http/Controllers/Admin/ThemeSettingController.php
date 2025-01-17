<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ThemeSetting;
use Illuminate\Http\Request;

class ThemeSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.theme-setting.index');
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
    public function store(Request $request)
    {
        // return $request->all();
        // data-sidebar-visibility
        ThemeSetting::updateOrCreate(
            [
                'user_id' => null,
            ],
            [
                'user_id' => null,
                'layout' => $request->input('data-layout'),
                'color_scheme' => $request->input('data-bs-theme'),
                'sidebar_visibility' => $request->input('data-sidebar-visibility'),
                'layout_width' => $request->input('data-layout-width'),
                'layout_position' => $request->input('data-layout-position'),
                'topbar_color' => $request->input('data-topbar'),
                'sidebar_size' => $request->input('data-sidebar-size'),
                'sidebar_view' => $request->input('data-layout-style'),
                'sidebar_color' => $request->input('data-sidebar'),
                'sidebar_image' => $request->input('data-sidebar-image'),
                'preloader' => $request->input('data-preloader'),
                'status' => 1,
            ]
        );

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
