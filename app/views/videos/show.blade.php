@extends('layouts.default')
	@section('content')
    
        @include('ads.leaderboard')

        <div class="content-wrapper container well br-none">

        	<div class="video-container row well br-none">

                <div style="padding-left: 0" class="col-md-8 video-player">
                    <div id='playertqLUYHhEYkVv'></div>
                    <script type='text/javascript'>
                        jwplayer('playertqLUYHhEYkVv').setup({
                            file: 'https://www.youtube.com/watch?v=xzCEdSKMkdU',
                            image: 'http://drh2.img.digitalriver.com/DRHM/Storefront/Company/ubi/images/hero/ubi/ACU_hero.jpg',
                            width: '100%',
                            aspectratio: '16:9',
                            autostart: 'false',
                            primary: 'flash'
                        });
                    </script>
                    <div class="video-player-meta">
                        <h4 class="video-player-meta-title text-shadow">E3 2014: Revolution Trailer</h4>
                        <small>Posted: Sept 19, 2014 <span class="pull-right"><i class="fa fa-users"></i> Views: 2,438 | <a href="#comments"><i class="fa fa-comment"></i> Comments: 6</a></span></small>
                        <p>Revolution is in the air in Assassin's Creed: Unity. Are you ready to write history? Revolution is in the air in Assassin's Creed: Unity. Are you ready to write history?</p>
                    </div>
                </div>

                <div class="col-md-4 video-playlist">
                    <h4 class="video-playlist-header text-shadow">Recommended Videos</h4>
                    <!--<hr class="video-playlist-hr">-->
                    <ul>
                        <li>
                            <div class="media">
                                <a class="pull-left" href="#">
                                    <img class="media-object image" src="http://placehold.it/115x65" alt="">
                                </a>
                                <div class="media-body">
                                    <h6 class="media-heading"><a href="#">The Point - Destiny, Reviews and Aging Gamers</a></h6>
                                </div>
                            </div>
                        </li>
                        
                        <li>
                            <div class="media">
                                <a class="pull-left" href="#">
                                    <img class="media-object image" src="http://placehold.it/115x65" alt="">
                                </a>
                                <div class="media-body">
                                    <h6 class="media-heading"><a href="#">Reality Check - Best and Worst Hacking In Games</a></h6>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="media">
                                <a class="pull-left" href="#">
                                    <img class="media-object image" src="http://placehold.it/115x65" alt="">
                                </a>
                                <div class="media-body">
                                    <h6 class="media-heading"><a href="#">What Makes Dragon Ball: Xenoverse so Special - TGS 2014</a></h6>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="media">
                                <a class="pull-left" href="#">
                                    <img class="media-object image" src="http://placehold.it/115x65" alt="">
                                </a>
                                <div class="media-body">
                                    <h6 class="media-heading"><a href="#">Toxikk - Gameplay Reveal Trailer</a></h6>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="media">
                                <a class="pull-left" href="#">
                                    <img class="media-object image" src="http://placehold.it/115x65" alt="">
                                </a>
                                <div class="media-body">
                                    <h6 class="media-heading"><a href="#">Toxikk - Gameplay Reveal Trailer</a></h6>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- END .video-container -->

            <div id="comments" class="row">
				<div class="comments-left col-md-8">
					<h3 class="comments-header text-shadow">Comments</h3>
	                
	                <!-- .c-item -->
	                <div id="259353214" class="c-item c-depth-1 recommended">
					  	<div class="comment comment_inner">						    
						    <a href="#" class="collapse_toggle"></a>
						    <div class="by">						      
						        <a href="http://www.polygon.com/users/The_Hyphenator" class="profile_image">
						          <img src="http://cdn0.vox-cdn.com/profile_images/806917/etrigan_av_small.jpeg" alt="The_Hyphenator">
						        </a>
						    	<a href="http://www.polygon.com/users/The_Hyphenator" class="profile_name">The_Hyphenator</a>
						    </div>
						    <div class="cbody">
						      	<p>A sassy Latina? Boy, I’ve never heard that one before…</p>
								<p>Of course, this is a fighting game we’re talking about; racial stereotypes are par for the course, unfortunately.</p>
						    </div>
						    <p class="posted_on">
						        <small>Sept 20, 2014 |  2:02 PM</small> <small> <a href="#" class="reply_link"> <i class="fa fa-reply"></i> Reply</a></small>
						        <small class="pull-right">						            
									<a href="#" class="flag_link "><i class="fa fa-flag"></i> Flag</a>
						        </small>
						    </p>
						</div>
					</div>
					<!-- END .c-item -->

					<!-- .c-item -->
	                <div id="259353214" class="c-item c-depth-2">
					  	<div class="comment comment_inner">						    
						    <a href="#" class="collapse_toggle"></a>
						    <div class="by">						      
						        <a href="http://www.polygon.com/users/The_Hyphenator" class="profile_image">
						          <img src="http://cdn0.vox-cdn.com/profile_images/806917/etrigan_av_small.jpeg" alt="The_Hyphenator">
						        </a>
						    	<a href="http://www.polygon.com/users/The_Hyphenator" class="profile_name">The_Hyphenator</a>
						    </div>
						    <div class="cbody">
						      	<p>A sassy Latina? Boy, I’ve never heard that one before…</p>
								<p>Of course, this is a fighting game we’re talking about; racial stereotypes are par for the course, unfortunately.</p>
						    </div>
						    <p class="posted_on">
						        <small>Sept 20, 2014 |  2:02 PM</small>
						        <small><a href="#" class="reply_link"> <i class="fa fa-reply"></i> Reply</a></small>
						        <span class="cactions ">
							        <a href="#" class="rec_link recommended">
							        	Rec<span>ommend</span>
							            <span class="rec_count">(7)</span>
							        </a>						            
									<a href="#" class="flag_link ">Flag</a>
						        </span>
						    </p>
						</div>
					</div>
					<!-- END .c-item -->

					<!-- .c-item -->
	                <div id="259353214" class="c-item c-depth-3">
					  	<div class="comment comment_inner">						    
						    <a href="#" class="collapse_toggle"></a>
						    <div class="by">						      
						        <a href="http://www.polygon.com/users/The_Hyphenator" class="profile_image">
						          <img src="http://cdn0.vox-cdn.com/profile_images/806917/etrigan_av_small.jpeg" alt="The_Hyphenator">
						        </a>
						    	<a href="http://www.polygon.com/users/The_Hyphenator" class="profile_name">The_Hyphenator</a>
						    </div>
						    <div class="cbody">
						      	<p>A sassy Latina? Boy, I’ve never heard that one before…</p>
								<p>Of course, this is a fighting game we’re talking about; racial stereotypes are par for the course, unfortunately.</p>
						    </div>
						    <p class="posted_on">
						        <small>Sept 20, 2014 |  2:02 PM</small>
						        <small><a href="#" class="reply_link"><i class="fa fa-reply"></i> Reply</a></small>
						        <span class="cactions ">
							        <a href="#" class="rec_link recommended">
							        	Rec<span>ommend</span>
							            <span class="rec_count">(7)</span>
							        </a>						            
									<a href="#" class="flag_link ">Flag</a>
						        </span>
						    </p>
						</div>
					</div>
					<!-- END .c-item -->

					<!-- .c-item -->
	                <div id="259353214" class="c-item c-depth-2">
					  	<div class="comment comment_inner">						    
						    <a href="#" class="collapse_toggle"></a>
						    <div class="by">						      
						        <a href="http://www.polygon.com/users/The_Hyphenator" class="profile_image">
						          <img src="http://cdn0.vox-cdn.com/profile_images/806917/etrigan_av_small.jpeg" alt="The_Hyphenator">
						        </a>
						    	<a href="http://www.polygon.com/users/The_Hyphenator" class="profile_name">The_Hyphenator</a>
						    </div>
						    <div class="cbody">
						      	<p>A sassy Latina? Boy, I’ve never heard that one before…</p>
								<p>Of course, this is a fighting game we’re talking about; racial stereotypes are par for the course, unfortunately.</p>
						    </div>
						    <p class="posted_on">
						        <small>Sept 20, 2014 |  2:02 PM</small>
						        <small><a href="#" class="reply_link"><i class="fa fa-reply"></i> Reply</a></small>
						        <span class="cactions ">
							        <a href="#" class="rec_link recommended">
							        	Rec<span>ommend</span>
							            <span class="rec_count">(7)</span>
							        </a>						            
									<a href="#" class="flag_link ">Flag</a>
						        </span>
						    </p>
						</div>
					</div>
					<!-- END .c-item -->

					<!-- .c-item -->
	                <div id="259353214" class="c-item c-depth-1">
					  	<div class="comment comment_inner">						    
						    <a href="#" class="collapse_toggle"></a>
						    <div class="by">						      
						        <a href="http://www.polygon.com/users/The_Hyphenator" class="profile_image">
						          <img src="http://cdn0.vox-cdn.com/profile_images/806917/etrigan_av_small.jpeg" alt="The_Hyphenator">
						        </a>
						    	<a href="http://www.polygon.com/users/The_Hyphenator" class="profile_name">The_Hyphenator</a>
						    </div>
						    <div class="cbody">
						      	<p>A sassy Latina? Boy, I’ve never heard that one before…</p>
								<p>Of course, this is a fighting game we’re talking about; racial stereotypes are par for the course, unfortunately.</p>
						    </div>
						    <p class="posted_on">
						        <small>Sept 20, 2014 |  2:02 PM</small>
						        <small><a href="#" class="reply_link"><i class="fa fa-reply"></i> Reply</a></small>
						        <span class="cactions ">
							        <a href="#" class="rec_link recommended">
							        	Rec<span>ommend</span>
							            <span class="rec_count">(7)</span>
							        </a>						            
									<a href="#" class="flag_link ">Flag</a>
						        </span>
						    </p>
						</div>
					</div>
					<!-- END .c-item -->

					<!-- .c-item -->
	                <div id="259353214" class="c-item c-depth-1">
					  	<div class="comment comment_inner">						    
						    <a href="#" class="collapse_toggle"></a>
						    <div class="by">						      
						        <a href="http://www.polygon.com/users/The_Hyphenator" class="profile_image">
						          <img src="http://cdn0.vox-cdn.com/profile_images/806917/etrigan_av_small.jpeg" alt="The_Hyphenator">
						        </a>
						    	<a href="http://www.polygon.com/users/The_Hyphenator" class="profile_name">The_Hyphenator</a>
						    </div>
						    <div class="cbody">
						      	<p>A sassy Latina? Boy, I’ve never heard that one before…</p>
								<p>Of course, this is a fighting game we’re talking about; racial stereotypes are par for the course, unfortunately.</p>
						    </div>
						    <p class="posted_on">
						        <small>Sept 20, 2014 |  2:02 PM</small>
						        <small><a href="#" class="reply_link"><i class="fa fa-reply"></i> Reply</a></small>
						        <span class="cactions ">
							        <a href="#" class="rec_link recommended">
							        	Rec<span>ommend</span>
							            <span class="rec_count">(7)</span>
							        </a>						            
									<a href="#" class="flag_link ">Flag</a>
						        </span>
						    </p>
						</div>
					</div>
					<!-- END .c-item -->

	            </div>
	            <!-- END .comments-left -->

	            <div class="comments-right col-md-4">
	            	@include('ads.medium-rectangle')
	            </div>
	            <!-- END .comments-right -->
            </div>

        </div>
        <!-- END .container.well.br-none -->

	@stop