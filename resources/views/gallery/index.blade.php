<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Roleplay Studio Gallery') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @foreach ($gallery as $art)
                    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow rounded-lg">
                        <h1 class="text-lg font-semibold mb-4">Art {{ $art->id }}</h1>
                        <form method="POST" action="{{ route('gallery.update', ['gallery' => $art->id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <input type="hidden" name="gallery_id" value="{{ $art->id }}">

                            <div class="mb-4 flex items-center justify-between">
                                <div class="w-1/5 bg-gray-100 dark:bg-gray-700 p-2 rounded-lg">
                                    @if ($art->art)
                                        <img src="{{ asset('storage/' . $art->art) }}" alt="Art Image"
                                            class="w-16 h-16 object-cover rounded-lg">
                                    @else
                                        <i class="fas fa-image text-4xl"></i>
                                    @endif
                                </div>
                                <div class="w-4/5 ml-4">
                                    <label for="art" class="block text-gray-700 text-sm font-semibold mb-2">
                                        <i class="fas fa-pencil-alt"></i> Edit Art Image
                                    </label>
                                    <label for="art-{{ $art->id }}"
                                        class="block text-gray-500 border rounded-lg px-4 py-2 cursor-pointer hover:bg-gray-200 hover:text-gray-700 dark:hover:bg-gray-700 dark:hover:text-gray-200">
                                        <span id="file-label-{{ $art->id }}">Choose Art Image File</span>
                                    </label>
                                    <input type="file" name="art" id="art-{{ $art->id }}" accept="image/*"
                                        class="hidden" onchange="displayFileName({{ $art->id }})">
                                </div>
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>

                                @if (session('status') === 'gallery-updated')
                                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                                @endif
                            </div>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        function displayFileName(id) {
            const fileInput = document.getElementById(`art-${id}`);
            const fileLabel = document.getElementById(`file-label-${id}`);

            if (fileInput.files.length > 0) {
                fileLabel.textContent = fileInput.files[0].name;
            } else {
                fileLabel.textContent = 'Choose Art Image File';
            }
        }
    </script>

</x-app-layout>
