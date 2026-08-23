@extends('layouts.admin')

@section('title', 'Admin - Projects')

@section('content')

<div class="admin-container">

    <div class="admin-page-header">

        <div>
            <h1>Projects</h1>
            <p>Kelola project portfolio kamu.</p>
        </div>

        <a
            href="{{ route('admin.projects.create') }}"
            class="admin-button"
        >
            + Tambah Project
        </a>

    </div>

    @if(session('success'))
        <div class="admin-alert admin-alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($projects->count())

        <div class="admin-project-list">

            @foreach($projects as $project)

                <article class="admin-project-card">

                    {{-- Gambar --}}
                    @if($project->image)

                        <div class="admin-project-image">

                            <img
                                src="{{ asset($project->image) }}"
                                alt="{{ $project->title }}"
                            >

                        </div>

                    @endif

                    {{-- Informasi --}}
                    <div class="admin-project-info">

                        <div class="admin-project-title">

                            <h2>
                                {{ $project->title }}
                            </h2>

                            @if($project->featured)

                                <span class="admin-featured">
                                    ★ Featured
                                </span>

                            @endif

                        </div>

                        <p class="admin-project-slug">
                            /{{ $project->slug }}
                        </p>

                        <p class="admin-project-description">
                            {{ $project->description }}
                        </p>

                        <small class="admin-project-date">
                            Dibuat:
                            {{ $project->created_at->format('d M Y, H:i') }}
                        </small>

                    </div>

                    {{-- Link --}}
                    @if($project->github_url || $project->demo_url)

                        <div class="admin-project-links">

                            @if($project->github_url)

                                <a
                                    href="{{ $project->github_url }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                >
                                    GitHub →
                                </a>

                            @endif

                            @if($project->demo_url)

                                <a
                                    href="{{ $project->demo_url }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                >
                                    Live Demo →
                                </a>

                            @endif

                        </div>

                    @endif

                    {{-- Actions --}}
                    <div class="admin-project-actions">

                        <a
                            href="{{ route('admin.projects.edit', $project) }}"
                            class="admin-button-secondary"
                        >
                            Edit
                        </a>

                        <form
                            action="{{ route('admin.projects.destroy', $project) }}"
                            method="POST"
                            class="admin-delete-form"
                        >

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="admin-button-danger"
                                onclick="return confirm('Yakin ingin menghapus project ini?')"
                            >
                                Hapus
                            </button>

                        </form>

                    </div>

                </article>

            @endforeach

        </div>

    @else

        <div class="admin-empty">

            <h2>Belum ada project</h2>

            <p>
                Tambahkan project pertama kamu ke portfolio.
            </p>

            <a
                href="{{ route('admin.projects.create') }}"
                class="admin-button"
            >
                + Tambah Project
            </a>

        </div>

    @endif

    @if ($projects->hasPages())
        {{ $projects->links('vendor.pagination.admin') }}
    @endif

</div>

@endsection