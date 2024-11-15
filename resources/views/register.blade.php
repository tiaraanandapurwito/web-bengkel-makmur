<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Bengkel Motor Express</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-md w-96">
            <h2 class="text-2xl font-bold mb-6 text-center">Daftar Akun Baru</h2>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Nama Lengkap</label>
                    <input type="text" name="name" id="name" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500 @error('name') border-red-500 @enderror" required value="{{ old('name') }}">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                    <input type="email" name="email" id="email" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500 @error('email') border-red-500 @enderror" required value="{{ old('email') }}">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">Nomor Telepon</label>
                    <input type="tel" name="phone" id="phone" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500 @error('phone') border-red-500 @enderror" required value="{{ old('phone') }}">
                    @error('phone')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
                    <input type="password" name="password" id="password" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500 @error('password') border-red-500 @enderror" required>
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password_confirmation">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500" required>
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">Daftar</button>
            </form>
            <p class="mt-4 text-center text-gray-600">
                Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login</a>
            </p>
        </div>
    </div>
</body>
</html>
