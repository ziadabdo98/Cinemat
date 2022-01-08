@extends('manager.layout')

@section('content')
<h1 class="h3 mb-4 text-gray-800">View Show</h1>

<div class="row">
    @include('components.form-input',[
    'name'=>'movie_id',
    'type'=>'text',
    'label'=>'Movie',
    'classes'=>'col-6',
    'required'=>'disabled',
    'value'=>$show->movie->title,
    ])
    @include('components.form-input',[
    'name'=>'room',
    'type'=>'text',
    'label'=>'Remaining Seats',
    'classes'=>'col-6',
    'required'=>'disabled',
    'value'=>$show->remaining_seats.'/'.$show->room->size,
    ])
</div>

<div class="row">
    @include('components.form-input',[
    'name'=>'date',
    'type'=>'text',
    'label'=>'Show Date',
    'classes'=>'col-6',
    'required'=>'disabled',
    'value'=>$show->date->toDateString(),
    ])
    @include('components.form-input',[
    'name'=>'price',
    'type'=>'text',
    'label'=>'Price',
    'classes'=>'col-6',
    'required'=>'disabled',
    'value'=>$show->price,
    ])
</div>

<div class="row">
    @include('components.form-input',[
    'name'=>'start_time',
    'type'=>'text',
    'label'=>'Start Time',
    'classes'=>'col-6',
    'required'=>'disabled',
    'value'=>$show->start_time->format('H:i'),
    ])
    @include('components.form-input',[
    'name'=>'end_time',
    'type'=>'text',
    'label'=>'End Time',
    'classes'=>'col-6',
    'required'=>'disabled',
    'value'=>$show->end_time->format('H:i'),
    ])
</div>

<div class="res-container">
    <h1>Reservations</h1>
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
</div>


{{-- Cinema JS --}}
<script>
    const container = document.querySelector(".cinema-container");
const SeatsContainer = document.querySelector(".seats-container");

var ShowId={{ $show->id }};

// populate ui using ajax to get reservation
function populateUI() {
    
    // delete old seats
    SeatsContainer.innerHTML = "";

    // fetch show data and populate seats accordingly
    $.get('/json/shows/' + ShowId, function (show) {
        populateSeats(show['room']['size'], show['reservations']);
    })

}

function populateSeats(RoomSize, Reservations) {

    console.log(RoomSize);

    // add empty seats
    var seat = '<div class="row">' +
        '    <div class="seat"></div>' +
        '    <div class="seat"></div>' +
        '    <div class="seat"></div>' +
        '    <div class="seat"></div>' +
        '    <div class="seat"></div>' +
        '    <div class="seat"></div>' +
        '</div>';
    for (let i = 0; i < RoomSize / 6; i++) {
        SeatsContainer.innerHTML += seat;
    }

    // add reserved seats
    $('.cinema-container .seat').each(function (i) {
        if (Reservations.includes(i))
            $(this).addClass("sold");
    });
}

</script>

<style>
    .res-container * {
        box-sizing: border-box;
    }

    .res-container {
        background-color: #242333;
        color: #fff;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin: auto;
        border-radius: 2rem;
        max-width: 500px;
        padding: 30px;
    }

    .cinema-container {
        perspective: 1000px;
        margin-bottom: 30px;
        width: 100%;
        padding-left: 15px;
        padding-right: 15px;
        margin-left: auto;
        margin-right: auto;
    }

    .seat {
        background-color: #444451;
        height: 26px;
        width: 32px;
        margin: 3px;
        font-size: 50px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .seat.selected {
        background-color: green;
    }

    .seat.sold {
        background-color: #fff;
    }

    .seat:nth-of-type(1) {
        margin-right: 18px;
    }

    .seat:nth-last-of-type(1) {
        margin-left: 18px;
    }

    .seat:not(.sold):hover {
        cursor: pointer;
        transform: scale(1.2);
    }

    .showcase .seat:not(.sold):hover {
        cursor: default;
        transform: scale(1);
    }

    .showcase {
        background: rgba(0, 0, 0, 0.1);
        padding: 5px 5px;
        border-radius: 5px;
        color: #777;
        list-style-type: none;
        display: flex;
        justify-content: space-between;
        width: 100%;
    }

    .showcase li {
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 10px;
    }

    .showcase li small {
        margin-left: 2px;
    }

    .row {
        display: flex;
        justify-content: center;
    }

    .screen {
        background-color: #fff;
        height: 120px;
        width: 100%;
        margin: 15px 0;
        transform: rotateX(-48deg);
        box-shadow: 0 3px 10px rgba(255, 255, 255, 0.7);
    }

    .reservation-text {
        margin: 5px 0;
    }

    .reservation-text span {
        color: rgb(158, 248, 158);
    }

    .reservation-movie-details {
        width: 45%;
    }
</style>
<div class="justify-content-center text-center">
    <button class="btn btn-primary m-2 justify-content-center" onclick="populateUI()">Load Reservations</button>
</div>
<div class="row justify-content-end">
    <a href="{{ route('manager.shows.edit',$show->id) }}" class="btn btn-warning m-2">Edit</a>
    <form action="{{ route('manager.shows.destroy',$show->id) }}"
          method="POST">
        @csrf
        @method('DELETE')
        <input class="btn btn-danger text-white m-2"
               type="submit"
               value="Delete">
    </form>
</div>
@include('components.flash-message')
@endsection