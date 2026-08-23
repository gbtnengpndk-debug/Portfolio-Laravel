@extends('layouts.admin')

@section('title', 'Admin - Tambah Skill')

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

            <h1>Tambah Skill</h1>

            <p>
                Tambahkan skill baru ke portfolio kamu.
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
            action="{{ route('admin.skills.store') }}"
            method="POST"
        >

            @csrf

            <div class="admin-form-group">

                <label for="name">
                    Nama Skill
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Contoh: Laravel"
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
                    value="{{ old('category') }}"
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
                    value="{{ old('icon') }}"
                    placeholder="Contoh: laravel"
                >

                <small>
                    Isi dengan nama/icon yang ingin kamu gunakan.
                </small>

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
                    Simpan Skill
                </button>

            </div>

        </form>

    </div>

</div>

@endsection