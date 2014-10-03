<header class="navbar navbar-fixed-top"><!-- set fixed position by adding class "navbar-fixed-top" -->
		
		<div class="navbar-inner">
		
			<!-- logo -->
			<div class="navbar-brand">
				<a href="/admin">
					<img src="{{ URL::asset('assets/images/logos/thelobbi-logo-181x30.png') }}" alt="">
				</a>
			</div>
			
			
			<!-- main menu -->
						
			<ul class="navbar-nav">
				<li>
					<a href="layout-api.html">
						<i class="entypo-newspaper"></i>
						<span>New News Article</span>
					</a>
				</li>
				<li>
					<a href="ui-panels.html">
						<i class="entypo-video"></i>
						<span>New Video</span>
					</a>
				</li>
				<li>
					<a href="forms-main.html">
						<i class="entypo-doc-text"></i>
						<span>Forms</span>
					</a>
				</li>
				<!-- Search Bar -->
				<li id="search" class="root-level search-input-collapsed">
					<!-- add class "search-input-collapsed" to auto collapse search input -->
					<form method="get" action="">
						<input type="text" name="q" class="search-input" placeholder="Search something...">
						<button type="submit">
							<i class="entypo-search"></i>
						</button>
					</form>
				</li>
			</ul>
						
			
			<!-- notifications and other links -->
			<ul class="nav navbar-right pull-right">
				
				<!-- dropdowns -->
				<li class="dropdown">
					
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<i class="entypo-list"></i>
						<span class="badge badge-danger">6</span>
					</a>
					
					<!-- dropdown menu (tasks) -->
					<ul class="dropdown-menu">
						<li class="top">
	<p>You have 6 pending tasks</p>
</li>

<li>
	<ul class="dropdown-menu-list scroller" tabindex="5001" style="overflow: hidden; outline: none;">
		<li>
			<a href="#">
				<span class="task">
					<span class="desc">Procurement</span>
					<span class="percent">27%</span>
				</span>
			
				<span class="progress">
					<span style="width: 27%;" class="progress-bar progress-bar-success">
						<span class="sr-only">27% Complete</span>
					</span>
				</span>
			</a>
		</li>
		<li>
			<a href="#">
				<span class="task">
					<span class="desc">App Development</span>
					<span class="percent">83%</span>
				</span>
				
				<span class="progress progress-striped">
					<span style="width: 83%;" class="progress-bar progress-bar-danger">
						<span class="sr-only">83% Complete</span>
					</span>
				</span>
			</a>
		</li>
		<li>
			<a href="#">
				<span class="task">
					<span class="desc">HTML Slicing</span>
					<span class="percent">91%</span>
				</span>
				
				<span class="progress">
					<span style="width: 91%;" class="progress-bar progress-bar-success">
						<span class="sr-only">91% Complete</span>
					</span>
				</span>
			</a>
		</li>
		<li>
			<a href="#">
				<span class="task">
					<span class="desc">Database Repair</span>
					<span class="percent">12%</span>
				</span>
				
				<span class="progress progress-striped">
					<span style="width: 12%;" class="progress-bar progress-bar-warning">
						<span class="sr-only">12% Complete</span>
					</span>
				</span>
			</a>
		</li>
		<li>
			<a href="#">
				<span class="task">
					<span class="desc">Backup Create Progress</span>
					<span class="percent">54%</span>
				</span>
				
				<span class="progress progress-striped">
					<span style="width: 54%;" class="progress-bar progress-bar-info">
						<span class="sr-only">54% Complete</span>
					</span>
				</span>
			</a>
		</li>
		<li>
			<a href="#">
				<span class="task">
					<span class="desc">Upgrade Progress</span>
					<span class="percent">17%</span>
				</span>
				
				<span class="progress progress-striped">
					<span style="width: 17%;" class="progress-bar progress-bar-important">
						<span class="sr-only">17% Complete</span>
					</span>
				</span>
			</a>
		</li>
	</ul>
</li>

<li class="external">
	<a href="#">See all tasks</a>
