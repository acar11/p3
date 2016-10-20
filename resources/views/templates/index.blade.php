@extends('templates.master')

@section('content')

<h1>Developer's Best Friend</h1>

<h2>Lorem Ipsum Generator</h2>
<blockquote>
        <p>A quick and simplified answer is that Lorem Ipsum refers to text that
           the DTP (Desktop Publishing) industry use as replacement text when
           the real text is not available.
        </p>
        <p>For example, when designing a brochure or book, a designer will insert
           Lorem ipsum text if the real text is not available. The Lorem ipsum
           text looks real enough that the brochure or book looks complete.
           The book or brochure can be shown to the client for approval.
        </p>
</blockquote>
<p>Create random text filler for your applications.</p>

<a href='/lorem'>Generate lorem-ipsum here</a>

<br>

<h2>Random User Generator</h2>
<p>Create random user data for your applications. Like Lorem Ipsum, but for people.</p>

<a href='/user'>Generate users here</a>

@stop

@section('footer')
    <!--p>&copy; {{ date('Y') }}</p-->
@stop
