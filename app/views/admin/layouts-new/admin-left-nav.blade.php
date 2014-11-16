<!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->			
		<!-- Add "fixed" class to make the sidebar fixed always to the browser viewport. -->
		<!-- Adding class "toggle-others" will keep only one menu item open at a time. -->
		<!-- Adding class "collapsed" collapse sidebar root elements and show only icons. -->
		<div class="sidebar-menu toggle-others fixed">
			
			<div class="sidebar-menu-inner">	
				
				<header class="logo-env">
					
					<!-- logo -->
					<div class="logo">
						<a href="{{ url('admin') }}" class="logo-expanded">
							<img src="{{ URL::asset('assets/images/logos/thelobbi-logo-181x30.png') }}" width="80" alt="" />
						</a>
						
						<a href="{{ url('admin') }}" class="logo-collapsed">
							<img src="{{ URL::asset('assets/images/logos/logo-transparent-40.png') }}" width="40" alt="" />
						</a>
					</div>
					
					<!-- This will toggle the mobile menu and will be visible only on mobile devices -->
					<div class="mobile-menu-toggle visible-xs">
						<a href="#" data-toggle="user-info-menu">
							<i class="fa-bell-o"></i>
							<span class="badge badge-success">7</span>
						</a>
						
						<a href="#" data-toggle="mobile-menu">
							<i class="fa-bars"></i>
						</a>
					</div>
					
					<!-- This will open the popup with user profile settings, you can use for any purpose, just be creative -->
					<div class="settings-icon">
						<a href="#" data-toggle="settings-pane" data-animate="true">
							<i class="linecons-cog"></i>
						</a>
					</div>
					
								
				</header>
						
				
						
				<ul id="main-menu" class="main-menu">
					<!-- add class "multiple-expanded" to allow multiple submenus to open -->
					<!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
					<li class="active">
						<a href="{{ url('admin') }}">
							<i class="fa-home"></i>
							<span class="title">Dashboard</span>
						</a>
					</li>
					<li class="">
						<a href="{{ url('admin/statistics') }}">
							<i class="fa-pie-chart"></i>
							<span class="title">Site Statistics</span>
						</a>
					</li>

					<br>

					<li>
						<a href="{{ url('admin/messages') }}">
							<i class="linecons-mail"></i>
							<span class="title">Messages</span>
							<span class="label label-success pull-right">5</span>
						</a>
						<ul>
							<li>
								<a href="{{ url('admin/messages/inbox') }}">
									<span class="title">Inbox</span>
								</a>
							</li>
							<li>
								<a href="{{ url('admin/messages/create') }}">
									<span class="title">New Message</span>
								</a>
							</li>							
						</ul>
					</li>
					<li>
						<a href="{{ url('admin/notifications') }}">
							<i class="fa-bell"></i>
							<span class="title">Notifications</span>
							<span class="label label-success pull-right">1</span>
						</a>
					</li>
					
					<br>
					
					<li>
						<a href="{{ url('admin/articles') }}">
							<i class="fa-newspaper-o"></i>
							<span class="title">Articles</span>
						</a>
						<ul>
							<li>
								<a href="{{ url('admin/articles/create') }}">
									<span class="title">New Article</span>
								</a>
							</li>
							<li>
								<a href="{{ url('admin/articles') }}">
									<span class="title">All Articles</span>
								</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="{{ url('admin/videos') }}">
							<i class="fa-youtube-play"></i>
							<span class="title">Videos</span>
						</a>
						<ul>
							<li>
								<a href="{{ url('admin/videos/create') }}">
									<span class="title">New Video</span>
								</a>
							</li>
							<li>
								<a href="{{ url('admin/videos') }}">
									<span class="title">All Videos</span>
								</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="{{ url('admin/comments') }}">
							<i class="fa-comments"></i>
							<span class="title">Comments</span>
						</a>
					</li>

					<br>

					<li>
						<a href="{{ url('admin/games') }}">
							<i class="fa-gamepad"></i>
							<span class="title">Games</span>
						</a>
						<ul>
							<li>
								<a href="{{ url('admin/games/create') }}">
									<span class="title">New Game</span>
								</a>
							</li>
							<li>
								<a href="{{ url('admin/games') }}">
									<span class="title">All Games</span>
								</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="{{ url('admin/companies') }}">
							<i class="fa-suitcase"></i>
							<span class="title">Companies</span>
						</a>
						<ul>
							<li>
								<a href="{{ url('admin/companies/create') }}">
									<span class="title">New Copmany</span>
								</a>
							</li>
							<li>
								<a href="{{ url('admin/companies') }}">
									<span class="title">All Companies</span>
								</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="{{ url('admin/platforms') }}">
							<i class="fa-cubes"></i>
							<span class="title">Platfroms</span>
						</a>
						<ul>
							<li>
								<a href="{{ url('admin/platforms/create') }}">
									<span class="title">New Platform</span>
								</a>
							</li>
							<li>
								<a href="{{ url('admin/platforms') }}">
									<span class="title">All Platforms</span>
								</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="{{ url('admin/genres') }}">
							<i class="fa-database"></i>
							<span class="title">Genres</span>
						</a>
						<ul>
							<li>
								<a href="{{ url('admin/genres/create') }}">
									<span class="title">New Genre</span>
								</a>
							</li>
							<li>
								<a href="{{ url('admin/genres') }}">
									<span class="title">All Genres</span>
								</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="{{ url('admin/events') }}">
							<i class="fa-ticket"></i>
							<span class="title">Events</span>
						</a>
						<ul>
							<li>
								<a href="{{ url('admin/events/create') }}">
									<span class="title">New Event</span>
								</a>
							</li>
							<li>
								<a href="{{ url('admin/events') }}">
									<span class="title">All Events</span>
								</a>
							</li>
							<li>
								<a href="{{ url('admin/calendar') }}">
									<span class="title">Calendar</span>
								</a>
							</li>
						</ul>
					</li>

					<br>
					<li>
						<a href="{{ url('admin/staff') }}">
							<i class="fa-user"></i>
							<span class="title">Staff</span>
						</a>
						<ul>
							<li>
								<a href="{{ url('admin/staff/create') }}">
									<span class="title">New Staff Member</span>
								</a>
							</li>
							<li>
								<a href="{{ url('admin/staff') }}">
									<span class="title">All Staff Members</span>
								</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="{{ url('admin/users') }}">
							<i class="fa-users"></i>
							<span class="title">Users</span>
						</a>
						<ul>
							<li>
								<a href="{{ url('admin/users/create') }}">
									<span class="title">New User</span>
								</a>
							</li>
							<li>
								<a href="{{ url('admin/users') }}">
									<span class="title">All Users</span>
								</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="{{ url('admin/contacts') }}">
							<i class="fa-binoculars"></i>
							<span class="title">Contacts</span>
						</a>
					</li>

					<br>

					<li>
						<a href="{{ url('admin/forums') }}">
							<i class="linecons-megaphone"></i>
							<span class="title">Forums</span>
						</a>
						<ul>
							<li>
								<a href="{{ url('admin/forums/create') }}">
									<span class="title">New Forum</span>
								</a>
							</li>
							<li>
								<a href="{{ url('admin/forums/createThread') }}">
									<span class="title">New Thread</span>
								</a>
							</li>
							<li>
								<a href="{{ url('admin/forums') }}">
									<span class="title">All Forums</span>
								</a>
							</li>
							<li>
								<a href="{{ url('admin/popularThread') }}">
									<span class="title">Popular Threads</span>
								</a>
							</li>
						</ul>
					</li>

					<br>

					<li>
						<a href="{{ url('admin') }}">
							<i class="fa-flag-o"></i>
							<span class="title">Advertising</span>
						</a>
					</li>
					<li>
						<a href="{{ url('admin') }}">
							<i class="fa-cogs"></i>
							<span class="title">Settings</span>
						</a>
					</li>

				</ul>
						
			</div>
			
		</div>
		
		<div class="main-content">
					
			<nav class="navbar user-info-navbar" role="navigation"><!-- User Info, Notifications and Menu Bar -->
				
				<!-- Left links for user info navbar -->
				<ul class="user-info-menu left-links list-inline list-unstyled">
					
					<li class="hidden-sm hidden-xs">
						<a href="#" data-toggle="sidebar">
							<i class="fa-bars"></i>
						</a>
					</li>
					
					<!-- MESSAGES -->
					<li class="dropdown hover-line">
						<a href="#" title="Messages" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa-envelope-o"></i>
							<span class="badge badge-green">15</span>
						</a>
						

						<ul class="dropdown-menu messages">
							<li>
									
								<ul class="dropdown-menu-list list-unstyled ps-scrollbar"> 
								
									<li class="active"><!-- "active" class means message is unread -->
										<a href="#">
											<span class="line">
												<strong>Luc Chartier</strong>
												<span class="light small">- yesterday</span>
											</span>
											
											<span class="line desc small">
												This ain’t our first item, it is the best of the rest.
											</span>
										</a>
									</li>
									
									<li class="active">
										<a href="#">
											<span class="line">
												<strong>Salma Nyberg</strong>
												<span class="light small">- 2 days ago</span>
											</span>
											
											<span class="line desc small">
												Oh he decisively impression attachment friendship so if everything. 
											</span>
										</a>
									</li>
									
									<li>
										<a href="#">
											<span class="line">
												Hayden Cartwright
												<span class="light small">- a week ago</span>
											</span>
											
											<span class="line desc small">
												Whose her enjoy chief new young. Felicity if ye required likewise so doubtful.
											</span>
										</a>
									</li>
									
									<li>
										<a href="#">
											<span class="line">
												Sandra Eberhardt
												<span class="light small">- 16 days ago</span>
											</span>
											
											<span class="line desc small">
												On so attention necessary at by provision otherwise existence direction.
											</span>
										</a>
									</li>
									
									<!-- Repeated -->
									
									<li class="active"><!-- "active" class means message is unread -->
										<a href="#">
											<span class="line">
												<strong>Luc Chartier</strong>
												<span class="light small">- yesterday</span>
											</span>
											
											<span class="line desc small">
												This ain’t our first item, it is the best of the rest.
											</span>
										</a>
									</li>
									
									<li class="active">
										<a href="#">
											<span class="line">
												<strong>Salma Nyberg</strong>
												<span class="light small">- 2 days ago</span>
											</span>
											
											<span class="line desc small">
												Oh he decisively impression attachment friendship so if everything. 
											</span>
										</a>
									</li>
									
									<li>
										<a href="#">
											<span class="line">
												Hayden Cartwright
												<span class="light small">- a week ago</span>
											</span>
											
											<span class="line desc small">
												Whose her enjoy chief new young. Felicity if ye required likewise so doubtful.
											</span>
										</a>
									</li>
									
									<li>
										<a href="#">
											<span class="line">
												Sandra Eberhardt
												<span class="light small">- 16 days ago</span>
											</span>
											
											<span class="line desc small">
												On so attention necessary at by provision otherwise existence direction.
											</span>
										</a>
									</li>
									
								</ul>
								
							</li>
							
							<li class="external">
								<a href="blank-sidebar.html">
									<span>All Messages</span>
									<i class="fa-link-ext"></i>
								</a>
							</li> 
						</ul>
					</li>
					
					<!-- NOTIFICATIONS -->
					<li class="dropdown hover-line">
						<a href="#" title="Notifications" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa-bell-o"></i>
							<span class="badge badge-purple">7</span>
						</a>
							
						<ul class="dropdown-menu notifications">
							<li class="top">
								<p class="small">
									<a href="#" class="pull-right">Mark all Read</a>
									You have <strong>3</strong> new notifications.
								</p>
							</li>
							
							<li>
								<ul class="dropdown-menu-list list-unstyled ps-scrollbar">
									<li class="active notification-success">
										<a href="#">
											<i class="fa-user"></i>
											
											<span class="line">
												<strong>New user registered</strong>
											</span>
											
											<span class="line small time">
												30 seconds ago
											</span>
										</a>
									</li>
									
									<li class="active notification-secondary">
										<a href="#">
											<i class="fa-lock"></i>
											
											<span class="line">
												<strong>Privacy settings have been changed</strong>
											</span>
											
											<span class="line small time">
												3 hours ago
											</span>
										</a>
									</li>
									
									<li class="notification-primary">
										<a href="#">
											<i class="fa-thumbs-up"></i>
											
											<span class="line">
												<strong>Someone special liked this</strong>
											</span>
											
											<span class="line small time">
												2 minutes ago
											</span>
										</a>
									</li>
									
									<li class="notification-danger">
										<a href="#">
											<i class="fa-calendar"></i>
											
											<span class="line">
												John cancelled the event
											</span>
											
											<span class="line small time">
												9 hours ago
											</span>
										</a>
									</li>
									
									<li class="notification-info">
										<a href="#">
											<i class="fa-database"></i>
											
											<span class="line">
												The server is status is stable
											</span>
											
											<span class="line small time">
												yesterday at 10:30am
											</span>
										</a>
									</li>
									
									<li class="notification-warning">
										<a href="#">
											<i class="fa-envelope-o"></i>
											
											<span class="line">
												New comments waiting approval
											</span>
											
											<span class="line small time">
												last week
											</span>
										</a>
									</li>
								</ul>
							</li>
							
							<li class="external">
								<a href="#">
									<span>View all notifications</span>
									<i class="fa-link-ext"></i>
								</a>
							</li>

						</ul>
					</li>

					<li class="hover-line">
						<a title="Calendar" href="{{ url('admin/calendar') }}">
							<i class="linecons-calendar"></i>
							<span class="badge badge-red">3</span>
						</a>
					</li>
					
				</ul>
				
				
				<!-- Right links for user info navbar -->
				<ul class="user-info-menu right-links list-inline list-unstyled">
					
					<li class="search-form"><!-- You can add "always-visible" to show make the search input visible -->
						
						<form name="userinfo_search_form" method="get" action="extra-search.html">
							<input type="text" name="s" class="form-control search-field" placeholder="Type to search..." />
							
							<button type="submit" class="btn btn-link">
								<i class="linecons-search"></i>
							</button>
						</form>
						
					</li>
					
					<li class="dropdown user-profile">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img src="{{ URL::asset('assets/images/user-4.png') }}" alt="user-image" class="img-circle img-inline userpic-32" width="28" />
							<span>
								{{ Auth::user()->first_name . " " . Auth::user()->last_name }}
								<i class="fa-angle-down"></i>
							</span>
						</a>
						
						<ul class="dropdown-menu user-profile-menu list-unstyled">
							<li>
								<a href="#edit-profile">
									<i class="fa-edit"></i>
									New Post
								</a>
							</li>
							<li>
								<a href="#settings">
									<i class="fa-wrench"></i>
									Settings
								</a>
							</li>
							<li>
								<a href="#profile">
									<i class="fa-user"></i>
									Profile
								</a>
							</li>
							<li>
								<a href="#help">
									<i class="fa-info"></i>
									Help
								</a>
							</li>
							<li class="last">
								<a href="signout">
									<i class="fa-lock"></i>
									Logout
								</a>
							</li>
						</ul>
					</li>
					
					<li>
						<a href="#" data-toggle="chat">
							<i class="fa-comments-o"></i>
						</a>
					</li>
					
				</ul>
				
			</nav>
			
			@include('admin.alerts.admin-alerts')
			