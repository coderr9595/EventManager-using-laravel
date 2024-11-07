
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

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
        <h1 class="text-center mb-5">Admin Dashboard</h1>

        <div class="row justify-content-center">
            <div class="col-md-5 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Create Event</h5>
                        <p class="card-text">Easily create a new event for your users to join.</p>
                        <a href="{{url('/admin/events/create')}}" class="btn btn-primary btn-lg">Create Event</a>
                    </div>
                </div>
            </div>

            <div class="col-md-5 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Manage Events</h5>
                        <p class="card-text">View, edit, and delete events you've created.</p>
                        <a href="{{url('/admin/manage-events')}}" class="btn btn-primary btn-lg">Manage Events</a>
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
