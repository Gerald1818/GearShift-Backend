<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GearShift</title>
 </head>
 <body>

@auth
<p>Logged In.</p>
<form action="\logout" method="POST">
    @csrf
    <button>Log out</button>
 </form>
<div style="boarder: 3px solid black;">
    <h2>Add Product</h2> 
    <form action="/create-post" method="POST">
        @csrf
        <input type="text" name="title">
        <textarea name="body" placeholder="Product description"></textarea>
        <button>Post</button>
    </form>
</div>

<div style="boarder: 3px solid black;">
    <h2>All Products</h2>
    @foreach($posts as $post)
    <div style="background-color: gray; padding: 10px margin: 10px;" >
        <h3>{{$post['title']}}
        {{$post['body']}}
        <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
        <form action="/delete-post/ {{$post->id}}" method="POST">
        @csrf
        @method('DELETE')
        <button>Delete</button>
        </form>
    </div>
</div>
@endforeach

@else
<div style="border: 3px solid black;">
    <h2>Register</h2>
    <form action="/register" method="POST">
        @csrf
        <input name="name" type="text" placeholder="username">
        <input name="email" type="text" placeholder="email">
        <input name="password" type="password" placeholder="password">
        <button>Register</button>
    </form>
</div>

<div style="border: 3px solid black;">
    <h2>Login</h2>
    <form action="/login" method="POST">
        @csrf
        <input name="username" type="text" placeholder="username">
        <input name="userpassword" type="password" placeholder="password">
        <button>Log in</button>
    </form>
</div>
@endauth
    
 </body>
</html>