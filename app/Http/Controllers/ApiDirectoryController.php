<?php

namespace App\Http\Controllers;

use App\Models\ApiDirectory;
use Illuminate\Http\Request;

class ApiDirectoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('api_directory.index', [
            'apiDirectories' => ApiDirectory::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('api_directory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'base_url' => 'required|url',
            'slug' => 'required|string|max:255|unique:api_directories,slug',
            'category' => 'nullable|string|max:255',
            'is_public' => 'boolean',
        ]);

        ApiDirectory::create($data);
        return redirect()->route('api-directory.index')->with('success', 'API Directory created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ApiDirectory $apiDirectory)
    {
        //
        return view('api_directory.show', compact('apiDirectory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ApiDirectory $apiDirectory)
    {
        //
        return view('api_directory.edit', compact('apiDirectory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ApiDirectory $apiDirectory)
    {
        //
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'base_url' => 'required|url',
            'slug' => 'required|string|max:255|unique:api_directories,slug,' . $apiDirectory->id,
            'category' => 'nullable|string|max:255',
            'is_public' => 'boolean',
        ]);

        $apiDirectory->update($data);

        return redirect()->route('api-directory.index')->with('success', 'API Directory updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ApiDirectory $apiDirectory)
    {
        //
        $apiDirectory->delete();
        return redirect()->route('api-directory.index')->with('success', 'API Directory deleted successfully.');
    }
}
