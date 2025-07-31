<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Register - Pusdiglah</title>
    @vite(['resources/css/app.css'])
</head>

<body class="relative overflow-x-hidden">

    <!-- Background Image with Dark Overlay -->
    <div class="fixed inset-0 bg-cover bg-center" style="background-image: url('{{ asset('assets/images/buku.jpg') }}');"></div>
    <div class="fixed inset-0 bg-black/70"></div>

    <!-- Register Content -->
    <div class="min-h-screen flex justify-center items-center py-6 z-10 relative">
        <div class="bg-white shadow-xl rounded-2xl w-full max-w-md p-6 sm:p-8">
            <img src="{{ asset('assets/images/logoskolah.png') }}" alt="Logo Sekolah" class="w-24 h-24 mx-auto mb-3">

            <h1 class="text-2xl sm:text-3xl font-bold text-center text-gray-800 mb-2">Register</h1>
            <p class="text-sm text-center text-gray-600 mb-6">Silakan daftar untuk membuat akun baru</p>

            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                    <ul class="text-sm list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="registerForm" action="{{ route('register') }}" method="POST" class="space-y-4 sm:space-y-5">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                    <input type="text" id="name" name="name" required autofocus
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none transition" />
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                    <input type="email" id="email" name="email" required
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none transition" />
                </div>

                <!-- Password -->
                <div class="relative">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" id="password" name="password" required
                        class="w-full px-4 py-3 pr-10 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none transition" />
                    <button type="button" id="togglePassword" class="absolute top-9 right-3 text-gray-500" aria-label="Toggle password visibility">
                        <!-- Eye Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.036 12.322a1.012 1.012 0 00 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178a1.012 1.012 0 000 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </button>
                </div>

                <!-- Confirm Password -->
                <div class="relative">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required
                        class="w-full px-4 py-3 pr-10 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none transition" />
                    <button type="button" id="toggleConfirmPassword" class="absolute top-9 right-3 text-gray-500" aria-label="Toggle confirm password visibility">
                        <!-- Eye Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.036 12.322a1.012 1.012 0 00 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178a1.012 1.012 0 000 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </button>
                </div>

                <!-- Terms -->
                <div class="flex items-center text-sm">
                    <input type="checkbox" id="terms" required class="w-4 h-4 mr-2 text-blue-600 rounded" />
                    <label for="terms" class="text-gray-600">
                        I agree to the
                        <a href="#" class="text-blue-600 underline">terms & conditions</a>
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg shadow transition">
                    Register
                </button>

                <!-- Login Redirect -->
                <p class="text-center text-sm text-gray-600 mt-4">
                    Already have an account?
                    <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login</a>
                </p>
            </form>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function setupTogglePassword(toggleButtonId, inputId) {
            const toggleButton = document.getElementById(toggleButtonId);
            const passwordInput = document.getElementById(inputId);
            toggleButton.addEventListener('click', function () {
                const isPassword = passwordInput.type === 'password';
                passwordInput.type = isPassword ? 'text' : 'password';
                this.classList.toggle('text-blue-600', isPassword);
                this.classList.toggle('text-gray-500', !isPassword);
            });
        }
        setupTogglePassword('togglePassword', 'password');
        setupTogglePassword('toggleConfirmPassword', 'password_confirmation');

        document.getElementById('registerForm').addEventListener('submit', function (event) {
            const password = document.getElementById('password').value;
            const passwordConfirmation = document.getElementById('password_confirmation').value;
            let errors = [];
            if (password.length < 8) {
                errors.push("Password minimal 8 karakter.");
            }
            if (password !== passwordConfirmation) {
                errors.push("Password dan konfirmasi password tidak cocok.");
            }
            if (errors.length > 0) {
                event.preventDefault();
                Swal.fire({
                    icon: 'error',
                    title: 'Validasi Gagal',
                    html: errors.join('<br>'),
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#3085d6'
                });
            }
        });

        @if (session('success'))
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
            });
        @endif
    </script>

</body>
</html>
