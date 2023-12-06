@props(['clients'])

<div class="wrapper h-full w-full md:w-2/3 xl:w-1/2 flex flex-wrap items-center justify-center my-10">
    @foreach ($clients as $client)
        <div class="w-1/4 p-3 md:p-6" data-aos="zoom-in">
            <div
                class="client w-16 h-16 md:w-32 md:h-32 xl:w-28 xl:h-28 2xl:w-36 2xl:h-36 rounded-2xl md:rounded-3xl flex items-center justify-center">
                <img src="{{ asset('storage/' . $client['logo']) }}" alt="{{ $client['client_name'] }}">
            </div>
        </div>
    @endforeach
</div>
