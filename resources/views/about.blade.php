<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }
        .about-section {
            margin-top: 50px;
            padding: 30px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .about-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .about-content {
            margin-bottom: 20px;
        }
        .mission-statement {
            margin-top: 30px;
            font-style: italic;
        }
    </style>
</head>
<body>

@include('components.navbar')

<div class="container mt-5">
    <div class="about-header">
        <h1>About Us</h1>
        <p class="lead">Learn more about our mission and services.</p>
    </div>

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card shadow-sm about-section">
                <div class="card-body">
                    <div class="about-content">
                        <h3>Our Mission</h3>
                        <p>We are committed to creating a seamless experience for both event organizers and attendees. Our platform connects users with events that match their interests and provides the tools necessary to manage and participate in them effectively.</p>
                    </div>

                    <div class="about-content">
                        <h3>What We Do</h3>
                        <p>We help users discover and register for events, while also allowing organizers to create and manage events easily. Our goal is to ensure every user has a great experience attending events they love!</p>
                    </div>

                    <div class="mission-statement">
                        <h4>Our Vision</h4>
                        <p>"Connecting people, creating experiences."</p>
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
