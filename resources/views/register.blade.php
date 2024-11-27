<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Bengkel Makmur</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <style>
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #3b82f6;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #2563eb;
        }

        body {
            background: linear-gradient(135deg, #3b82f6 0%, #1e40af 100%);
        }

        .form-input:focus {
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.2);
        }

        /* .form-input:hover {
            border-color: #ffffff;
        } */
        .animate-slide-up {
            animation: slideUp 0.5s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body class="antialiased">
    <div class="min-h-screen flex items-center justify-center px-4 py-8">
        <div class="bg-white w-full max-w-md mx-auto rounded-2xl shadow-2xl overflow-hidden animate-slide-up">
            <div class="p-8">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Daftar Akun</h2>
                    <p class="text-gray-500">Buat akun baru di Bengkel Makmur</p>
                </div>
                <form action="{{ route('register') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2" for="name">
                            <i data-feather="user" class="inline-block mr-2 text-blue-500"></i>Nama Lengkap
                        </label>
                        <input type="text" name="name" id="name"
                            class="form-input w-full px-4 py-2.5 border-2 rounded-lg focus:outline-none
                            @error('name') border-red-500 @else border-gray-300 @enderror"
                            required value="{{ old('name') }}">
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2" for="email">
                            <i data-feather="mail" class="inline-block mr-2 text-blue-500"></i>Email
                        </label>
                        <input type="email" name="email" id="email"
                            class="form-input w-full px-4 py-2.5 border-2 rounded-lg focus:outline-none
                            @error('email') border-red-500 @else border-gray-300 @enderror"
                            required value="{{ old('email') }}">
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2" for="phone">
                            <i data-feather="phone" class="inline-block mr-2 text-blue-500"></i>Nomor Telepon
                        </label>
                        <input type="tel" name="phone" id="phone"
                            class="form-input w-full px-4 py-2.5 border-2 rounded-lg focus:outline-none
                            @error('phone') border-red-500 @else border-gray-300 @enderror"
                            required value="{{ old('phone') }}">
                        @error('phone')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2" for="password">
                            <i data-feather="lock" class="inline-block mr-2 text-blue-500"></i>Password
                        </label>
                        <input type="password" name="password" id="password"
                            class="form-input w-full px-4 py-2.5 border-2 rounded-lg focus:outline-none
                            @error('password') border-red-500 @else border-gray-300 @enderror"
                            required>
                        @error('password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2" for="password_confirmation">
                            <i data-feather="check-circle" class="inline-block mr-2 text-blue-500"></i>Konfirmasi
                            Password
                        </label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="form-input w-full px-4 py-2.5 border-2 rounded-lg focus:outline-none border-gray-300"
                            required>
                    </div>

                    <div class="pt-4">
                        <button type="submit"
                            class="w-full bg-blue-600 text-white py-3 rounded-lg
                            hover:bg-blue-700 transition duration-300 ease-in-out transform
                            hover:scale-102 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                            Daftar
                        </button>
                    </div>
                </form>

                <div class="mt-6 text-center">
                    <p class="text-gray-600">
                        Sudah punya akun?
                        <a href="{{ route('login') }}" class="text-blue-600 font-semibold hover:underline">
                            Login sekarang
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        feather.replace();
    </script>
</body>

</html>
