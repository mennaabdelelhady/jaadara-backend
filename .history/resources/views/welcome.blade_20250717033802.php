<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>

    <form id="login-form">
        @csrf
        <input type="email" id="email" placeholder="Email" required><br>
        <input type="password" id="password" placeholder="Password" required><br>
        <button type="submit">Login</button>
    </form>

    <p>Don't have an account? <a href="/register">Register here</a></p>

    <script>
        document.getElementById('login-form').addEventListener('submit', function(e) {
            e.preventDefault(); // Prevent page reload

            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            fetch('/api/login', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    email: email,
                    password: password
                })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Login failed');
                }
                return response.json();
            })
            .then(data => {
                //  Save token to localStorage
                localStorage.setItem('auth_token', data.access_token);

                //  Save user (optional)
                localStorage.setItem('auth_user', JSON.stringify(data.user));

                //  Redirect to dashboard
                window.location.href = '/dashboard';
            })
            .catch(err => {
                alert('Login failed. Check console for details.');
                console.error('Login error:', err);
            });
        });
    </script>
</body>
</html>