@include(layouts.header)
	@if(isset($result))
		<pre>
			dd($result);
			<!-- dd(Session::get('socialId'));
			Session::forget('socialId'); -->
		</pre>
	@endif

@include(layouts.footer)