@include('layouts.header')

	@if(isset($result))
		<pre>
			dd($result);
		</pre>
	@endif

@include('layouts.footer')