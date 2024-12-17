<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <!-- Stylesheet -->
    @vite('resources/css/app.css')
</head>
<body>

@if(Session::has('error'))
    <div class="alert alert-danger" role="alert">
        {{ Session::get('error') }}
    </div>
@endif

@auth
    <p>Congrats, you're logged in!</p>
    <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
        <button form="logout-form" type="submit">Log out</button>
    </form>

    <div id="post" style="border: 3px solid black; padding: 5px; margin: 0 0 10px 0">
        <h2>New post</h2>
        <form id="post-form" action="{{ route('create-post') }}" method="POST">
            @csrf
            <input type="text" id="title" name="title" placeholder="Post title">
            <textarea name="body" id="body" cols="30" rows="10" placeholder="Body content..."></textarea>
            <button form="post-form" type="submit">Create post</button>
        </form>
    </div>

    <div id="post-list" style="border: 3px solid black; padding: 5px; margin: 0 0 10px 0">
        <h2>All posts</h2>
        @foreach($posts as $post)
            <div style="background: gray; padding: 10px; margin:10px;">
                <h3>{{$post['title']}} by {{$post->userDetails->name}}</h3>
                <p>{{$post['body']}}</p>
                <a href="/view-post/{{$post->id}}">View</a>
                <form id="post-list-delete" action="/delete-post/{{$post->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button form="post-list-delete" type="submit">Delete</button>
                </form>
            </div>
        @endforeach
    </div>

@else
    @include('panels.login.login');
@endauth
</body>
</html>
