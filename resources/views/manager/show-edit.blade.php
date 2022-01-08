@extends('manager.layout')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Edit Show</h1>
<form action="{{ route('manager.shows.update',$show) }}"
      method="POST">
    @method('PUT')
    @csrf

    <div class="row">
        @include('components.form-select',[
        'name'=>'movie_id',
        'label'=>'Movie*',
        'classes'=>'col-6',
        'options'=>$movies,
        'required'=>'required',
        'selected'=> $show->movie_id,
        ])
        @include('components.form-select',[
        'name'=>'room',
        'label'=>'Room size <sub>Can\'t be edited after creation</sub>',
        'classes'=>'col-6',
        'options'=>$rooms,
        'required'=>'disabled',
        'selected'=>$show->room_id,
        ])
    </div>

    <div class="row">
        @include('components.form-date',[
        'name'=>'date',
        'label'=>'Show Date*',
        'classes'=>'col-6',
        'value'=>$show->date->toDateString(),
        'required'=>'required',
        'min'=>\Carbon\Carbon::today()->addDay()->toDateString(),
        ])
        @include('components.form-input',[
        'name'=>'price',
        'type'=>'number',
        'label'=>'Price ('.config('app.currency').')*',
        'classes'=>'col-6',
        'value'=>$show->price,
        'required'=>'required',
        'extra_attr'=> 'step=.01'
        ])
    </div>

    <div class="row">
        @include('components.form-time',[
        'name'=>'start_time',
        'label'=>'Start Time*',
        'classes'=>'col-6',
        'value'=>$show->start_time->format('H:i'),
        'required'=>'required',
        ])
        @include('components.form-time',[
        'name'=>'end_time',
        'label'=>'End Time*',
        'classes'=>'col-6',
        'value'=>$show->end_time->format('H:i'),
        'required'=>'required',
        ])
    </div>

    <div class="row justify-content-end">
        <input class="btn btn-warning m-2"
               type="reset">
        <input class="btn btn-success m-2"
               type="submit"
               value="Update">
    </div>
</form>
@include('components.flash-message')
@endsection