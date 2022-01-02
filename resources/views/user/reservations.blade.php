<div class="container">
    <h1 class="mt-0 mb-0">My Reservations</h1>
    <hr>
    {{-- {{ ddd($reservations) }} --}}
    @if ($reservations->isNotEmpty())
    <table class="table table-striped table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Movie</th>
                <th scope="col">Show times</th>
                <th scope="col">Seat number</th>
                <th scope="col">Show price</th>
                <th scope="col"></th>
            </tr>
        </thead>
        @foreach ($reservations as $reservation)
        <tr>
            <th>{{ $reservation->show->movie->title }}</th>
            <th>{{ $reservation->show->date_time->toDayDateTimeString() }}</th>
            <td>{{ $reservation->seat_number }}</td>
            <td>{{ $reservation->show->price." ".config('app.currency') }}</td>
            @if ($reservation->show->date_time > Carbon\Carbon::now()->add(3,'hour'))
            <td>
                <form action="{{ route('reservations.destroy',$reservation->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <input class="btn btn-second text-white" type="submit" value="Cancel Reservation">
                </form>
            </td>
            @endif
        </tr>
        @endforeach
    </table>
    @else
    <div class="bg-light p-3 font-weight-bold rounded text-center">
        There are current no shows for this movie, check back later!
    </div>
    @endif
</div>