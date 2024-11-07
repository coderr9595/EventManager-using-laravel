<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
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
    <h1 class="text-center mb-5">Edit Event</h1>

    <!-- Success message -->
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.events.update', $event->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Event Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $event->title) }}" required>
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="date">Event Date</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ old('date', $event->date) }}" required>
            @error('date')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="time">Event Time</label>
            <input type="time" name="time" id="time" class="form-control" value="{{ old('time', $event->time) }}" required>
            @error('time')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Event Description</label>
            <textarea name="description" id="description" class="form-control" rows="5" required>{{ old('description', $event->description) }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="price">Event Price</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $event->price) }}" required>
            @error('price')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary btn-block">Update Event</button>
    </form>

</div>

@include('components.footer')

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
