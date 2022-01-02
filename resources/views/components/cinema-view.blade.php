<div class="reservation-movie-details pt-2 pb-2">
    <div>Movie: <strong id="movie-title" class="font-weight-bold">{{ $movie->title }}</strong></div>
    <div>Date: <strong id="show-date" class="font-weight-bold"></strong></div>
    <div>Price: <strong class="font-weight-bold"><strong id="show-price"></strong> {{ config('app.currency') }}</strong></div>
</div>

<ul class="showcase">
    <li>
        <div class="seat"></div>
        <small>Available</small>
    </li>
    <li>
        <div class="seat selected"></div>
        <small>Selected</small>
    </li>
    <li>
        <div class="seat sold"></div>
        <small>Sold</small>
    </li>
</ul>
<div class="container cinema-container">
    <div class="screen"></div>
    <div class="seats-container">

    </div>
</div>

<p class="reservation-text">
    You have selected <span id="seats-count">0</span> seat for a price of <span id="total-price">0</span> {{ config('app.currency') }}
</p>