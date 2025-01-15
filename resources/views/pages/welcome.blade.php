@extends('templates.auth')

@section('content')
<h1>Welcome, Logged In</h1>

<a class="bg-red-300 rounded-2xl w-fit p-3" href="{{route('logout')}}">Logout</a>
@endsection
