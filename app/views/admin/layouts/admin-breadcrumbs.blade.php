
<ol class="breadcrumb bc-1">
	@foreach(explode('/', ltrim($_SERVER['REQUEST_URI'], '/')) as $crumb)
	<li>
		<a href="#">
				{{ ucfirst($crumb) }}
		</a>
	</li>
	@endforeach
</ol>
	