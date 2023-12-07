<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Roleplay Studio Social Media') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-3">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <h1>Social Media</h1>
                <p class="text-gray-600 dark:text-gray-400">Isi dengan "#" (tanpa petik) jika belum ada link</p>
                <form method="post" action="{{ route('social-media.update') }}" class="my-6 space-y-6">
                    @csrf
                    @method('patch')
                    <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <x-input-label for="youtube" :value="__('Youtube')" />
                            <x-text-input id="youtube" class="block mt-1 w-full" type="text" name="youtube"
                                :value="$socialMedia['youtube_url']" required />
                            <x-input-error :messages="$errors->get('youtube')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="instagram" :value="__('Instagram')" />
                            <x-text-input id="instagram" class="block mt-1 w-full" type="text" name="instagram"
                                :value="$socialMedia['instagram_url']" required />
                            <x-input-error :messages="$errors->get('youtube')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="text" name="email"
                                :value="$socialMedia['email_url']" required />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="whatsapp" :value="__('Whatsapp')" />
                            <x-text-input id="whatsapp" class="block mt-1 w-full" type="text" name="whatsapp"
                                :value="$socialMedia['whatsapp_url']" required />
                            <x-input-error :messages="$errors->get('whatsapp')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="internship" :value="__('Internship Registration Link')" />
                            <x-text-input id="internship" class="block mt-1 w-full" type="text" name="internship"
                                :value="$socialMedia['internship_url']" required />
                            <x-input-error :messages="$errors->get('internship')" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Save') }}</x-primary-button>

                        @if (session('status') === 'social-media-updated')
                            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                        @endif
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
