@extends('layouts.admin')

@section('title', 'Admin - Edit Project')

@section('content')

<div class="admin-container">

    <div class="admin-page-header">

        <div>
            <a
                href="{{ route('admin.projects.index') }}"
                class="admin-back-link"
            >
                ← Kembali ke Projects
            </a>

            <h1>Edit Project</h1>

            <p>
                Perbarui informasi project kamu.
            </p>
        </div>

    </div>

    @if ($errors->any())

        <div class="admin-alert admin-alert-error">

            <strong>Terjadi kesalahan:</strong>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>

    @endif

    <div class="admin-form-card">

        <form
    action="{{ route('admin.projects.update', $project) }}"
    method="POST"
    enctype="multipart/form-data"
>

            @csrf
            @method('PUT')

            {{-- Judul --}}
            <div class="admin-form-group">

                <label for="title">
                    Judul Project
                </label>

                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title', $project->title) }}"
                    required
                >

            </div>

            {{-- Slug --}}
            <div class="admin-form-group">

                <label for="slug">
                    Slug
                </label>

                <input
                    type="text"
                    id="slug"
                    name="slug"
                    value="{{ old('slug', $project->slug) }}"
                    required
                >

                <small>
                    Gunakan huruf kecil dan tanda strip (-).
                </small>

            </div>

            {{-- Deskripsi --}}
            <div class="admin-form-group">

                <label for="description">
                    Deskripsi
                </label>

                <textarea
                    id="description"
                    name="description"
                    rows="6"
                    required
                >{{ old('description', $project->description) }}</textarea>

            </div>

            {{-- Image --}}
<div class="admin-form-group">

    <label for="image">
        Gambar Project
    </label>

    @if ($project->image)
        <div style="margin-bottom: 12px;">
            <img
                src="{{ asset($project->image) }}"
                alt="{{ $project->title }}"
                style="max-width: 300px; border-radius: 10px;"
            >
        </div>
    @endif

    <input
        type="file"
        id="image"
        name="image"
        accept="image/jpeg,image/png,image/webp"
    >

    <small>
        Pilih gambar baru jika ingin mengganti gambar saat ini.
        JPG, PNG, atau WebP. Maksimal 5 MB.
    </small>

</div>

            {{-- GitHub --}}
            <div class="admin-form-group">

                <label for="github_url">
                    GitHub URL
                </label>

                <input
                    type="url"
                    id="github_url"
                    name="github_url"
                    value="{{ old('github_url', $project->github_url) }}"
                    placeholder="https://github.com/username/project"
                >

            </div>

            {{-- Demo --}}
            <div class="admin-form-group">

                <label for="demo_url">
                    Demo URL
                </label>

                <input
                    type="url"
                    id="demo_url"
                    name="demo_url"
                    value="{{ old('demo_url', $project->demo_url) }}"
                    placeholder="https://website-demo.com"
                >

            </div>

            {{-- Featured --}}
            <div class="admin-checkbox">

                <label>

                    <input
                        type="checkbox"
                        name="featured"
                        value="1"
                        {{ old('featured', $project->featured) ? 'checked' : '' }}
                    >

                    <span>
                        Jadikan Featured Project
                    </span>

                </label>

            </div>

            {{-- Actions --}}
            <div class="admin-form-actions">

                <a
                    href="{{ route('admin.projects.index') }}"
                    class="admin-button-secondary"
                >
                    Batal
                </a>

                <button
                    type="submit"
                    class="admin-button"
                >
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>

@endsection