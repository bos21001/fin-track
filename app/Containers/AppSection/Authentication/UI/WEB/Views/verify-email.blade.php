<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify E-mail</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        footer {
            text-align: center;
            padding: 1rem;
            background-color: #f8f9fa;
        }

        .spinner-border {
            width: 3rem;
            height: 3rem;
        }

        .spinner-border {
            width: 3rem;
            height: 3rem;
        }

        .icon-success,
        .icon-error {
            display: none;
            font-size: 3rem;
        }

        .icon-success {
            color: green;
        }

        .icon-error {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-body text-center">
                <h5 class="card-title">Verifying Your E-mail</h5>
                <div id="spinner" class="spinner-border text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <div id="message" class="mt-3" style="display: none;"></div>
                <div id="icon-success" class="icon-success">✓</div>
                <div id="icon-error" class="icon-error">X</div>
            </div>
        </div>
    </div>
    <footer>
        &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    @if (empty($url))
        <script>
            document.getElementById('spinner').style.display = 'none';
            document.getElementById('icon-error').style.display = 'block';
            document.getElementById('message').classList.remove('text-success');
            document.getElementById('message').classList.add('text-danger');
            document.getElementById('message').textContent =
                'Please provide a valid verification URL.';
            document.getElementById('message').style.display = 'block';
        </script>
    @else
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                fetch("{!! $url !!}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        }
                    })
                    .then(response => {
                        if (response.ok) {
                            return response.json();
                        }
                        throw new Error('Network response was not ok.');
                    })
                    .then(data => {
                        document.getElementById('spinner').style.display = 'none';
                        document.getElementById('icon-success').style.display = 'block';
                        document.getElementById('message').classList.remove('text-danger');
                        document.getElementById('message').classList.add('text-success');
                        document.getElementById('message').textContent =
                            'Your e-mail has been successfully verified.';
                        document.getElementById('message').style.display = 'block';
                    })
                    .catch(error => {
                        document.getElementById('spinner').style.display = 'none';
                        document.getElementById('icon-error').style.display = 'block';
                        document.getElementById('message').classList.remove('text-success');
                        document.getElementById('message').classList.add('text-danger');
                        document.getElementById('message').textContent =
                            'There was an error verifying your e-mail. Please try again.';
                        document.getElementById('message').style.display = 'block';
                    });
            });
        </script>
    @endif
</body>

</html>
