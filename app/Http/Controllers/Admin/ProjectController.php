<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

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

    $file->move(
        public_path('uploads/projects'),
        $filename
    );

    $validated['image'] = 'uploads/projects/' . $filename;
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
    public function show(string $id)
    {
        //
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

    // Simpan path gambar lama
    $oldImage = $project->image;

    // Upload gambar baru
    $file = $request->file('image');

    $filename = Str::uuid() . '.' . $file->extension();

    $file->move(
        public_path('uploads/projects'),
        $filename
    );

    $validated['image'] = 'uploads/projects/' . $filename;

    // Hapus gambar lama jika memang ada
    if ($oldImage) {
        $oldImagePath = public_path($oldImage);

        if (File::exists($oldImagePath)) {
            File::delete($oldImagePath);
        }
    }
  }

    $validated['featured'] = $request->boolean('featured');

    $project->update($validated);

    return redirect()
        ->route('admin.projects.index')
        ->with('success', 'Project berhasil diperbarui.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
{
    // Hapus file gambar jika ada
    if ($project->image) {

        $imagePath = public_path($project->image);

        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
    }

    // Hapus data project dari database
    $project->delete();

    return redirect()
        ->route('admin.projects.index')
        ->with('success', 'Project berhasil dihapus.');
}
}