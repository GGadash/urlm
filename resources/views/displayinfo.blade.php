<!-- resources/views/displayinfo.blade.php -->

@include('common.errors')

<DIV>ID: {{ $urlinfo->id }}</DIV>

<p><DIV>Short URL: </DIV>
<DIV><a target="_blank" href="{{ url('/').'/'.$urlinfo->id }}">{{ url('/').'/'.$urlinfo->id }}</a></DIV></p>

<p><DIV>Long URL: </DIV>
<DIV>{{ $urlinfo->longurl }}</DIV></p>
