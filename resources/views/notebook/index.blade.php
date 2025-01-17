@extends('templates.auth')

@section('content')
   @forelse($notes as $note)
       {{$note->title}}
   @empty
       <p>No NoteBooks</p>
   @endforelse
@endsection
