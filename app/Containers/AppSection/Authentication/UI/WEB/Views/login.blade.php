<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sign up or log in to take control of your finances.">
    <meta name="keywords" content="finances, money, control, budget, expenses, income, savings">
    <meta name="author" content="Christopher Mendes">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <title>{{ config('app.name') }}</title>
    <style>
        .login-page {
            width: 360px;
            padding: 8% 0 0;
            margin: auto;
        }

        .form {
            position: relative;
            z-index: 1;
            background: #FFFFFF;
            max-width: 360px;
            margin: 0 auto 100px;
            padding: 45px;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        }

        .form input {
            font-family: "Roboto", sans-serif;
            outline: 0;
            background: #f2f2f2;
            width: 100%;
            border: 0;
            margin: 0 0 15px;
            padding: 15px;
            box-sizing: border-box;
            font-size: 14px;
        }

        .form button {
            font-family: "Roboto", sans-serif;
            text-transform: uppercase;
            outline: 0;
            background: #4CAF50;
            width: 100%;
            border: 0;
            padding: 15px;
            color: #FFFFFF;
            font-size: 14px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .form button:hover,
        .form button:active,
        .form button:focus {
            background: #43A047;
        }

        .form .message {
            margin: 15px 0 0;
            color: #b3b3b3;
            font-size: 12px;
        }

        .form .message a {
            color: #4CAF50;
            text-decoration: none;
        }

        .form .register-form {
            display: none;
        }

        h2 {
            padding: 0;
            font-weight: 300;
            color: #1a1a1a;
        }

        .center {
            text-align: center;
        }

        body {
            background: #ffffff;
            font-family: "Roboto", sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .text-red {
            color: red;
            margin-bottom: 10px;
        }

        .hide {
            display: none;
        }
    </style>
</head>

<body>

    <div class="login-page">
        <h1 class="center">Welcome to {{ config('app.name') }}</h1>
        <h2 class="center">Have control over your finances</h2>
        <form class="form" action="{{ route('login') }}" method="post">
            @csrf
            @if (session('login'))
                <div class="text-red">{{ session('login') }}</div>
            @endif
            <label for="email">Type your email to start</label>
            <input type="email" placeholder="your@email.com" id="email" name="email" aria-label="email" required
                autocomplete="username">
            <span class="text-red">{{ $errors->first('email') }}</span>
            <label class="hide" for="password">Password</label>
            <input class="hide" type="password" placeholder="password" id="password" name="password"
                aria-label="password" autocomplete="current-password">
            <label class="hide" for="password_confirmation">Confirm Password</label>
            <input class="hide" type="password" placeholder="Re-type your password" id="password_confirmation"
                name="password_confirmation" aria-label="password_confirmation" autocomplete="new-password">
            <span class="text-red">{{ $errors->first('password_confirmation') }}</span>
            <label class="hide" for="verification_url">Verification URL</label>
            <input class="hide" type="text" id="verification_url" name="verification_url"
                value="{{ config('appSection-authentication.allowed-verify-email-urls.0') }}"
                aria-label="verification_url">
            <span class="text-red">{{ $errors->first('password') }}</span>

            <a href="#">I need help</a>

            <button>Next</button>
        </form>
    </div>

    <script>
        document.querySelector('form').addEventListener('submit', function(e) {
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const button = document.querySelector('button');

            cleanErrors();

            button.disabled = true;
            button.textContent = 'Processing...';

            if (!password && email) {
                e.preventDefault();
                checkEmail(email, button);
            }
        });

        function checkEmail(email, button) {
            const apiUrl = `{{ route('authentication.email.check') }}?email=${encodeURIComponent(email)}`;

            fetch(apiUrl, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    }
                })
                .then(response => response.ok ? response.json() : Promise.reject('Network response was not ok.'))
                .then(data => handleEmailCheckResponse(data, button))
                .catch(() => handleEmailCheckError(button));
        }

        function handleEmailCheckResponse(data, button) {
            document.getElementById('password').classList.remove('hide');
            document.querySelector('label[for="email"]').classList.add('hide');
            button.disabled = false;
            button.textContent = 'Sign Up';
        }

        function handleEmailCheckError(button) {
            document.getElementById('password').classList.remove('hide');
            document.getElementById('password').setAttribute('autocomplete', 'new-password');
            document.getElementById('password_confirmation').classList.remove('hide');
            document.querySelector('form').action = "{{ route('register') }}";
            document.querySelector('h1').textContent = 'Sign up now and take charge of your finances!';
            document.querySelector('button').textContent = 'Register';
            button.disabled = false;
            document.querySelector('h2').classList.add('hide');
        }

        function cleanErrors() {
            document.querySelectorAll('.text-red').forEach(function(el) {
                el.textContent = '';
            });
        }
    </script>

    {{-- TODO: If error on creating user, make sure the form comes back to the sign up form again --}}
    {{-- TODO: If user is created, show a message to check the email to verify the account --}}

</body>

</html>
