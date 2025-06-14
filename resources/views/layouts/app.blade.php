<!DOCTYPE html>
<html>
<head>
    <title>@yield('title') | Mini Library</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
        <a class="navbar-brand" href="/">MiniLibrary</a>

        <div class="collapse navbar-collapse justify-content-end">
            @auth
                <a href="{{ route('dashboard') }}" class="btn btn-sm btn-light me-2">Dashboard</a>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button class="btn btn-sm btn-outline-light">Logout</button>
                </form>
            @else
                <a href="{{ route('login.form') }}" class="btn btn-sm btn-outline-light">Login</a>
            @endauth
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>

</body>
</html>
