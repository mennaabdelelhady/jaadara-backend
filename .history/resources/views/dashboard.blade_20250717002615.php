@extends('layouts.app')

@section('content')
<div class="container">
    <h2>My Posts</h2>

    <form id="post-form">
        @csrf
        <input type="text" id="title" placeholder="Title" required>
        <textarea id="body" placeholder="Body" required></textarea>
        <input type="text" id="image" placeholder="Image URL (optional)">
        <button type="submit">Add Post</button>
    </form>

    <ul id="post-list"></ul>
</div>

<script>
const token = localStorage.getItem('auth_token');

document.getElementById('post-form').addEventListener('submit', function(e) {
    e.preventDefault();

    const postData = {
        title: document.getElementById('title').value,
        body: document.getElementById('body').value,
        image: document.getElementById('image').value
    };

    fetch('/api/posts', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token
        },
        body: JSON.stringify(postData)
    })
    .then(res => res.json())
    .then(data => {
        console.log('Post created:', data);
        loadPosts(); // Refresh list
        document.getElementById('post-form').reset();
    })
    .catch(err => console.error('Error:', err));
});

function loadPosts() {
    fetch('/api/posts', {
        headers: {
            'Authorization': 'Bearer ' + token
        }
    })
    .then(res => res.json())
    .then(data => {
        const list = document.getElementById('post-list');
        list.innerHTML = '';
        data.data.forEach(post => {
            const li = document.createElement('li');
            li.innerHTML = `
                <strong>${post.title}</strong>: ${post.body}
                <br>
                <small>ID: ${post.id}</small>
                <button onclick="deletePost(${post.id})">Delete</button>
            `;
            list.appendChild(li);
        });
    });
}

function deletePost(id) {
    fetch(`/api/posts/${id}`, {
        method: 'DELETE',
        headers: {
            'Authorization': 'Bearer ' + token
        }
    })
    .then(res => {
        if (res.status === 204) {
            loadPosts(); // Refresh list
        }
    });
}

// Load posts on page load
window.onload = loadPosts;
</script>
@endsection