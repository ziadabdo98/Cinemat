<!-- Movie List Item -->
<div class="col-md-12 col-sm-12">
    <div class="movie-list-2">
        <div class="listing-container">

            <!-- Movie List Image -->
            <div class="listing-image">

                <!-- Image -->
                <div class="img-wrapper">

                    <!-- Play Button -->
                    <div class="play-btn">
                        <a href="{{ route('movies.show', $movie->id) }}" class="play-video">
                            <i class="fa fa-ticket"></i>
                        </a>
                    </div>

                    <img src="{{ asset('storage/' . $movie->image) }}" alt="{{ $movie->title }} Poster">
                </div>
            </div>

            <!-- Movie List Content -->
            <div class="listing-content">
                <div class="inner">
                    <h2 class="title">{{ $movie->title }}</h2>

                    <p>{{ $movie->storyline }}</p>

                    <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-main btn-effect">details</a>
                </div>


                <!-- Buttons -->
                <div class="buttons">
                    <a href="#" data-original-title="Rate" data-toggle="tooltip" data-placement="bottom">
                        <i class="icon-heart"></i>
                    </a>

                    <a href="#" data-original-title="Share" data-toggle="tooltip" data-placement="bottom">
                        <i class="icon-share"></i>
                    </a>
                </div>

                <!-- Rating -->
                <div class="stars">
                    <div class="rating">
                        @include('components.rating-stars', ['rating' => $movie->rating])
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<!-- Movie List Item -->
