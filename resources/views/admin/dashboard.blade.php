@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')

<section class="admin-container">

    <div class="admin-dashboard-header">

        <div>
            <span class="section-label">ADMIN</span>

            <h1>Dashboard</h1>

            <p>Kelola portfolio dari sini.</p>
        </div>

        <a href="{{ url('/') }}" class="admin-back">
            ← Portfolio
        </a>

    </div>
    <div class="admin-stats">

    <a
        href="{{ route('admin.messages.index') }}"
        class="admin-stat"
    >
        <span>Messages</span>

        <strong>{{ $stats['messages'] }}</strong>

        <small>Total pesan masuk →</small>
    </a>

    <a
        href="{{ route('admin.messages.index') }}"
        class="admin-stat admin-stat-unread"
    >
        <span>Belum Dibaca</span>

        <strong>{{ $stats['unread_messages'] }}</strong>

        <small>Pesan yang belum dibaca →</small>
    </a>

    <a
        href="{{ route('admin.projects.index') }}"
        class="admin-stat"
    >
        <span>Projects</span>

        <strong>{{ $stats['projects'] }}</strong>

        <small>Total project →</small>
    </a>

    <a
        href="{{ route('admin.skills.index') }}"
        class="admin-stat"
    >
        <span>Skills</span>

        <strong>{{ $stats['skills'] }}</strong>

        <small>Total skill →</small>
    </a>

  </div>

</section>

@endsection