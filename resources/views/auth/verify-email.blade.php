<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Es necesario confirmar tu cuenta antes de poder iniciar sesión, revisa tu correo electrónico y da click sobre el enlace de confirmación') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('Hemos enviado un correo de confirmación a la cuenta que colocaste al momento de registrarte') }}
            </div>
        @endif

        <div class="mt-4">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-button>
                        {{ __('Enviar email de confirmación') }}
                    </x-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="mt-5 text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Cerrar sesión') }}
                </button>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>
