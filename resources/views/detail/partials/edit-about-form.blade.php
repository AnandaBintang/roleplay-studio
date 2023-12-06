<form method="post" action="{{ route('detail.about.update') }}" class="my-6 space-y-6">
    @csrf
    @method('patch')

    <textarea class="text-black ck-editor" name="about" id="aboutEditor" data-cke-editable>{{ old('editor', $detail['about']) }}</textarea>

    <div class="flex items-center gap-4">
        <x-primary-button>{{ __('Save') }}</x-primary-button>

        @if (session('status') === 'about-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
        @endif
    </div>
</form>
