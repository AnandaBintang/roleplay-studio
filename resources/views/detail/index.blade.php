<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Roleplay Studio Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-3">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <h1>About Us</h1>
                @include('detail.partials.edit-about-form')
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-3 flex gap-3">
            <div class="w-1/2">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <h1>Vision</h1>
                    @include('detail.partials.edit-vision-form')
                </div>
            </div>
            <div class="w-1/2">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <h1>Mission</h1>
                    @include('detail.partials.edit-mission-form')
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
