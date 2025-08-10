<!-- resources/views/welcome.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    @vite('resources/css/app.css')
</head>

<body class="antialiased flex items-center justify-center min-h-screen bg-gray-100">
    <div class="text-center">
        <h1 class="text-4xl font-bold mb-6">Selamat Datang di Web Inventory 1</h1>

        <div class="space-x-4">
            <a href="{{ route('login') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Login
            </a>
            <a href="{{ route('register') }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                Register
            </a>
        </div>
    </div>
</body>

</html>
