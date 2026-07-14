<!DOCTYPE html>
<html>

<head>
    <title>
        Sistem Informasi Peminjaman Peralatan Laboratorium
    </title>

    <style>
        body {
            font-family: Arial;
            margin: 0;
            background: #f4f6f9;
        }

        .navbar {
            background: #1e3a8a;
            color: white;
            padding: 15px;
        }

        .navbar a {
            color: white;
            margin-right: 20px;
            text-decoration: none;
        }

        .container {
            padding: 25px;
        }

        .card {
            background: white;
            padding: 20px;
            margin: 15px;
            border-radius: 10px;
            display: inline-block;
            width: 200px;
            box-shadow: 0 3px 8px #ccc;
        }

        table {
            background: white;
            width: 100%;
        }

        button {
            cursor: pointer;
        }
    </style>
</head>


<body>
    <div class="navbar">
        <h3>Sistem Informasi Peminjaman Barang Lab</h3>
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('alat.index') }}"> Alat</a>
        <a href="{{ route('peminjaman.index') }}">Peminjaman</a>
        <form action="/logout" method="POST" style="display:inline">
            @csrf
            <button> Logout </button>
        </form>
    </div>

    <div class="container">
        @yield('content')
    </div>
</body>

</html>