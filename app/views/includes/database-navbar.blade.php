<div class="contain-to-grid">
	<nav class="top-bar" data-topbar role="navigation">
		<ul class="title-area">
			<li class="name"></li>
			<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
		</ul>
		<section class="top-bar-section">	
			<ul class="left">
				@if (Auth::check() && Auth::user()->user_type == 1)
				<li><a href="/database/add">Add Guest</a></li>
				<li><a href="/database/search">Search Guests</a></li>
				@else
				<li><a href="/database/add">Add Guest</a></li>
				<li><a href="/database/search">Search Guests</a></li>
				<li><a href="/database/admin/add">Add User</a></li>
				<li><a href="/database/admin/show-all">Show All Users</a></li>
				<li><a href="/database/admin/history">Guest History</a></li>
				@endif
			</ul>
			<ul class="right">
				<li><a href="/logout">Logout</a></li>
			</ul>
		</section>
	</nav>
</div>