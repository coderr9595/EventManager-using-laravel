<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }


    </style>
</head>
<body>

@include('components.navbar')


<div class="container mt-5">
    <h1 class="text-center mb-5">Upcoming Events</h1>
    <div class="row">
        @if($events->count() > 0)
            @foreach($events as $event)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">
                                <a href="{{ route('events.show', $event->id) }}" class="text-decoration-none text-dark">
                                    {{ $event->title }}
                                </a>
                            </h5>
                            <p class="card-text text-muted mb-2">
                                {{ $event->date }} at {{ $event->time }}
                            </p>
                            <p class="card-text">{{ $event->description }}</p>
                            <p class="card-text"><strong>Price:</strong> ${{ $event->price }}</p>
                            <div class="mt-auto">
                                <a href="{{ route('events.show', $event->id) }}" class="btn btn-primary btn-sm">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-12">
                <div class="alert alert-info text-center">No upcoming events found that you are not registered for.</div>
            </div>
        @endif
    </div>
</div>
@include('components.footer')


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
