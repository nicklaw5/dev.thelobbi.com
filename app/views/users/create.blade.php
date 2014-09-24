@include(layouts.header)
	@if(isset(Session::has('socialId')))
		<pre>
			dd(Session::get('socialId'));
			Session::forget('socialId');
		</pre>
	@endif

@include(layouts.footer)