</li>					<div id="ascrail2001" class="nicescroll-rails" style="padding-right: 3px; width: 10px; z-index: 1000; position: absolute; top: 0px; left: -10px; height: 0px; cursor: default; display: none;"><div style="position: relative; top: 0px; float: right; width: 5px; height: 0px; border: 1px solid rgb(204, 204, 204); border-top-left-radius: 1px; border-top-right-radius: 1px; border-bottom-right-radius: 1px; border-bottom-left-radius: 1px; background-color: rgb(212, 212, 212); background-clip: padding-box;"></div></div><div id="ascrail2001-hr" class="nicescroll-rails" style="height: 7px; z-index: 1000; top: -7px; left: 0px; position: absolute; cursor: default; display: none;"><div style="position: relative; top: 0px; height: 5px; width: 0px; border: 1px solid rgb(204, 204, 204); border-top-left-radius: 1px; border-top-right-radius: 1px; border-bottom-right-radius: 1px; border-bottom-left-radius: 1px; background-color: rgb(212, 212, 212); background-clip: padding-box;"></div></div></ul>
					
				</li>
				
				<li class="dropdown">
					
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<i class="entypo-mail"></i>
						<span class="badge badge-danger">10</span>
					</a>
					
					<!-- dropdown menu (messages) -->
					<ul class="dropdown-menu">
						<li>
	<ul class="dropdown-menu-list scroller" tabindex="5002" style="overflow: hidden; outline: none;">
		<li class="active">
			<a href="#">
				<span class="image pull-right">
					<img src="{{ URL::asset('assets/images/thumb-1.png') }}" alt="" class="img-circle">
				</span>
				
				<span class="line">
					<strong>Luc Chartier</strong>
					- yesterday
				</span>
				
				<span class="line desc small">
					This ain’t our first item, it is the best of the rest.
				</span>
			</a>
		</li>
		
		<li class="active">
			<a href="#">
				<span class="image pull-right">
					<img src="{{ URL::asset('assets/images/thumb-2.png') }}" alt="" class="img-circle">
				</span>
				
				<span class="line">
					<strong>Salma Nyberg</strong>
					- 2 days ago
				</span>
				
				<span class="line desc small">
					Oh he decisively impression attachment friendship so if everything. 
				</span>
			</a>
		</li>
		
		<li>
			<a href="#">
				<span class="image pull-right">
					<img src="{{ URL::asset('assets/images/thumb-3.png') }}" alt="" class="img-circle">
				</span>
				
				<span class="line">
					Hayden Cartwright
					- a week ago
				</span>
				
				<span class="line desc small">
					Whose her enjoy chief new young. Felicity if ye required likewise so doubtful.
				</span>
			</a>
		</li>
		
		<li>
			<a href="#">
				<span class="image pull-right">
					<img src="{{ URL::asset('assets/images/thumb-4.png') }}" alt="" class="img-circle">
				</span>
				
				<span class="line">
					Sandra Eberhardt
					- 16 days ago
				</span>
				
				<span class="line desc small">
					On so attention necessary at by provision otherwise existence direction.
				</span>
			</a>
		</li>
	</ul>
</li>

<li class="external">
	<a href="mailbox.html">All Messages</a>
</li>					<div id="ascrail2002" class="nicescroll-rails" style="padding-right: 3px; width: 10px; z-index: 1000; position: absolute; top: 0px; left: -10px; height: 0px; cursor: default; display: none;"><div style="position: relative; top: 0px; float: right; width: 5px; height: 0px; border: 1px solid rgb(204, 204, 204); border-top-left-radius: 1px; border-top-right-radius: 1px; border-bottom-right-radius: 1px; border-bottom-left-radius: 1px; background-color: rgb(212, 212, 212); background-clip: padding-box;"></div></div><div id="ascrail2002-hr" class="nicescroll-rails" style="height: 7px; z-index: 1000; top: -7px; left: 0px; position: absolute; cursor: default; display: none;"><div style="position: relative; top: 0px; height: 5px; width: 0px; border: 1px solid rgb(204, 204, 204); border-top-left-radius: 1px; border-top-right-radius: 1px; border-bottom-right-radius: 1px; border-bottom-left-radius: 1px; background-color: rgb(212, 212, 212); background-clip: padding-box;"></div></div></ul>
					
				</li>
				
				<li class="dropdown">
					
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<i class="entypo-globe"></i>
						<span class="badge badge-danger">1</span>
					</a>
					
					<!-- dropdown menu (messages) -->
					<ul class="dropdown-menu">
						<li class="top">
	<p class="small">
		<a href="#" class="pull-right">Mark all Read</a>
		You have <strong>3</strong> new notifications.
	</p>
