@extends('layouts.layout')
@section('content')
    <div class="row mt-5 mb-5 col-10 ml-auto mr-auto">
        <div class="col-12 col-md-3 bg-light2 pt-3 pb-3 font-weight-bold rounded card sticky-top" style="height: fit-content">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active show" id="v-pills-account-tab" data-toggle="pill" href="#v-pills-account"
                    role="tab" aria-controls="v-pills-account" aria-selected="true">My Account</a>
                <a class="nav-link" id="v-pills-reservations-tab" data-toggle="pill" href="#v-pills-reservations"
                    role="tab" aria-controls="v-pills-reservations" aria-selected="false">My Reservations</a>
            </div>
        </div>
        <div class="col-12 col-md-9">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade active show" id="v-pills-account" role="tabpanel"
                    aria-labelledby="v-pills-account-tab">
                    @include('user.show')
                </div>
                <div class="tab-pane fade" id="v-pills-reservations" role="tabpanel"
                    aria-labelledby="v-pills-reservations-tab">
                    @include('user.reservations')
                </div>
            </div>
        </div>
    </div>
    @include('components.flash-message')
@endsection
