@foreach ($errors->all('<p style="color:#cc0000">:message</p>') as $error)
	{{ $error }}
@endforeach