@extends('templates.master')

@section('title')
    Show Names Data Results
@stop

@section('content')
    @if($result)
        {!! $result !!} 
    @else
      <p> We have a problem, please try again. </p>
    @endif
    <br><br>
@stop

<br>
<a href='/user'>&nbsp; &larr; back to User Generator</a>
<br>
