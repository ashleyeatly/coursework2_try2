<form action="POST" action="/login">
    @csrf
    Email: <input type="text" name="email"><br>
    Password: <input type="password" name="password"><br>
    <button type="submit">
        submit
    </button>
</form>

<hr>
@if($errors->any())
    @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach

@endif
