<div class="contain-to-grid">
	<nav class="top-bar" data-topbar role="navigation">
		<ul class="title-area">
			<li class="name"></li>
			<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
		</ul>
		<section class="top-bar-section">
			<ul class="left">
				<li class="has-dropdown">
					<a href="#">About Us</a>
					<ul class="dropdown">
						<li><a href="/ministry-guidelines">Ministry Guidelines</a></li>
						<li><a href="/vision">Our Vision</a></li>
						<li><a href="/statement-of-faith">Statement of Faith</a></li>
						<li><a href="/charter">Charter</a></li>
						<li><a href="/frequently-asked-questions">FAQ</a></li>
					</ul>
				</li>
				<li><a href="/get-involved">Get Involved</a></li>
				<li><a href="/contact-us">Contact Us</a></li>
			</ul>		
			<ul class="right">
				@if (Auth::check() && Auth::user()->user_type == 1)
				<li class="has-dropdown">
					<a href="#">Action</a>
					<ul class="dropdown">
						<li><a href="/database/add">Add Guest</a></li>
						<li><a href="/database/search">Search Guests</a></li>
						<li class="divider"></li>
						<li><a href="/logout">Logout</a></li>
					</ul>
				</li>
				@elseif (Auth::check() && Auth::user()->user_type == 2)
				<li class="has-dropdown">
					<a href="#">Action</a>
					<ul class="dropdown">
						<li><a href="/database/add">Add Guest</a></li>
						<li><a href="/database/search">Search Guests</a></li>
						<li class="divider"></li>
						<li><a href="/database/admin/add">Add User</a></li>
						<li><a href="/database/admin/show-all">Show All Users</a></li>
						<li><a href="/database/admin/history">Guest History</a></li>
						<li class="divider"></li>
						<li><a href="/logout">Logout</a></li>
					</ul>
				</li>
				@else
				<li><a href="/login">User Sign-in</a></li>
				@endif
			</ul>
		</section>
	</nav>
</div>