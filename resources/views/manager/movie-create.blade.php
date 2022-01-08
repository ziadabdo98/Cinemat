@extends('manager.layout')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Add Movie</h1>
<form action="{{ route('manager.movies.store') }}"
      method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        @include('components.form-input',[
        'name'=>'image',
        'classes'=>'col-6',
        'label'=>'Poster Image',
        'required'=>'required',
        'type'=>'file',
        ])
        @include('components.form-input',[
        'name'=>'title',
        'classes'=>'col-6',
        'label'=>'Image Title*',
        'required'=>'required',
        'type'=>'text',
        'value'=>old('title'),
        ])
    </div>
    <div class="row">
        @include('components.form-select',[
        'name'=>'category_id',
        'label'=>'Category*',
        'classes'=>'col-6',
        'options'=>$categories,
        'required'=>'required',
        'selected'=> old('category_id'),
        ])
        @include('components.form-input',[
        'name'=>'language',
        'classes'=>'col-6',
        'label'=>'Movie Language*',
        'required'=>'required',
        'type'=>'text',
        'value'=>old('language'),
        ])
    </div>

    <div class="row">
        @include('components.form-input',[
        'name'=>'rating',
        'classes'=>'col-6',
        'label'=>'Movie Rating*',
        'required'=>'required',
        'type'=>'number',
        'value'=>old('rating'),
        'extra_attr'=>'min=0 max=5 step=0.01',
        ])
        @include('components.form-date',[
        'name'=>'release_date',
        'label'=>'Movie Release Date*',
        'classes'=>'col-6',
        'value'=>old('release_date'),
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
        'value'=>old('director'),
        ])
        @include('components.form-input',[
        'name'=>'maturity_rating',
        'classes'=>'col-6',
        'label'=>'Maturity Rating*',
        'required'=>'required',
        'type'=>'text',
        'value'=>old('maturity_rating'),
        ])
    </div>
    <div class="row">
        @include('components.form-time',[
        'name'=>'running_time',
        'label'=>'Running Time*',
        'classes'=>'col-6',
        'value'=>old('running_time'),
        'required'=>'required',
        ])
        @include('components.form-textarea',[
        'name'=>'storyline',
        'classes'=>'col-6',
        'label'=>'Movie Storyline*',
        'required'=>'required',
        'value'=>old('storyline'),
        ])
    </div>

    <div class="row justify-content-end">
        <input class="btn btn-success m-2"
               type="submit"
               value="Save">
    </div>
</form>
@include('components.flash-message')
@endsection