@extends('manager.layout')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Edit Movie</h1>
<form action="{{ route('manager.movies.update',$movie) }}"
      method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row">
        @include('components.form-input',[
        'name'=>'image',
        'classes'=>'col-6',
        'label'=>'Poster Image',
        // 'required'=>'required',
        'type'=>'file',
        ])
        @include('components.form-input',[
        'name'=>'title',
        'classes'=>'col-6',
        'label'=>'Image Title*',
        'required'=>'required',
        'type'=>'text',
        'value'=>$movie->title,
        ])
    </div>
    <div class="row">
        @include('components.form-select',[
        'name'=>'category_id',
        'label'=>'Category*',
        'classes'=>'col-6',
        'options'=>$categories,
        'required'=>'required',
        'selected'=> $movie->category_id,
        ])
        @include('components.form-input',[
        'name'=>'language',
        'classes'=>'col-6',
        'label'=>'Movie Language*',
        'required'=>'required',
        'type'=>'text',
        'value'=>$movie->language,
        ])
    </div>

    <div class="row">
        @include('components.form-input',[
        'name'=>'rating',
        'classes'=>'col-6',
        'label'=>'Movie Rating*',
        'required'=>'required',
        'type'=>'number',
        'value'=>$movie->rating,
        'extra_attr'=>'min=0 max=5 step=0.01',
        ])
        @include('components.form-date',[
        'name'=>'release_date',
        'label'=>'Movie Release Date*',
        'classes'=>'col-6',
        'value'=>$movie->release_date->toDateString(),
        'required'=>'required',
        ])
    </div>

    <div class="row">
        @include('components.form-input',[
        'name'=>'director',
        'classes'=>'col-6',
        'label'=>'Director*',
        'required'=>'required',
        'type'=>'text',
        'value'=>$movie->director,
        ])
        @include('components.form-input',[
        'name'=>'maturity_rating',
        'classes'=>'col-6',
        'label'=>'Maturity Rating*',
        'required'=>'required',
        'type'=>'text',
        'value'=>$movie->maturity_rating,
        ])
    </div>
    <div class="row">
        @include('components.form-time',[
        'name'=>'running_time',
        'label'=>'Running Time*',
        'classes'=>'col-6',
        'value'=>$movie->running_time->format('H:i'),
        'required'=>'required',
        ])
        @include('components.form-textarea',[
        'name'=>'storyline',
        'classes'=>'col-6',
        'label'=>'Movie Storyline*',
        'required'=>'required',
        'value'=>$movie->storyline,
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