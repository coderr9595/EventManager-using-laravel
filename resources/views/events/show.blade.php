<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $event->title }}</title>

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
    <h1 class="text-center mb-5">{{ $event->title }}</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">{{ $event->title }}</h5>
                    <p class="card-text text-muted">{{ $event->date }} at {{ $event->time }}</p>
                    <p class="card-text">{{ $event->description }}</p>
                    <p class="card-text"><strong>Price:</strong> ${{ $event->price }}</p>

                    @php
                        $user = session('user');
                    @endphp


                    @if($user)
                        @if(!$event->users->contains($user['id']))
                            <form action="{{ route('events.register', $event->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-lg">Register</button>
                            </form>
                        @else
                            <button class="btn btn-success btn-lg" disabled>Already Registered</button>

                            <form action="{{ route('events.cancel', $event->id) }}" method="POST" class="mt-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-lg">Cancel Registration</button>
                            </form>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="btn btn-warning btn-lg">Login to Register</a> <!-- Prompt to login -->
                    @endif
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
