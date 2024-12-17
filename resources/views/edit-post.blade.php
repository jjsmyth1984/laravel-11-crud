<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
</head>
<body>
<h1>Edit post</h1>
<form id="post-list-edit" action="/edit-post/{{$post->id}}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="title" value="{{$post->title}}">
    <textarea name="body" cols="30" rows="10">{{$post->body}}</textarea>
    <button form="post-list-edit" type="submit">Save</button>
</form>
</body>
</html>
