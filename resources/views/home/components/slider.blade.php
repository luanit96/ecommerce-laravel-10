<div id="slides-shop" class="cover-slides">
    <ul class="slides-container">
        @foreach ($sliders as $slider)
            <li class="text-center">
                <img src="{{ $slider->image_path }}" alt="{{ $slider->image_name }}">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>{{ $slider->name }}</strong></h1>
                            <p class="m-b-40">{{ $slider->description }}</p>
                            <p><a class="btn hvr-hover" href="{{ url('/') }}">Shop New</a></p>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    <div class="slides-navigation">
        <a href="" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
        <a href="" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
    </div>
</div>
