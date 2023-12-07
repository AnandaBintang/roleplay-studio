<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Roleplay Studio</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="{{ url('build/assets/app-f9b4bf8d.css') }}">
    <link rel="stylesheet" href="{{ url('build/assets/app-73168167.css') }}">
    <link rel="stylesheet" href="{{ url('build/assets/custom-1cc2161c.css') }}">
</head>

<body class="antialiased">
    <div id="preloader">
        <div class="loader">
            <svg viewBox="0 0 80 80">
                <circle id="test" cx="40" cy="40" r="32"></circle>
            </svg>
        </div>

        <div class="loader triangle">
            <svg viewBox="0 0 86 80">
                <polygon points="43 8 79 72 7 72"></polygon>
            </svg>
        </div>

        <div class="loader">
            <svg viewBox="0 0 80 80">
                <rect x="8" y="8" width="64" height="64"></rect>
            </svg>
        </div>

        <!-- dribbble -->
        <a class="dribbble" href="https://dribbble.com/shots/5878367-Loaders" target="_blank"><img
                src="https://cdn.dribbble.com/assets/dribbble-ball-mark-2bd45f09c2fb58dbbfb44766d5d1d07c5a12972d602ef8b32204d28fa3dda554.svg"
                alt=""></a>
    </div>

    <nav class="nav">
        <div class="nav-wrapper">
            <a href="#">Home</a>
            <a href="#service">Services</a>
            <a href="#contact">How to order</a>
        </div>
    </nav>

    <header id="jumbotron" class="flex items-end">
        <div class="flex flex-col items-center w-full p-8">
            <div class="logo w-full md:w-4/5 lg:w-3/5">
                <img src="{{ URL::to('/') }}/image/logo.png" alt="Roleplay Studio">
            </div>
            <div
                class="motto text-center w-4/5 xl:w-3/5 2xl:w-1/2 rounded-md mx-auto mt-12 md:mt-20 xl:mt-10 2xl:mt-20 mb-24 md:mb-28">
                <h4 class="text-sm md:text-xl text-center p-3" id="animation-target"></h4>
            </div>
        </div>
    </header>

    <section id="about" class="flex items-center">
        <div class="flex flex-col items-center w-full p-8">
            <div class="about-title">
                <h1
                    class="text-white text-5xl md:text-7xl xl:text-8xl 2xl:text-9xl font-extrabold text-center capitalize relative before:content-['About'] before:absolute before:bottom-11 md:before:bottom-16 xl:before:bottom-24 2xl:before:bottom-32 before:text-2xl md:before:text-3xl xl:before:text-4xl 2xl:before:text-5xl">
                    ROLEPLAY</h1>
            </div>
            <div class="about-content w-4/5 md:w-1/2 mt-10" data-aos="fade-up">
                <p class="text-white text-base md:text-xl xl:text-2xl font-thin tracking-widest m-7 xl:m-12">
                    {!! $about !!}</p>
            </div>
        </div>
    </section>

    <section id="vision-mission" class="flex items-center">
        <div class="flex flex-col items-center w-full h-full p-8">
            <div class="vision-mission-title">
                <h1 class="text-white text-5xl md:text-7xl xl:text-8xl 2xl:text-9xl font-extrabold text-center">
                    Vision &<br>Mission</h1>
            </div>
            <x-vision-mission :contents="$visionMission" />
        </div>
    </section>

    <section id="service" class="flex items-center">
        <div class="flex flex-col items-center w-full h-full p-8">
            <h2 class="text-white text-xl md:text-2xl 2xl:text-4xl font-extrabold capitalize">Company Profile</h2>
            <h1 class="text-transparent text-5xl md:text-6xl 2xl:text-8xl font-black capitalize">OURSERVICE</h1>
            <x-service :services="$service[0]" />
        </div>
    </section>

    <section id="client" class="flex items-center">
        <div class="flex flex-col items-center w-full h-full p-12">
            <h1 class="text-white text-4xl md:text-6xl 2xl:text-8xl font-black capitalize relative my-6">OUR CLIENT</h1>
            <x-client :clients="$client" />
        </div>
    </section>

    <section id="contact" class="flex items-center">
        <div class="flex flex-col items-center w-full h-full py-12">
            <h1 class="text-white text-xl bg-neutral-800 rounded-md p-3">How to Order?</h1>
            <div class="w-full md:w-3/4 xl:w-3/5 h-full bg-transparent my-10 relative">
                <img src="{{ URL::to('/') }}/image/card.png" class="select-none pointer-events-none relative z-0"
                    draggable="false" alt="card">
                <div class="contact absolute top-[10%] left-[20%] xl:top-[20%] z-10">
                    <h3 class="text-black text-sm md:text-xl font-bold tracking-tighter">We need you! Help us <br>get
                        to
                        know you
                        better</h3>
                    <h4
                        class="text-black text-sm md:text-xl font-semibold tracking-tighter mt-3 md:mt-7 ml-12 md:ml-44">
                        Contact
                        us by
                        means</h4>
                    <ul class="text-black text-xl 2xl:text-3xl xl:mt-16">
                        <li class="youtube"><i class="fa-brands fa-youtube"></i><a target="_blank" class="text-xl mx-5"
                                href="{{ $socialMedia['youtube_url'] }}">{{ $socialMedia['youtube_url'] }}</a></li>
                        <li class="instagram"><i class="fa-brands fa-instagram"></i><a target="_blank"
                                class="text-xl mx-5"
                                href="{{ $socialMedia['instagram_url'] }}">{{ $socialMedia['instagram_url'] }}</a></li>
                        <li class="whatsapp"><i class="fa-brands fa-whatsapp"></i><a target="_blank"
                                class="text-xl mx-5"
                                href="{{ $socialMedia['whatsapp_url'] }}">{{ $socialMedia['whatsapp_url'] }}</a></li>
                        <li class="email"><i class="fa-regular fa-envelope"></i><a target="_blank"
                                class="text-xl mx-5"
                                href="mailto:{{ $socialMedia['email_url'] }}">{{ $socialMedia['email_url'] }}</a>
                        </li>
                    </ul>
                    <h4 class="text-black text-sm md:text-xl font-semibold tracking-tighter mt-3 md:mt-7">If u wants to
                        join as a internship click link below</h4>
                    <a target="_blank" href="{{ $socialMedia['internship_url'] }}"
                        class="text-black text-xl font-black">Join
                        internship!</a>
                </div>
            </div>
        </div>
    </section>

    <script type="module" src="{{ url('build/assets/app-8cc4be36.js') }}"></script>
    <script src="{{ url('build/assets/animate-34db8aef.js') }}"></script>
</body>

</html>
