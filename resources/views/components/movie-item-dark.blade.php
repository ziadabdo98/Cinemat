<div class="col-lg-3 col-md-6 {{ $containerClass }}">
    <div class="movie-box-4">
        <div class="listing-container">

            <!-- Movie List Image -->
            <div class="listing-image">

                <!-- Buttons -->
                <div class="buttons">
                    <a href="#" data-original-title="Rate" data-toggle="tooltip" data-placement="bottom"
                        class="like">
                        <i class="icon-heart"></i>
                    </a>

                    <a href="#" data-original-title="Share" data-toggle="tooltip" data-placement="bottom"
                        class="share">
                        <i class="icon-share"></i>
                    </a>
                </div>

                <!-- Rating -->
                <div class="stars">
                    <div class="rating">
                        @include('components.rating-stars', ['rating' => $movie->rating])
                    </div>
                </div>

                <!-- Image -->
                <img src={{ asset('storage/' . $movie->image) }} alt="">
            </div>

            <!-- Movie List Content -->
            <div class="listing-content">
                <div class="inner">
                    <h2 class="title">{{ $movie->title }}</h2>

                    <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-main btn-effect">details</a>
                </div>
            </div>

        </div>
    </div>
</div>
