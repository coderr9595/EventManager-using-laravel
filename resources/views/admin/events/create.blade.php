<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Event</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

@include('components.navbar')

<div class="container mt-5">
    <h1 class="text-center mb-4">Create Event</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <form action="{{ route('admin.events.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Event Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="date">Event Date</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}" required>
        </div>

        <div class="form-group">
            <label for="time">Event Time</label>
            <input type="time" class="form-control" id="time" name="time" value="{{ old('time') }}" required>
        </div>

        <div class="form-group">
            <label for="price">Event Price ($)</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}" required>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Create Event</button>
    </form>
</div>

@include('components.footer')

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
