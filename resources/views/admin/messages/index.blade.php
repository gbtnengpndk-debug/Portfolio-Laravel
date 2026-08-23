@extends('layouts.admin')

@section('title', 'Admin - Pesan Masuk')

@section('content')

<div class="admin-container">

    <div class="admin-page-header">

        <div>
            <span class="section-label">ADMIN</span>

            <h1>Pesan Masuk</h1>

            <p>
                Kelola pesan yang dikirim melalui contact form.
            </p>
        </div>

        <a
            href="{{ route('admin.dashboard') }}"
            class="admin-back-link"
        >
            ← Dashboard
        </a>

    </div>

    {{-- Statistik unread --}}
    <div class="admin-message-summary">

        <div class="admin-message-count">
            <span>Belum dibaca</span>

            <strong>{{ $unreadCount }}</strong>
        </div>

        <div class="admin-message-count">
            <span>Total pesan</span>

            <strong>{{ $messages->total() }}</strong>
        </div>

    </div>

    @if(session('success'))

        <div class="admin-alert admin-alert-success">
            {{ session('success') }}
        </div>

    @endif

    @if($messages->count())

        <div class="messages-list">

            @foreach($messages as $message)

                <article
                    class="message-card {{ !$message->is_read ? 'message-unread' : '' }}"
                >

                    <div class="message-top">

                        <div>

                            <h2>
                                {{ $message->name }}

                                @if(!$message->is_read)
                                    <span class="message-badge">
                                        Baru
                                    </span>
                                @endif
                            </h2>

                            <span>
                                {{ $message->email }}
                            </span>

                        </div>

                        <time>
                            {{ $message->created_at->format('d M Y, H:i') }}
                        </time>

                    </div>

                    @if($message->subject)

                        <h3>
                            {{ $message->subject }}
                        </h3>

                    @endif

                    <p class="message-content">
                        {{ $message->message }}
                    </p>

                    <div class="message-actions">

                        @if(!$message->is_read)

                            <form
                                action="{{ route('admin.messages.read', $message) }}"
                                method="POST"
                            >

                                @csrf
                                @method('PATCH')

                                <button
                                    type="submit"
                                    class="admin-button"
                                >
                                    ✓ Tandai sudah dibaca
                                </button>

                            </form>

                        @else

                            <span class="message-read">
                                ✓ Sudah dibaca
                            </span>

                        @endif

                        <form
                            action="{{ route('admin.messages.destroy', $message) }}"
                            method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus pesan ini?')"
                        >

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="admin-button-danger"
                            >
                                Hapus
                            </button>

                        </form>

                    </div>

                </article>

            @endforeach

        </div>

        @if($messages->hasPages())

            <div class="pagination">
                {{ $messages->links() }}
            </div>

        @endif

    @else

        <div class="admin-empty">

            <h2>Belum ada pesan</h2>

            <p>
                Pesan dari pengunjung akan muncul di sini.
            </p>

        </div>

    @endif

</div>

@endsection