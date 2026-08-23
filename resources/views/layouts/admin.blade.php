<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', 'Admin')
    </title>

    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body>

    <header class="admin-header">

        <div class="admin-header-inner">

            <h1 class="admin-logo">
                Admin<span>.</span>
            </h1>

<nav class="admin-nav">

    <a
        href="{{ route('admin.dashboard') }}"
        class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
    >
        Dashboard
    </a>

    <a
        href="{{ route('admin.projects.index') }}"
        class="{{ request()->routeIs('admin.projects.*') ? 'active' : '' }}"
    >
        Projects
    </a>

    <a
        href="{{ route('admin.skills.index') }}"
        class="{{ request()->routeIs('admin.skills.*') ? 'active' : '' }}"
    >
        Skills
    </a>

    <a
        href="{{ route('admin.messages.index') }}"
        class="{{ request()->routeIs('admin.messages.*') ? 'active' : '' }}"
    >
        Messages
    </a>

    <a href="{{ url('/') }}" target="_blank">
        Portfolio
    </a>

    <form
        method="POST"
        action="{{ route('logout') }}"
        style="display: inline;"
    >
        @csrf

        <button type="submit" class="admin-logout">
            Logout
        </button>
    </form>

</nav>

        </div>

    </header>

    <main>
        @yield('content')
    </main>

</body>

</html>