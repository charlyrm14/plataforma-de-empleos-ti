<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('¿Olvidaste tu contraseña? Ingresa tu correo electrónico de registro y enviaremos un enlace para que puedas cambiar tu contraseña') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}" novalidate>
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Correo electrónico')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-button>
                    {{ __('Enviar instrucciones') }}
                </x-button>
            </div>

            <div class="flex justify-between mt-5">
                <x-link :href="route('login')">
                    Iniciar sesión
                </x-link>
                <x-link :href="route('register')">
                    Crear una cuenta
                </x-link>
            </div>

        </form>
    </x-auth-card>
</x-guest-layout>
