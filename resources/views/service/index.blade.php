<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Roleplay Studio Client') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow rounded-lg">
                    @foreach ($services as $service)
                        <h1 class="text-lg font-semibold mb-4">2D Animation</h1>
                        <form method="POST"
                            action="{{ route('service.update.2dAnimation', ['service' => $service['id']]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <input type="hidden" name="service_id" value="{{ $service['id'] }}">

                            <div class="mb-4 flex items-center justify-between">
                                <div class="w-1/5 rounded-md bg-gray-100 dark:bg-gray-700 p-2">
                                    @if ($service['2d_animation']['image'])
                                        <img src="{{ asset('storage/' . $service['2d_animation']['image']) }}"
                                            alt="Service Thumbnail" class="w-16 h-16 object-cover rounded-full">
                                    @else
                                        <i class="fas fa-image text-4xl"></i>
                                    @endif
                                </div>
                                <div class="w-4/5 ml-4">
                                    <label for="thumbnail" class="block text-gray-700 text-sm font-semibold mb-2">
                                        <i class="fas fa-pencil-alt"></i> Edit Thumbnail
                                    </label>
                                    <label for="thumbnail-2d-animation-{{ $service['id'] }}"
                                        class="block text-gray-500 border rounded-lg px-4 py-2 cursor-pointer hover:bg-gray-200 hover:text-gray-700 dark:hover:bg-gray-700 dark:hover:text-gray-200">
                                        <span id="file-label-2d-animation-{{ $service['id'] }}">Choose Image File</span>
                                    </label>
                                    <input type="file" name="2d_animation.image"
                                        id="thumbnail-2d-animation-{{ $service['id'] }}" accept="image/*" class="hidden"
                                        onchange="displayFileName({{ $service['id'] }}, '2d-animation')">
                                </div>
                            </div>
                            <div class="mb-4">
                                <x-input-label for="2d_animation.title" :value="__('Title')" />
                                <x-text-input id="2d_animation.title" class="block mt-1 w-full" type="text"
                                    name="2d_animation.title" :value="$service['2d_animation']['title']" required />
                                <x-input-error :messages="$errors->get('2d_animation.title')" class="mt-2" />
                            </div>
                            <div class="mb-4">
                                <x-input-label for="2d_animation.video_url" :value="__('Video URL')" />
                                <x-text-input id="2d_animation.video_url" class="block mt-1 w-full" type="text"
                                    name="2d_animation.video_url" :value="$service['2d_animation']['video_url']" required />
                                <x-input-error :messages="$errors->get('2d_animation.video_url')" class="mt-2" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>

                                @if (session('status') === '2d-animation-updated')
                                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                                @endif
                            </div>
                        </form>
                    @endforeach
                </div>
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow rounded-lg">
                    @foreach ($services as $service)
                        <h1 class="text-lg font-semibold mb-4">3D Animation</h1>
                        <form method="POST"
                            action="{{ route('service.update.3dAnimation', ['service' => $service['id']]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <input type="hidden" name="service_id" value="{{ $service['id'] }}">

                            <div class="mb-4 flex items-center justify-between">
                                <div class="w-1/5 rounded-md bg-gray-100 dark:bg-gray-700 p-2">
                                    @if ($service['3d_animation']['image'])
                                        <img src="{{ asset('storage/' . $service['3d_animation']['image']) }}"
                                            alt="Service Thumbnail" class="w-16 h-16 object-cover rounded-full">
                                    @else
                                        <i class="fas fa-image text-4xl"></i>
                                    @endif
                                </div>
                                <div class="w-4/5 ml-4">
                                    <label for="thumbnail" class="block text-gray-700 text-sm font-semibold mb-2">
                                        <i class="fas fa-pencil-alt"></i> Edit Thumbnail
                                    </label>
                                    <label for="thumbnail-3d-animation-{{ $service['id'] }}"
                                        class="block text-gray-500 border rounded-lg px-4 py-2 cursor-pointer hover:bg-gray-200 hover:text-gray-700 dark:hover:bg-gray-700 dark:hover:text-gray-200">
                                        <span id="file-label-3d-animation-{{ $service['id'] }}">Choose Image
                                            File</span>
                                    </label>
                                    <input type="file" name="3d_animation.image"
                                        id="thumbnail-3d-animation-{{ $service['id'] }}" accept="image/*"
                                        class="hidden"
                                        onchange="displayFileName({{ $service['id'] }}, '3d-animation')">
                                </div>
                            </div>
                            <div class="mb-4">
                                <x-input-label for="3d_animation.title" :value="__('Title')" />
                                <x-text-input id="3d_animation.title" class="block mt-1 w-full" type="text"
                                    name="3d_animation.title" :value="$service['3d_animation']['title']" required />
                                <x-input-error :messages="$errors->get('3d_animation.title')" class="mt-2" />
                            </div>
                            <div class="mb-4">
                                <x-input-label for="3d_animation.video_url" :value="__('Video URL')" />
                                <x-text-input id="3d_animation.video_url" class="block mt-1 w-full" type="text"
                                    name="3d_animation.video_url" :value="$service['3d_animation']['video_url']" required />
                                <x-input-error :messages="$errors->get('3d_animation.video_url')" class="mt-2" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>

                                @if (session('status') === '3d-animation-updated')
                                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                                @endif
                            </div>
                        </form>
                    @endforeach
                </div>
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow rounded-lg">
                    @foreach ($services as $service)
                        <h1 class="text-lg font-semibold mb-4">Explainer Video</h1>
                        <form method="POST"
                            action="{{ route('service.update.explainerVideo', ['service' => $service['id']]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <input type="hidden" name="service_id" value="{{ $service['id'] }}">

                            <div class="mb-4 flex items-center justify-between">
                                <div class="w-1/5 rounded-md bg-gray-100 dark:bg-gray-700 p-2">
                                    @if ($service['explainer_video']['image'])
                                        <img src="{{ asset('storage/' . $service['explainer_video']['image']) }}"
                                            alt="Service Thumbnail" class="w-16 h-16 object-cover rounded-full">
                                    @else
                                        <i class="fas fa-image text-4xl"></i>
                                    @endif
                                </div>
                                <div class="w-4/5 ml-4">
                                    <label for="thumbnail" class="block text-gray-700 text-sm font-semibold mb-2">
                                        <i class="fas fa-pencil-alt"></i> Edit Thumbnail
                                    </label>
                                    <label for="thumbnail-explainer-video-{{ $service['id'] }}"
                                        class="block text-gray-500 border rounded-lg px-4 py-2 cursor-pointer hover:bg-gray-200 hover:text-gray-700 dark:hover:bg-gray-700 dark:hover:text-gray-200">
                                        <span id="file-label-explainer-video-{{ $service['id'] }}">Choose Image
                                            File</span>
                                    </label>
                                    <input type="file" name="explainer_video.image"
                                        id="thumbnail-explainer-video-{{ $service['id'] }}" accept="image/*"
                                        class="hidden"
                                        onchange="displayFileName({{ $service['id'] }}, 'explainer-video')">
                                </div>
                            </div>
                            <div class="mb-4">
                                <x-input-label for="explainer_video.title" :value="__('Title')" />
                                <x-text-input id="explainer_video.title" class="block mt-1 w-full" type="text"
                                    name="explainer_video.title" :value="$service['explainer_video']['title']" required />
                                <x-input-error :messages="$errors->get('explainer_video.title')" class="mt-2" />
                            </div>
                            <div class="mb-4">
                                <x-input-label for="explainer_video.video_url" :value="__('Video URL')" />
                                <x-text-input id="explainer_video.video_url" class="block mt-1 w-full" type="text"
                                    name="explainer_video.video_url" :value="$service['explainer_video']['video_url']" required />
                                <x-input-error :messages="$errors->get('explainer_video.video_url')" class="mt-2" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>

                                @if (session('status') === 'explainer-video-updated')
                                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                                @endif
                            </div>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script>
        function displayFileName(id, zone) {
            console.log(zone)
            const fileInput = document.getElementById(`thumbnail-${zone}-${id}`);
            const fileLabel = document.getElementById(`file-label-${zone}-${id}`);

            if (fileInput.files.length > 0) {
                fileLabel.textContent = fileInput.files[0].name;
            } else {
                fileLabel.textContent = 'Choose Thumbnail File';
            }
        }
    </script>
</x-app-layout>
