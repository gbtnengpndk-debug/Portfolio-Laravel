@extends('layouts.admin')

@section('title', 'Admin - Skills')

@section('content')

<div class="admin-container">

    <div class="admin-page-header">

        <div>
            <h1>Skills</h1>
            <p>Kelola skill yang ditampilkan di portfolio kamu.</p>
        </div>

        <a
            href="{{ route('admin.skills.create') }}"
            class="admin-button"
        >
            + Tambah Skill
        </a>

    </div>

    @if(session('success'))

        <div class="admin-alert admin-alert-success">
            {{ session('success') }}
        </div>

    @endif

    @if($skills->count())

        <div class="admin-skill-list">

            @foreach($skills as $skill)

                <div class="admin-skill-card">

                    <div class="admin-skill-info">

                        <h2>
                            {{ $skill->name }}
                        </h2>

                        @if($skill->category)
                            <span class="admin-skill-category">
                                {{ $skill->category }}
                            </span>
                        @endif

                        @if($skill->icon)
                            <small class="admin-skill-icon">
                                Icon: {{ $skill->icon }}
                            </small>
                        @endif

                    </div>

                    <div class="admin-skill-actions">

                        <a
                            href="{{ route('admin.skills.edit', $skill) }}"
                            class="admin-button-secondary"
                        >
                            Edit
                        </a>

                        <form
                            action="{{ route('admin.skills.destroy', $skill) }}"
                            method="POST"
                        >

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="admin-button-danger"
                                onclick="return confirm('Yakin ingin menghapus skill ini?')"
                            >
                                Hapus
                            </button>

                        </form>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <div class="admin-empty">
            <p>Belum ada skill.</p>
        </div>

    @endif

</div>

@endsection