<form id="login-form">
    <input type="email" id="email" placeholder="Email" required>
    <input type="password" id="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>

<script>
document.getElementById('login-form').addEventListener('submit', function(e) {
    e.preventDefault();

    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    fetch('/api/login', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ email, password })
    })
    .then(res => res.json())
    .then(data => {
        // Save token
        localStorage.setItem('auth_token', data.access_token);
        
        // Redirect to dashboard
        window.location.href = '/dashboard';
    })
    .catch(err => {
        alert('Login failed');
        console.error(err);
    });
});
</script>