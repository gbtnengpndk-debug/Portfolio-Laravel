<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::latest()->paginate(6);

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:projects,slug'],
            'description' => ['required', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'github_url' => ['nullable', 'url', 'max:255'],
            'demo_url' => ['nullable', 'url', 'max:255'],
            'featured' => ['nullable', 'boolean'],
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $filename = Str::uuid() . '.' . $file->extension();

            $path = Storage::disk('s3')->putFileAs(
                '',
                $file,
                $filename,
                'public'
            );

            $validated['image'] = $path;
        }

        $validated['featured'] = $request->boolean('featured');

        Project::create($validated);

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
{
    return redirect()
        ->route('admin.projects.index');
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
{
    $validated = $request->validate([
        'title' => ['required', 'string', 'max:255'],
        'slug' => [
            'required',
            'string',
            'max:255',
            'unique:projects,slug,' . $project->id,
        ],
        'description' => ['required', 'string'],
        'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        'github_url' => ['nullable', 'url', 'max:255'],
        'demo_url' => ['nullable', 'url', 'max:255'],
        'featured' => ['nullable', 'boolean'],
    ]);

    if ($request->hasFile('image')) {

        // Simpan gambar lama
        $oldImage = $project->image;

        // Upload gambar baru ke Supabase
        $file = $request->file('image');

        $filename = Str::uuid() . '.' . $file->extension();

        $path = Storage::disk('s3')->putFileAs(
            '',
            $file,
            $filename,
            'public'
        );

        $validated['image'] = $path;

        // Hapus gambar lama
        if ($oldImage) {

            // Jika gambar lama masih di storage lokal
            if (str_starts_with($oldImage, 'uploads/projects/')) {

                $oldImagePath = public_path($oldImage);

                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Jika gambar lama ada di Supabase
            else {
                Storage::disk('s3')->delete($oldImage);
            }
        }
    }

    $validated['featured'] = $request->boolean('featured');

    // Update database
    $project->update($validated);

    // Kembali ke halaman daftar project
    return redirect()
        ->route('admin.projects.index')
        ->with('success', 'Project berhasil diperbarui.');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
{
    // Hapus gambar jika ada
    if ($project->image) {

        // Gambar lama yang masih berada di public/
        if (str_starts_with($project->image, 'uploads/projects/')) {

            $imagePath = public_path($project->image);

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Gambar yang berada di Supabase Storage
        else {
            Storage::disk('s3')->delete($project->image);
        }
    }

    // Hapus project dari database
    $project->delete();

    return redirect()
        ->route('admin.projects.index')
        ->with('success', 'Project berhasil dihapus.');
}
}