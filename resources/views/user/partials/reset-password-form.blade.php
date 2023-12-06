<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Reset Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Once the password reset, the password back to default "password".') }}
        </p>
    </header>
    <div class="flex items-center gap-4">
        <x-danger-button x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-reset-password')">{{ __('Reset Password') }}</x-danger-button>
        @if (session('status') === 'user-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
        @endif
    </div>


    <x-modal name="confirm-user-reset-password" :show="$errors->userResetPassword->isNotEmpty()" focusable>
        <form method="post" action="{{ route('user.reset-password') }}" class="p-6">
            @csrf
            @method('patch')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Are you sure you want to reset user password?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Once the password reset, the password back to default "password".') }}
            </p>

            <div class="mt-6">
                <x-text-input id="id" name="id" type="hidden" class="mt-1 block w-3/4"
                    value="{{ $user->id }}" readonly placeholder="{{ __('id') }}" />

                <x-input-label for="confirmation" value="{{ __('confirmation') }}" class="sr-only" />
                <x-text-input id="confirmation" name="confirmation" type="text" class="mt-1 block w-3/4"
                    placeholder="{{ __('Type RESET PASSWORD to continue!') }}" />

                <x-input-error :messages="$errors->userResetPassword->get('confirmation')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('Reset Password') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
