@extends('templates.master')

@section('title')
    Show Names Data Results
@endsection

@section('content')
    @if($result)
        {!! $result !!}
    @else
      <p> We have a problem, please try again. </p>
    @endif
    <br><br>
@endsection
@section('nav')
<a href='/user'>&nbsp; &larr; back to User Generator</a>
<br>
@endsection
