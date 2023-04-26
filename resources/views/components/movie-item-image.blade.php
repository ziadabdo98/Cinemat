<div class="item">
    <!-- Start of Movie Box -->
    <div class="movie-box-1">

        <!-- Start of Poster -->
        <div class="poster">
            <img src="{{ asset('storage/' . $movie->image) }}" alt="">
        </div>
        <!-- End of Poster -->

        <!-- Start of Buttons -->
        <div class="buttons">
            <a href="{{ route('movies.show', $movie->id) }}" class="play-video">
                <i class="fa fa-ticket"></i>
            </a>
        </div>
        <!-- End of Buttons -->

        <!-- Start of Movie Details -->
        <div class="movie-details">
            <h4 class="movie-title">
                <a href="{{ route('movies.show', $movie->id) }}">{{ $movie->title }}</a>
            </h4>
            <span class="released">{{ $movie->release_date->toFormattedDateString() }}</span>
        </div>
        <!-- End of Movie Details -->

        <!-- Start of Rating -->
        <div class="stars">
            <div class="rating">
                @include('components.rating-stars', ['rating' => $movie->rating])
            </div>
            <span>{{ number_format($movie->rating, 1) }}/5</span>
        </div>
        <!-- End of Rating -->

    </div>
    <!-- End of Movie Box -->
</div>
