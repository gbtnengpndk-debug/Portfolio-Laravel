@extends('layouts.admin')

@section('title', 'Admin - Edit Skill')

@section('content')

<div class="admin-container">

    <div class="admin-page-header">

        <div>
            <a
                href="{{ route('admin.skills.index') }}"
                class="admin-back-link"
            >
                ← Kembali ke Skills
            </a>

            <h1>Edit Skill</h1>

            <p>
                Perbarui informasi skill kamu.
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
            action="{{ route('admin.skills.update', $skill) }}"
            method="POST"
        >

            @csrf
            @method('PUT')

            <div class="admin-form-group">

                <label for="name">
                    Nama Skill
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name', $skill->name) }}"
                    required
                >

            </div>

            <div class="admin-form-group">

                <label for="category">
                    Kategori
                </label>

                <input
                    type="text"
                    id="category"
                    name="category"
                    value="{{ old('category', $skill->category) }}"
                    placeholder="Contoh: Backend"
                >

            </div>

            <div class="admin-form-group">

                <label for="icon">
                    Icon
                </label>

                <input
                    type="text"
                    id="icon"
                    name="icon"
                    value="{{ old('icon', $skill->icon) }}"
                    placeholder="Contoh: laravel"
                >

            </div>

            <div class="admin-form-actions">

                <a
                    href="{{ route('admin.skills.index') }}"
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