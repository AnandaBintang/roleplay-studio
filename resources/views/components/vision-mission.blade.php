@props(['contents'])

@foreach ($contents as $content)
    <div class="vision-mission-content w-4/5 md:w-1/2 rounded-xl border-4 border-white mt-10" data-aos="fade-up">
        <h3 class="text-white text-3xl font-extrabold text-center mt-7">{{ $content['title'] }}</h3>
        <p class="text-white text-base text-center tracking-widest m-7 xl:m-12">{{ $content['content'] }}</p>
    </div>
@endforeach
