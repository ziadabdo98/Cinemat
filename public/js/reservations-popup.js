const container = document.querySelector(".cinema-container");
const SeatsContainer = document.querySelector(".seats-container");
// const seats = document.querySelectorAll(".row .seat:not(.sold)");
const count = document.getElementById("seats-count");
const total = document.getElementById("total-price");


var ticketPrice;
var seats;
var seatsIndex;
var selectedSeatsCount;
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab
var SignedIn;
var ShowId;

// populate ui using ajax to get reservation
function populateUI(id, date, price, signedIn) {
    ticketPrice = price;
    SignedIn = signedIn;
    ShowId = id;

    // delete old seats
    SeatsContainer.innerHTML = "";
    seatsIndex = [];
    selectedSeatsCount = 0;
    count.innerText = 0;
    total.innerText = 0;
    currentTab = 0;
    showTab(currentTab);
    if (SignedIn)
        document.getElementsByClassName("tab")[1].style.display = "none";

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

    seatsIndex = [...selectedSeats].map((seat) => [...seats].indexOf(seat));

    selectedSeatsCount = selectedSeats.length;

    count.innerText = selectedSeatsCount;
    total.innerText = (selectedSeatsCount * ticketPrice).toFixed(2);
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



function showTab(n) {
    // This function will display the specified tab of the form ...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    // ... and fix the Previous/Next buttons:
    if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
    } else {
        document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
        if (SignedIn)
            document.getElementById("nextBtn").innerHTML = "Reserve!";
        else
            document.getElementById("nextBtn").innerHTML = "Login/Register to reserve";
    } else {
        document.getElementById("nextBtn").innerHTML = "Next";
    }
}

function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tab");
    // Exit the function if any field in the current tab is invalid:
    if (n == 1 && !validateForm()) return false;

    if ((currentTab + n < x.length))
        // Hide the current tab:
        x[currentTab].style.display = "none";

    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form... :
    if (currentTab >= x.length) {
        //...the form gets submitted:
        submit();
        return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
}

function submit() {
    if (SignedIn) {
        formData = {};
        $('#reservation-form').serializeArray().map(function (x) { formData[x.name] = x.value; });
        console.log(formData);
        $.ajax({
            url: '/reservations',
            type: "POST",
            data: {
                _token: formData['_token'],
                card_num: formData['card-num'],
                name: formData['name'],
                exp: formData['exp'],
                cvv: formData['cvv'],
                selected_seats: seatsIndex,
                show_id: ShowId
            },
            success: function (response) {
                alert('Successfully reserved the tickets, reloading');
                window.location.reload();
            },
            error: function (response) {
                alert('An error happened, reloading');
                window.location.reload();
            }
        });
    } else {
        window.location.href = '/login';
    }
}

function validateForm() {
    // This function deals with validation of the form fields
    var tabs, valid = true;
    tabs = document.getElementsByClassName("tab");
    y = tabs[currentTab].getElementsByTagName("input");

    // check validity of tab
    if (currentTab === 0) {
        // in seats tab
        if (selectedSeatsCount === 0)
            valid = false;
    } else {
        formData = {};
        $('#reservation-form').serializeArray().map(function (x) { formData[x.name] = x.value; });
        if (formData['card-num'] == "") {
            $('#card-number-error').text('Card number can\'t be empty');
            return false;
        } else $('#card-number-error').text('');
        if (formData['name'] == "") {
            $('#card-name-error').text('Card name can\'t be empty');
            return false;
        } else $('#card-name-error').text('');
        if (formData['exp'] == "") {
            $('#exp-error').text('Expiry date can\'t be empty');
            return false;
        } else $('#exp-error').text('');
        if (formData['cvv'] == "") {
            $('#cvv-error').text('CVV can\'t be empty');
            return false;
        } else $('#cvv-error').text('');
        return true;
    }

    return valid; // return the valid status
}