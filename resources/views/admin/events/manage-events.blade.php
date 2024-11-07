<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Events</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }
        .event-card {
            margin-bottom: 20px;
        }
        .action-buttons {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>

@include('components.navbar')

<div class="container mt-5">
    <h1 class="text-center mb-5">Manage Events</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif


    <div class="row">
        @foreach($events as $event)
            <div class="col-md-4">
                <div class="card event-card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->title }}</h5>
                        <p class="card-text"><strong>Date:</strong> {{ $event->date }} at {{ $event->time }}</p>
                        <p class="card-text">{{ Str::limit($event->description, 100) }}</p>
                        <p class="card-text"><strong>Price:</strong> ${{ $event->price }}</p>


                        <div class="action-buttons">

                            <a href="{{ route('admin.events.edit', $event->id) }}" class="btn btn-warning btn-sm">Edit</a>


                            <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this event?')">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>

@include('components.footer')

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
