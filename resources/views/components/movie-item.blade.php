<div class="item">

    <div class="movie-box-3">
        <div class="listing-container">

            <!-- Movie List Image -->
            <div class="listing-image">
                <!-- Image -->
                <img src="{{ asset('storage/'.$movie->image)  }}" alt="">
            </div>

            <!-- Movie List Content -->
            <div class="listing-content">
                <div class="inner">

                    <!-- Play Button -->
                    <div class="play-btn">
                        <a href="{{ route('movies.show',$movie->id) }}#reserve-now" class="play-video">
                            <i class="fa fa-ticket"></i>
                        </a>
                    </div>

                    <h2 class="title">{{ $movie->title }}</h2>

                    <!-- Rating -->
                    <div class="stars">
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <span>{{ number_format($movie->rating,1) }}/5</span>
                            <span class="category">{{ $movie->category->title }}</span>
                        </div>
                    </div>

                    <p>{{ Str::limit($movie->storyline, 150, '...') }}</p>

                    <a href="{{ route('movies.show',$movie->id) }}" class="btn btn-main btn-effect">details</a>
                </div>
            </div>

        </div>
    </div>
</div>