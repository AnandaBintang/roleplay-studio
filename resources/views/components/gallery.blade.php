@props(['galleries'])

<div class="wrapper h-full w-full md:w-3/4 flex flex-wrap items-center justify-center my-10">
    @foreach ($galleries['art'] as $art)
        <div class="w-1/2 md:w-1/3 xl:w-1/6 p-3 md:p-6" data-aos="fade-up">
            <div
                class="border-2 border-pink-500 bg-blue-100 bg-cover rounded-lg h-72 {{ $galleries['margin'][$loop->index]['marginClass'][0] }}">
                @isset($art['art'])
                    <img src="{{ asset('storage/' . $art['art']) }}" class="w-full h-full rounded-lg">
                @endisset
            </div>
        </div>
    @endforeach
</div>
