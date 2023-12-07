@props(['services'])

<div class="wrapper h-full w-full md:w-4/5 xl:w-3/4 flex flex-wrap items-center justify-center my-10">
    <div class="w-1/2 md:w-1/4 p-3" data-aos="zoom-in">
        <a data-fslightbox href="{{ $services['2d_animation']['video_url'] }}">
            <div class="service w-full after:content-['2D_Animation']" class=""
                style="background-image: {{ asset('storage/' . $services['2d_animation']['image']) }}">
            </div>
        </a>
    </div>
    <div class="w-1/2 md:w-1/4 p-3" data-aos="zoom-in">
        <a data-fslightbox href="{{ $services['3d_animation']['video_url'] }}">
            <div class="service w-full after:content-['3D_Animation']" class=""
                style="background-image: {{ asset('storage/' . $services['3d_animation']['image']) }}">
            </div>
        </a>
    </div>
    <div class="w-1/2 md:w-1/4 p-3" data-aos="zoom-in">
        <a data-fslightbox href="{{ $services['explainer_video']['video_url'] }}">
            <div class="service w-full after:content-['Explainer_Video']" class=""
                style="background-image: {{ asset('storage/' . $services['explainer_video']['image']) }}">
            </div>
        </a>
    </div>
</div>
</div>