</li>

<li>
	<ul class="dropdown-menu-list scroller" tabindex="5003" style="overflow: hidden; outline: none;">
		<li class="unread notification-success">
			<a href="#">
				<i class="entypo-user-add pull-right"></i>
				
				<span class="line">
					<strong>New user registered</strong>
				</span>
				
				<span class="line small">
					30 seconds ago
				</span>
			</a>
		</li>
		
		<li class="unread notification-secondary">
			<a href="#">
				<i class="entypo-heart pull-right"></i>
				
				<span class="line">
					<strong>Someone special liked this</strong>
				</span>
				
				<span class="line small">
					2 minutes ago
				</span>
			</a>
		</li>
		
		<li class="notification-primary">
			<a href="#">
				<i class="entypo-user pull-right"></i>
				
				<span class="line">
					<strong>Privacy settings have been changed</strong>
				</span>
				
				<span class="line small">
					3 hours ago
				</span>
			</a>
		</li>
		
		<li class="notification-danger">
			<a href="#">
				<i class="entypo-cancel-circled pull-right"></i>
				
				<span class="line">
					John cancelled the event
				</span>
				
				<span class="line small">
					9 hours ago
				</span>
			</a>
		</li>
		
		<li class="notification-info">
			<a href="#">
				<i class="entypo-info pull-right"></i>
				
				<span class="line">
					The server is status is stable
				</span>
				
				<span class="line small">
					yesterday at 10:30am
				</span>
			</a>
		</li>
		
		<li class="notification-warning">
			<a href="#">
				<i class="entypo-rss pull-right"></i>
				
				<span class="line">
					New comments waiting approval
				</span>
				
				<span class="line small">
					last week
				</span>
			</a>
		</li>
	</ul>
</li>

<li class="external">
	<a href="#">View all notifications</a>
</li>					<div id="ascrail2003" class="nicescroll-rails" style="padding-right: 3px; width: 10px; z-index: 1000; position: absolute; top: 0px; left: -10px; height: 0px; cursor: default; display: none;"><div style="position: relative; top: 0px; float: right; width: 5px; height: 0px; border: 1px solid rgb(204, 204, 204); border-top-left-radius: 1px; border-top-right-radius: 1px; border-bottom-right-radius: 1px; border-bottom-left-radius: 1px; background-color: rgb(212, 212, 212); background-clip: padding-box;"></div></div><div id="ascrail2003-hr" class="nicescroll-rails" style="height: 7px; z-index: 1000; top: -7px; left: 0px; position: absolute; cursor: default; display: none;"><div style="position: relative; top: 0px; height: 5px; width: 0px; border: 1px solid rgb(204, 204, 204); border-top-left-radius: 1px; border-top-right-radius: 1px; border-bottom-right-radius: 1px; border-bottom-left-radius: 1px; background-color: rgb(212, 212, 212); background-clip: padding-box;"></div></div></ul>
				
				</li>
				
				<!-- raw links -->
				<li class="dropdown">
										</li><li>
						<a target="_blank" href="/">Live Site</a>
					</li>
									
				
				<li class="sep"></li>
				
				<li>
					<a href="/signout">
						Sign Out <i class="entypo-logout right"></i>
					</a>
				</li>
				
				
				<!-- mobile only -->
				<li class="visible-xs">	
				
					<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
					<div class="horizontal-mobile-menu visible-xs">
						<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
							<i class="entypo-menu"></i>
						</a>
					</div>
					
				</li>
				
			</ul>
	
		</div>
		
	</header>