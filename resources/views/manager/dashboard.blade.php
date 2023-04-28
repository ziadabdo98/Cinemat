@extends('manager.layout')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Movies</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $numOfMovies }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-film fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Shows</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $numOfShows }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-compact-disc fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Shows in upcoming week
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $showsNextWeek }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Customers</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $numOfCustomers }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <!-- Bar Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Movie Release Dates</h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar">
                        <canvas id="manager-bar-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Movie Categories</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="manager-pie-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('foot')
    <script src="{{ asset('js/chart.js/Chart.min.js') }}"></script>

    <script>
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito',
            '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        @php
            use App\Models\Role;
            $movies = \App\Models\Movie::with('category')->get();
            $categories = $movies->groupBy('category_id');
            $categoryLabels = $categories->map(fn($category) => $category[0]->category->title)->values();
            $categoryCounts = $categories->map(fn($category) => $category->count())->values();
            
            $releaseYears = $movies
                ->map(function ($movie) {
                    $movie->release_year = $movie->release_date->year;
                    return $movie;
                })
                ->sortBy('release_year')
                ->groupBy('release_year');
            $years = $releaseYears->keys();
            $yearCounts = $releaseYears->map(fn($year) => $year->count())->values();
        @endphp

        // Function to generate an array of random background colors
        function generateBackgroundColors(numColors) {
            var colors = [];
            for (var i = 0; i < numColors; i++) {
                // Generate a random color in hexadecimal format
                var color = '#' + Math.floor(Math.random() * 16777215).toString(16);
                colors.push(color);
            }
            return colors;
        }
        var numCategories = @json($categoryLabels).length;
        var backgroundColors = generateBackgroundColors(numCategories);

        var pieCtx = document.getElementById("manager-pie-chart");
        var myPieChart = new Chart(pieCtx, {
            type: 'doughnut',
            data: {
                labels: @json($categoryLabels),
                datasets: [{
                    data: @json($categoryCounts),
                    backgroundColor: backgroundColors,
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                cutoutPercentage: 80,
            },
        });

        var barCtx = document.getElementById("manager-bar-chart");
        var myBarChart = new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: @json($years),
                datasets: [{
                    label: "Count",
                    backgroundColor: "#4e73df",
                    hoverBackgroundColor: "#2e59d9",
                    borderColor: "#4e73df",
                    data: @json($yearCounts),
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'year'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        maxBarThickness: 25,
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: @json(max($yearCounts->toArray())),
                            maxTicksLimit: 5,
                            padding: 10,
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
            }
        });
    </script>
@endpush
