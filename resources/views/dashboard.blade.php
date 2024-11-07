<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }
        .dashboard-container {
            flex: 1;
            margin-top: 20px;
        }
        .card {
            margin-bottom: 20px;
        }
        footer {
            background-color: #f8f9fa;
            padding: 1rem 0;
            text-align: center;
        }
        .event-card {
            display: inline-block;
            width: 30%;
            margin-right: 2%;
            margin-bottom: 20px;
        }
        .event-card:last-child {
            margin-right: 0;
        }
        .activity-item {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        .activity-item:last-child {
            border-bottom: none;
        }
    </style>
</head>
<body>

@include('components.navbar')


<div class="container dashboard-container">
    <div class="row">

        <div class="col-md-3">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action active">Dashboard Overview</a>
                <a href="#" class="list-group-item list-group-item-action">Reports</a>
                <a href="#" class="list-group-item list-group-item-action">Settings</a>
            </div>
        </div>

        <div class="col-md-9">
            <h2>Dashboard</h2>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="row">

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Users</h5>
                            <p class="card-text">{{ $totalUsers }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">New Events</h5>
                            <p class="card-text">{{ $newEvents }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Active Sessions</h5>
                            <p class="card-text">{{ $activeSessions }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Recent Events</h5>

                            <div class="row">
                                @foreach ($recentEvents as $event)
                                    <div class="event-card">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $event->title }}</h5>
                                                <p class="card-text text-muted">Date: {{ $event->date }} | Time: {{ $event->time }}</p>
                                                <p class="card-text">{{ Str::limit($event->description, 80) }}</p>
                                                <a href="{{ route('events.show', $event->id) }}" class="btn btn-primary btn-sm">View Details</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            @if(count($recentEvents) == 0)
                                <p>No recent events found.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('components.footer')


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
