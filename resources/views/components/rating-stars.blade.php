@php
    $rating = $movie->rating;
    for ($i = 0; $i < 5; $i++) {
        if ($rating > 0) {
            if ($rating > 0.5) {
                echo '<i class="fa fa-star"></i>';
            } else {
                echo '<i class="fa fa-star-half-o"></i>';
            }
        } else {
            echo '<i class="fa fa-star-o"></i>';
        }
        $rating--;
    }
@endphp
