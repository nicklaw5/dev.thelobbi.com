@extends('layouts.default')
    @section('content')
        <div class="feature-container">
            <a href="#" class="feature-major" style="background: url({{ url('/assets/images/HK_at_rest-3.jpg') }}) no-repeat center center;background-size: cover;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;">
                <div class="feature-overlay">
                    <p class="feature-comments text-shadow"><strong>34 Comments</strong></p>
                    <div class="feature-major-play fa fa-play-circle-o"></div>
                    <div class="feature-major-meta">
                        <span><strong>Hollow Knight</strong></span>
                        <h3>Hollow Knight shows a strong opening week on Kickstarter</h3>    
                    </div>
                </div>
            </a>
            <a href="#" class="feature-minor minor-top" style="background: url('http://thelobbi.com/images/2014/10/BrokenAge_feature.jpg') no-repeat center center;background-size: cover;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;">
                <div class="feature-overlay">
                    <p class="feature-comments text-shadow"><strong>16 Comments</strong></p>
                    <div class="feature-minor-play fa fa-play-circle-o"></div>
                    <div class="feature-minor-meta">
                        <span ><strong>Broken Age</strong></span>
                        <h4>Double Fine nears deadline for Broken Age’s second act</h4>    
                    </div>
                </div>
            </a> 
            <a href="#" class="feature-minor minor-bottom" style="background: url('http://images.gamenguide.com/data/images/full/12347/batman-arkham-knight.png?w=720') no-repeat center center;background-size: cover;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;">
                <div class="feature-overlay">
                    <p class="feature-comments text-shadow"><strong>11 Comments</strong></p>
                    <div class="feature-minor-play fa fa-play-circle-o"></div>
                    <div class="feature-minor-meta">
                        <span><strong>Batman: Arkham Knight</strong></span>
                        <h4>10 Mind-Blowing Theories About Batman: Arkham Knight</h4>    
                    </div>
                </div>
            </a>
        </div>

        @include('ads.leaderboard')

        <div id="content-wrapper" class="container">

            <!-- HERO UNIT -->
            <div class="hero-unit row">

                <div class="col-lg-2 pull-right p-none">
                    <div class="ad-skyscraper" style="text-align: center; padding:270px 10px 10px 10px">Skyscraper Ad</div>
                </div>

                <div class="hero-unit-items col-md-10 col-sm-12">
                    <ul class="media-list">                    
                        <li class="media">
                            <div class="pull-left">
                                <video style="border:3px solid #080808; background: url(/assets/images/bman420x236.jpg) no-repeat" width="320" height="183" loop preload="none">
                                    <source src="http://static.thelobbi.com/videos/Produce 0-1.mp4" type="video/mp4">   
                                </video>
                                
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading"><a class="text-link" href="#">Bravely Second is More of The Bravely Default We Love - TGS 2014</a></h4>
                                <p><small>Posted by <a href="#">Nicholas Law</a> 3 hours ago.</small></p>
                                <p>Mary talks to Peter about the sequel to the popular Bravely Default. Even with a new town, characters and story, its very similar to the original game we enjoyed.</p>
                            </div>
                        </li>
                    </ul>

                    <ul class="media-list">
                        <li class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object img-b img-responsive" src="/assets/images/bman420x236.jpg" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a class="text-link" href="#">Bravely Second is More of The Bravely Default We Love - TGS 2014</a></h4>
                                <p><small>Posted by <a href="#">Nicholas Law</a> 3 hours ago.</small></p>
                                <p>Mary talks to Peter about the sequel to the popular Bravely Default. Even with a new town, characters and story, its very similar to the original game we enjoyed.</p>
                            </div>
                        </li>
                    </ul>

                    <ul class="media-list">
                        <li class="media">
                            <a href="#" >
                                <div class="pull-left img-overlay-video" style="width: 320px;
                                                                        height: 182px;
                                                                        background: url('/assets/images/Assassins-Creed-Unity-assassination.jpg') no-repeat center center;
                                                                        background-size: cover;
                                                                        border: 3px solid #080808;
                                                                        margin-right: 10px">
                                    <i class="fa fa-play-circle-o"></i>                                                                        
                                </div>
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a class="text-link" href="#">Bravely Second is More of The Bravely Default We Love - TGS 2014</a></h4>
                                <p><small>Posted by <a href="#">Nicholas Law</a> 3 hours ago.</small></p>
                                <p>Mary talks to Peter about the sequel to the popular Bravely Default. Even with a new town, characters and story, its very similar to the original game we enjoyed.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- END .hero-unit -->

            <!-- SIX ITEMS -->
            <div class="six-items">
                <ul class="col-md-4 col-sm-12 six-column six-column-first">
                    <li>
                        <a href="#" >
                            <div class="img-overlay-video" style="width: 370px; height: 211px;background: url('/assets/images/bman420x236.jpg') no-repeat; border: 3px solid #080808">
                                
                            </div>
                        </a>
                        <h4><a class="text-link" href="#">Bravely Second is More of The Bravely Default We Love - TGS 2014</a></h4>
                        <p><small>Posted by <a href="#">Nicholas Law</a> 3 hours ago.</small></p>
                        <p>Mary talks to Peter about the sequel to the popular Bravely Default. Even with a new town, characters and story, its very similar to the original game we enjoyed.</p>
                    </li>
                    <li>
                        <a href="#" >
                            <div class="img-overlay-video" style="width: 370px; height: 211px;background: url('/assets/images/bman420x236.jpg') no-repeat; border: 3px solid #080808">
                                <i class="fa fa-play-circle-o"></i>
                            </div>
                        </a>
                        <h4><a class="text-link" href="#">Bravely Second is More of The Bravely Default We Love - TGS 2014</a></h4>
                        <p><small>Posted by <a href="#">Nicholas Law</a> 3 hours ago.</small></p>
                        <p>Mary talks to Peter about the sequel to the popular Bravely Default. Even with a new town, characters and story, its very similar to the original game we enjoyed.</p>
                    </li>
                </ul>
                <ul class="col-md-4 col-sm-6 six-column six-column-middle">
                    <li>                        
                        <a href="#" >
                            <div class="img-overlay-video" style="width: 370px; height: 211px;background: url('/assets/images/bman420x236.jpg') no-repeat; border: 3px solid #080808">
                                <i class="fa fa-play-circle-o"></i>
                            </div>
                        </a>
                        
                        <h4><a class="text-link" href="#">Bravely Second is More of The Bravely Default We Love - TGS 2014</a></h4>
                        <p><small>Posted by <a href="#">Nicholas Law</a> 3 hours ago.</small></p>
                        <p>Mary talks to Peter about the sequel to the popular Bravely Default. Even with a new town, characters and story, its very similar to the original game we enjoyed.</p>
                    </li>
                    <li>                        
                        <a href="#" >
                            <div class="img-overlay-video" style="width: 370px; height: 211px;background: url('/assets/images/bman420x236.jpg') no-repeat; border: 3px solid #080808">
                                
                            </div>
                        </a>
                        <h4><a class="text-link" href="#">Bravely Second is More of The Bravely Default We Love - TGS 2014</a></h4>
                        <p><small>Posted by <a href="#">Nicholas Law</a> 3 hours ago.</small></p>
                        <p>Mary talks to Peter about the sequel to the popular Bravely Default. Even with a new town, characters and story, its very similar to the original game we enjoyed.</p>
                    </li>
                </ul>
                <ul class="col-md-4 col-sm-6 six-column six-column-last">
                    <li>                        
                        <a href="#" >
                            <div class="img-overlay-video" style="width: 370px;
                                                                    height: 211px;
                                                                    background: url('/assets/images/Flagship_feature-resized.jpg') no-repeat center center;
                                                                    background-size: cover;
                                                                    border: 3px solid #080808">
                            </div>
                        </a>
                        <h4><a class="text-link" href="#">Bravely Second is More of The Bravely Default We Love - TGS 2014</a></h4>
                        <p><small>Posted by <a href="#">Nicholas Law</a> 3 hours ago.</small></p>
                        <p>Mary talks to Peter about the sequel to the popular Bravely Default. Even with a new town, characters and story, its very similar to the original game we enjoyed.</p>
                    </li>
                    <li>                        
                        <a href="#" >
                            <div class="img-overlay-video" style="width: 370px; height: 211px;background: url('/assets/images/bman420x236.jpg') no-repeat; border: 3px solid #080808">
                                <i class="fa fa-play-circle-o"></i>
                            </div>
                        </a>
                        <h4><a class="text-link" href="#">Bravely Second is More of The Bravely Default We Love - TGS 2014</a></h4>
                        <p><small>Posted by <a href="#">Nicholas Law</a> 3 hours ago.</small></p>
                        <p>Mary talks to Peter about the sequel to the popular Bravely Default. Even with a new town, characters and story, its very similar to the original game we enjoyed.</p>
                    </li>
                </ul>
            </div>
            <!-- .six-items -->

            <!-- TOP GAMES UNIT -->
            <div class="top-games">
                
                <div style="margin-bottom: 0;padding-left: 10px; float: left; border-width: 3px; background: #222222; border-color: #060606" class="col-md-4 well br-none">
                    <div style="">
                        
                        <h4 style="margin-top: 0; text-align: center;" class="text-shadow">Top Games</h4>

                        <ul class="top-games-list">
                            
                            <li>
                                <div class="media">
                                    <a class="pull-left" href="#">
                                        <img class="media-object" style="border: 2px solid #060606" src="/assets/images/box-art/watch-dogs-box-art.jpg" alt="">
                                    </a>
                                    <div class="media-body">
                                        <h6 style="margin-top: 5px; font-weight: bold" class="media-heading"><a href="#">Watch Dogs</a></h6>
                                        <table>
                                            <tr class="top-games-list-tr">
                                                <td width="100px">Platforms:</td>
                                                <td>Win, 360, PS3, Wii U, PS4, Xbox One</td>
                                            </tr>
                                            <tr>
                                                <td>Developer:</td>
                                                <td>Ubisoft Montreal</td>
                                            </tr>
                                            <tr>
                                                <td>Publisher:</td>
                                                <td>Ubisoft</td>
                                            </tr>
                                            <tr>
                                                <td>Release Date:</td>
                                                <td>2014-05-27</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="media">
                                    <a class="pull-left" href="#">
                                        <img class="media-object" style="border: 2px solid #060606" src="/assets/images/box-art/watch-dogs-box-art.jpg" alt="">
                                    </a>
                                    <div class="media-body">
                                        <h6 style="margin-top: 5px; font-weight: bold" class="media-heading"><a href="#">Watch Dogs</a></h6>
                                        <table>
                                            <tr class="top-games-list-tr">
                                                <td width="100px">Platforms:</td>
                                                <td>Win, 360, PS3, Wii U, PS4, Xbox One</td>
                                            </tr>
                                            <tr>
                                                <td width="100px">Developer:</td>
                                                <td>Ubisoft Montreal</td>
                                            </tr>
                                            <tr>
                                                <td width="100px">Publisher:</td>
                                                <td>Ubisoft</td>
                                            </tr>
                                            <tr>
                                                <td width="100px">Release Date:</td>
                                                <td>2014-05-27</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="media">
                                    <a class="pull-left" href="#">
                                        <img class="media-object" style="border: 2px solid #060606" src="/assets/images/box-art/watch-dogs-box-art.jpg" alt="">
                                    </a>
                                    <div class="media-body">
                                        <h6 style="margin-top: 5px; font-weight: bold" class="media-heading"><a href="#">Watch Dogs</a></h6>
                                        <table>
                                            <tr class="top-games-list-tr">
                                                <td width="100px">Platforms:</td>
                                                <td>Win, 360, PS3, Wii U, PS4, Xbox One</td>
                                            </tr>
                                            <tr>
                                                <td width="100px">Developer:</td>
                                                <td>Ubisoft Montreal</td>
                                            </tr>
                                            <tr>
                                                <td width="100px">Publisher:</td>
                                                <td>Ubisoft</td>
                                            </tr>
                                            <tr>
                                                <td width="100px">Release Date:</td>
                                                <td>2014-05-27</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="media">
                                    <a class="pull-left" href="#">
                                        <img class="media-object" style="border: 2px solid #060606" src="/assets/images/box-art/watch-dogs-box-art.jpg" alt="">
                                    </a>
                                    <div class="media-body">
                                        <h6 style="margin-top: 5px; font-weight: bold" class="media-heading"><a href="#">Watch Dogs</a></h6>
                                        <table>
                                            <tr class="top-games-list-tr">
                                                <td width="100px">Platforms:</td>
                                                <td>Win, 360, PS3, Wii U, PS4, Xbox One</td>
                                            </tr>
                                            <tr>
                                                <td width="100px">Developer:</td>
                                                <td>Ubisoft Montreal</td>
                                            </tr>
                                            <tr>
                                                <td width="100px">Publisher:</td>
                                                <td>Ubisoft</td>
                                            </tr>
                                            <tr>
                                                <td width="100px">Release Date:</td>
                                                <td>2014-05-27</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <h5 style="margin: 25px 0 0 0" class="pull-right"><a href="#">More Games <i class="fa fa-arrow-circle-right"></i></a></h5>

                    </div>
                </div>
                
                <div class="media col-md-8 test">
                    <a class="pull-left" href="#">
                        <img class="media-img img-b img-responsive" src="/assets/images/bman420x236.jpg" alt="">
                    </a>
                    <div class="media-body">
                        <h4><a class="text-link" href="#">Bravely Second is More of The Bravely Default We Love - TGS 2014</a></h4>
                        <p><small>Posted by <a href="#">Nicholas Law</a> 3 hours ago.</small></p>
                        <p>Mary talks to Peter about the sequel to the popular Bravely Default. Even with a new town, characters and story, its very similar to the original game we enjoyed.</p>
                    </div>
                </div>

                <div class="media col-md-8 test">
                    <a class="pull-left" href="#">
                        <img class="media-img img-b img-responsive" src="/assets/images/bman420x236.jpg" alt="">
                    </a>
                    <div class="media-body">
                        <h4><a class="text-link" href="#">Bravely Second is More of The Bravely Default We Love - TGS 2014</a></h4>
                        <p><small>Posted by <a href="#">Nicholas Law</a> 3 hours ago.</small></p>
                        <p>Mary talks to Peter about the sequel to the popular Bravely Default. Even with a new town, characters and story, its very similar to the original game we enjoyed.</p>
                    </div>
                </div>

                <div class="media col-md-8 test">
                    <a class="pull-left" href="#">
                        <img class="media-img img-b img-responsive" src="/assets/images/bman420x236.jpg" alt="">
                    </a>
                    <div class="media-body">
                        <h4><a class="text-link" href="#">Bravely Second is More of The Bravely Default We Love - TGS 2014</a></h4>
                        <p><small>Posted by <a href="#">Nicholas Law</a> 3 hours ago.</small></p>
                        <p>Mary talks to Peter about the sequel to the popular Bravely Default. Even with a new town, characters and story, its very similar to the original game we enjoyed.</p>
                    </div>
                </div>


                <!--<div style="padding: 0 0 15px 10px; float:left; height: 300px; overflow:hidden" class="col-md-8">
                    <a href="#"><img class="img-b img-responsive" src="/assets/images/bman420x236.jpg" alt=""></a>
                    <div style="margin-left: 440px; height: 236px; overflow:hidden">
                        <h4 style="margin-top: 0; padding-top: 10px; font-weight: 600; border-top: 2px solid #5A5A5A">The making of Defense Grid 2: The end</h4>
                        <small>By <a href="#">Nicholas Law</a> on Sep 17, 2014</small>
                        <p>Bandai Namco's Dragon Ball Xenoverse will give fans of Akira Torayama's manga and anime series the chance to play with their own original, customizable character and "dive into Dragon Ball history" with that day. Bandai Namco's Dragon Ball Xenoverse will give fans of Akira Torayama's manga and anime series the chance to play with their own original, customizable character and "dive into Dragon Ball history" with that Bandai Namco's Dragon Ball.</p>

                    </div>
                </div>

                <div style="padding: 0 0 15px 10px; float:left; height: 300px; overflow:hidden" class="col-md-8">
                    <a href="#"><img class="img-b img-responsive" src="/assets/images/bman420x236.jpg" alt=""></a>
                    <div style="margin-left: 440px; height: 236px; overflow:hidden">
                        <h4 style="margin-top: 0; padding-top: 10px; font-weight: 600; border-top: 2px solid #5A5A5A">The making of Defense Grid 2: The end</h4>
                        <small>By <a href="#">Nicholas Law</a> on Sep 17, 2014</small>
                        <p>Bandai Namco's Dragon Ball Xenoverse will give fans of Akira Torayama's manga and anime series the chance to play with their own original, customizable character and "dive into Dragon Ball history" with that day. Bandai Namco's Dragon Ball Xenoverse will give fans of Akira Torayama's manga and anime series the chance to play with their own original, customizable character and "dive into Dragon Ball history" with that Bandai Namco's Dragon Ball.</p>

                    </div>
                </div>

                <div style="padding: 0 0 15px 10px; float:left; height: 300px; overflow:hidden" class="col-md-8">
                    <a href="#"><img class="img-b img-responsive" src="/assets/images/bman420x236.jpg" alt=""></a>
                    <div style="margin-left: 440px; height: 236px; overflow:hidden">
                        <h4 style="margin-top: 0; padding-top: 10px; font-weight: 600; border-top: 2px solid #5A5A5A">The making of Defense Grid 2: The end</h4>
                        <small>By <a href="#">Nicholas Law</a> on Sep 17, 2014</small>
                        <p>Bandai Namco's Dragon Ball Xenoverse will give fans of Akira Torayama's manga and anime series the chance to play with their own original, customizable character and "dive into Dragon Ball history" with that day. Bandai Namco's Dragon Ball Xenoverse will give fans of Akira Torayama's manga and anime series the chance to play with their own original, customizable character and "dive into Dragon Ball history" with that Bandai Namco's Dragon Ball.</p>

                    </div>
                </div>-->

            </div>
            <!-- END TOP GAMES UNIT -->

            <!-- ITEMS UNIT -->
            <div style="clear: both;" class="items">
                <div class="col-md-4 col-sm-6 item">
                    <img width="100%" class="image" src="http://placehold.it/384x216">
                    <h4 style="font-weight: 600">This is the title</h4>
                    <small>By <a href="#">Nicholas Law</a> on Sep 17, 2014</small>
                        <p>Bandai Namco's Dragon Ball Xenoverse will give fans of Akira Torayama's manga and anime series the chance to play with their own original, customizable character and "dive into Dragon Ball history" with that day. Bandai Namco's Dragon Ball Xenoverse will.</p>
                </div>
                <div class="col-md-4 col-sm-6 item">
                    <img width="100%" class="image" src="http://placehold.it/384x216">
                    <h4 style="font-weight: 600">This is the title</h4>
                    <small>By <a href="#">Nicholas Law</a> on Sep 17, 2014</small>
                        <p>Bandai Namco's Dragon Ball Xenoverse will give fans of Akira Torayama's manga and anime series the chance to play with their own original, customizable character and "dive into Dragon Ball history" with that day. Bandai Namco's Dragon Ball Xenoverse will.</p>
                </div>
                <div class="col-md-4 col-sm-6 item">
                    <img width="100%" class="image" src="http://placehold.it/384x216">
                    <h4 style="font-weight: 600">This is the title</h4>
                    <small>By <a href="#">Nicholas Law</a> on Sep 17, 2014</small>
                        <p>Bandai Namco's Dragon Ball Xenoverse will give fans of Akira Torayama's manga and anime series the chance to play with their own original, customizable character and "dive into Dragon Ball history" with that day. Bandai Namco's Dragon Ball Xenoverse will.</p>
                </div>
            </div>
            <!-- END ITEMS UNIT -->
    	</div>

    <script src="{{ URL::asset('assets/js/video-on-demand.js') }}"></script>
    @stop

