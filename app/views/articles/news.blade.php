@extends('layouts.default')
@section('content')

@include('ads.leaderboard')

<div class="main-wrapper container">
	<section class="section-left article-container">
		<h1 class="article-title text-shadow">{{ $article->title }}</h1>
		<p class="article-author">By <span><a href="#">{{ $article->author_name }}</a></span> on December 5, 2014</p>
		<div class="article-social">
			<ul>
				<li>
					Discuss:
				</li>
				<li>
					<a href="#comments">
						<div class="bg-comments">
							<span class=""><i class="fa fa-comments"></i></span>
						</div>
					</a>
				</li>
				<li class="bold">
					Share:
				</li>
				<li>
					<a target="_blank" href="https://twitter.com/intent/tweet?text=Dragon%20Age:%20Inquisition%20Wins%20GOTY%20at%20Game%20Awards&related=&url=http://www.gamespot.com/articles/dragon-age-inquisition-wins-goty-at-game-awards/1100-6424005/">
						<div class="bg-twitter">
							<span class=""><i class="fa fa-twitter"></i></span>		
						</div>
					</a>
				</li>
				<li>
					<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http://www.gamespot.com/articles/dragon-age-inquisition-wins-goty-at-game-awards/1100-6424005/">
						<div class="bg-facebook">
							<span class=""><i class="fa fa-facebook"></i></span>		
						</div>
					</a>
				</li>
				<li>
					<a target="_blank" href="https://plus.google.com/share?utm_medium=share%2Bbutton&url=http://www.gamespot.com/articles/dragon-age-inquisition-wins-goty-at-game-awards/1100-6424005/">
						<div class="bg-google-plus">
							<span class=""><i class="fa fa-google-plus"></i></span>		
						</div>
					</a>
				</li>
			</ul>
		</div>
		<hr>
		<div class="article-body">
			{{ $article->body }}
		</div>
		<hr>
		<div class="comments" id="comments">
			<h3 class="text-shadow">Comments</h3>

				
					<script type="text/javascript">

						var disqus_config = function() {
							@if( ! empty($disqusPayload) )
							    this.page.remote_auth_s3 = "{{"$disqusPayload[0] $disqusPayload[2] $disqusPayload[1]"}}";
							    this.page.api_key = "{{ $disqusPayload[3] }}";
							@endif

						    this.sso = {
					          	name:  	 "The Lobbi",
					          	button:  "http://static.thelobbi.com/images/sign-in-btn.png",
					          	icon:    "http://static.thelobbi.com/images/favicon.png",
					          	url:     "{{ url('signin') }}",
					          	logout:  "{{ url('signout') }}",
					          	width:   "800",
					          	height:  "450"
					    	};
						};

					</script>
				

			    <div id="disqus_thread"></div>
			    <script type="text/javascript">
			        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
			        var disqus_shortname = 'thelobbi'; // required: replace example with your forum shortname

			        /* * * DON'T EDIT BELOW THIS LINE * * */
			        (function() {
			            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
			            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
			            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
			        })();
			    </script>
			    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    
		</div>
	</section>

	<section class="section-right">
		@include('ads.kickstarter-indiegogo-iframe')
	</section>
	
</div>


@stop