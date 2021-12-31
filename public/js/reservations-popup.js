const container = document.querySelector(".cinema-container");
const SeatsContainer = document.querySelector(".seats-container");
// const seats = document.querySelectorAll(".row .seat:not(.sold)");
const count = document.getElementById("seats-count");
const total = document.getElementById("total-price");


var ticketPrice;
var seats;


// populate ui using ajax to get reservation
function populateUI(id, date, price) {
    ticketPrice = price;

    // delete old seats
    SeatsContainer.innerHTML = "";

    // populate price and date of show
    $('#show-date').text(date);
    $('#show-price').text(price);

    // fetch show data and populate seats accordingly
    $.get('/json/shows/' + id, function (show) {
        populateSeats(show['room']['size'], show['reservations']);
    })

}

// Update total and count
function updateSelectedCount() {
    const selectedSeats = document.querySelectorAll(".row .seat.selected");

    const seatsIndex = [...selectedSeats].map((seat) => [...seats].indexOf(seat));
    console.log(seatsIndex);

    localStorage.setItem("selectedSeats", JSON.stringify(seatsIndex));

    const selectedSeatsCount = selectedSeats.length;

    count.innerText = selectedSeatsCount;
    total.innerText = selectedSeatsCount * ticketPrice;
}

function populateSeats(RoomSize, Reservations) {

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

    // set seats variable to be able to get selected seat index
    seats = document.querySelectorAll(".row .seat")
}

// Seat click event
container.addEventListener("click", (e) => {
    if (e.target.classList.contains("seat") && !e.target.classList.contains("sold")) {
        e.target.classList.toggle("selected");
        updateSelectedCount();
    }
});