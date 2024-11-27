<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Bengkel Makmur</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #3B82F6 0%, #1E40AF 100%);
            background-attachment: fixed;
        }
        .login-container {
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.9);
        }
        .input-custom {
            transition: all 0.3s ease;
            background-color: rgba(255, 255, 255, 0.7);
        }
        .input-custom:focus {
            background-color: white;
            border-color: #3B82F6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center px-4 py-8">
    <div class="login-container w-full max-w-md rounded-2xl p-10 shadow-2xl">
        <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Login</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-5">
                <label class="block text-gray-700 text-sm font-semibold mb-3" for="email">Email</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    class="input-custom w-full px-4 py-3 border border-gray-300 rounded-lg
                           focus:outline-none focus:border-blue-500
                           transition duration-300 ease-in-out"
                    required
                >
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-semibold mb-3" for="password">Password</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    class="input-custom w-full px-4 py-3 border border-gray-300 rounded-lg
                           focus:outline-none focus:border-blue-500
                           transition duration-300 ease-in-out"
                    required
                >
            </div>
            <button
                type="submit"
                class="w-full bg-blue-600 text-white py-3 rounded-lg
                       hover:bg-blue-700 transition duration-300
                       transform hover:scale-[1.01] focus:outline-none"
            >
                Login
            </button>
        </form>
        <p class="mt-6 text-center text-gray-600">
            Belum punya akun?
            <a href="{{ route('register') }}" class="text-blue-600 font-semibold hover:underline">
                Daftar
            </a>
        </p>
    </div>
</body>
</html>
