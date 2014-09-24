@include(layouts.header)

	@if(isset(Session::has('socialId')))
		<pre>
			dd(Session::get('socialId'));
		</pre>
	@endif

@include(layouts.footer)