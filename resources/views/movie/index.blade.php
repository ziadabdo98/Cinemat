@extends('layouts.layout')

@push('head')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush

@section('content')
    <section class="page-header overlay-gradient"
        style="background: url({{ asset('images/branding/posters/movie-collection.webp') }});">
        <div class="container">
            <div class="inner">
                <h2 class="title">Movies</h2>
                <ol class="breadcrumb">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Movies</li>
                </ol>
            </div>
        </div>
    </section>

    <!-- =============== START OF MAIN =============== -->
    <main class="ptb100">
        <div class="container" x-data="{
            layout: 'grid',
            setLayout(newLayout) {
                if (newLayout != 'grid' && newLayout != 'list') return;
                this.layout = newLayout;
                localStorage.setItem('layout', newLayout);
            },
            init() {
                const localLayout = localStorage.layout;
                if (localLayout == 'grid' || localLayout == 'list') {
                    this.layout = localLayout;
                } else {
                    this.layout = 'grid';
                }
            }
        }">

            <!-- Start of Filters -->
            <div class="d-flex mb50 align-items-center justify-content-between">


                <form method="GET" action="{{ route('movies.index') }}" class="d-flex">

                    <input type="search" name="search" id="search" class="py-1 form-control" placeholder="search"
                        style="flex-basis: fit-content" value="{{ request('search') }}">

                    <div class="px-3 py-3 py-xl-0"></div>

                    <div class="d-flex align-items-center">
                        <label for="category" class="pr-1 text-nowrap">Category:</label>
                        <select name="category" id="category" class="py-1">
                            <option value="" default>All Categories</option>
                            @foreach (\App\Models\Category::CATEGORIES as $category)
                                <option value="{{ $category }}"
                                    {{ request('category') == $category ? 'selected' : '' }}>
                                    {{ $category }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="px-3 py-3 py-xl-0"></div>

                    <div class="d-flex align-items-center">
                        <label for="sort" class="pr-1 text-nowrap">Sort by: </label>
                        @php
                            $sortings = [
                                'default' => 'Default Order',
                                'top-rated' => 'Top Rated',
                                'newest' => 'Newest',
                                'oldest' => 'Oldest',
                            ];
                        @endphp
                        <select name="sort" id="sort" class="py-1">
                            @foreach ($sortings as $value => $sorting)
                                <option value="{{ $value }}" {{ request('sort') == $value ? 'selected' : '' }}>
                                    {{ $sorting }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="px-2 py-3 py-xl-0"></div>

                    <input type="submit" value="Filter" class="btn btn-main">

                </form>

                <div class="py-3 py-xl-0"></div>

                <div>
                    <!-- Layout Switcher -->
                    <div class="layout-switcher">
                        <a href="#" class="list" x-bind:class="{ 'active': layout === 'list' }"
                            @@click.prevent="setLayout('list')">
                            <i class="fa fa-align-justify"></i>
                        </a>
                        <a href="#" class="grid" x-bind:class="{ 'active': layout === 'grid' }"
                            @@click.prevent="setLayout('grid')">
                            <i class="fa fa-th"></i>
                        </a>
                    </div>
                </div>


            </div>
            <!-- End of Filters -->


            @if ($movies->isEmpty())
                <p class="bg-light font-weight-bold h4 p-5 rounded text-center">No movies found!</p>
            @else
                <!-- Start of Movie Grid -->
                <div class="row" x-show="layout === 'grid'" x-transition>
                    @each('components.movie-grid-item', $movies, 'movie')
                </div>
                <!-- End of Movie Grid -->

                <!-- Start of Movie List -->
                <div class="row mt100" x-show="layout === 'list'" x-transition>
                    @each('components.movie-list-item', $movies, 'movie')
                </div>
                <!-- End of Movie List -->
            @endif


            <!-- Start of Pagination -->
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    {!! $movies->links('pagination::bootstrap-4') !!}
                </div>
            </div>
            <!-- End of Pagination -->

        </div>
    </main>
    <!-- =============== END OF MAIN =============== -->
@endsection
