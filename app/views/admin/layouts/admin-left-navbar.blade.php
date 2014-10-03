<div class="sidebar-menu">
		
		<ul id="main-menu" class="" style="">
			<!-- add class "multiple-expanded" to allow multiple submenus to open -->
			<!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
			<li class="active">
				<a href="/admin/index"><i class="entypo-gauge"></i><span>Dashboard</span></a>
			</li>
			
			<li class="root-level has-sub"><a href="/admin"><i class="entypo-layout"></i><span>Content</span></a>
				<ul class="">
					<li><a href="/admin"><span>News</span></a></li>
					<li><a href="/admin"><span>Reviews</span></a></li>
					<li><a href="/admin"><span>Interviews</span></a></li>
					<li><a href="/admin"><span>Videos</span></a></li>
				</ul>
			</li>

			<li class="root-level has-sub"><a href="/admin"><i class="entypo-layout"></i>
				<span>Messages</span><span class="badge badge-danger">8</span></a>
				<ul class="">
					<li><a href="/admin"><span>New Message</span></a></li>
					<li><a href="/admin"><span>Inbox</span></a></li>
					<li><a href="/admin"><span>Sent</span></a></li>
				</ul>
			</li>
			
			<li class="root-level has-sub"><a href="/admin"><i class="entypo-layout"></i><span>Forums</span><span class="badge badge-danger">13</span></a>
				<ul class="">
					<li><a href="/admin"><span>Discussion Boards</span></a></li>
					<li><a href="/admin"><span>Manage Discussion Boards</span></a></li>
				</ul>
			</li>

			<li class="root-level has-sub"><a href="/admin"><i class="entypo-layout"></i><span>Games</span></a>
				<ul class="">
					<li><a href="/admin/games/create"><span>New Game</span></a></li>
					<li><a href="/admin/games"><span>All Games</span></a></li>
					<li><a href="/admin"><span>Released this week</span></a></li>
					<li><a href="/admin"><span>Released this month</span></a></li>
				</ul>
			</li>
			
			<li class="root-level has-sub"><a href="/admin"><i class="entypo-layout"></i><span>Platforms</span></a>
				<ul class="">
					<li><a href="/admin"><span>New Platform</span></a></li>
					<li><a href="/admin"><span>List Platforms</span></a></li>
				</ul>
			</li>

			<li class="root-level has-sub"><a href="/admin"><i class="entypo-layout"></i><span>Genres</span></a>
				<ul class="">
					<li><a href="/admin"><span>New Genre</span></a></li>
					<li><a href="/admin"><span>List Genres</span></a></li>
				</ul>
			</li>
			
			<li class="root-level has-sub"><a href="/admin"><i class="entypo-layout"></i><span>Companies</span></a>
				<ul class="">
					<li><a href="/admin"><span>New Company</span></a></li>
					<li><a href="/admin"><span>List Companies</span></a></li>
				</ul>
			</li>
			
			<li class="root-level has-sub"><a href="/admin"><i class="entypo-layout"></i><span>Ads Manager</span></a>
				<ul class="">
					<li><a href="/admin"><span>New Ad</span></a></li>
					<li><a href="/admin"><span>List Ads</span></a></li>
				</ul>
			</li>
			
			<li class="root-level has-sub"><a href="/admin"><i class="entypo-layout"></i><span>Staff</span></a>
				<ul class="">
					<li><a href="/admin"><span>List Staff</span></a></li>
					<li><a href="/admin"><span>List Staff</span></a></li>
				</ul>
			</li>

			<li class="root-level has-sub"><a href="/admin"><i class="entypo-layout"></i><span>Users</span></a>
				<ul class="">
					<li><a href="/admin"><span>List Users</span></a></li>
				</ul>
			</li>

			<li class="root-level has-sub"><a href="/admin"><i class="entypo-layout"></i><span>Settings</span></a>
				<ul class="">
					<li><a href="/admin"><span>New Ad</span></a></li>
					<li><a href="/admin"><span>List Ads</span></a></li>
				</ul>
			</li>

			<li class="root-level has-sub"><a href="/admin"><i class="entypo-layout"></i><span>Security</span></a>
				<ul class="">
					<li><a href="/admin"><span>Groups</span></a></li>
					<li><a href="/admin"><span>List Ads</span></a></li>
				</ul>
			</li>											
		</ul>
				
	</div>

	<div class="main-content">

		@include('admin.layouts.admin-breadcrumbs')
		@include('admin.alerts.admin-alerts')