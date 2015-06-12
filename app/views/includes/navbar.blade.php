<div class="contain-to-grid">
	<nav class="top-bar" data-topbar role="navigation" data-options="sticky_on: large">
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
						<li><a href="/vision">Open Hand's Vision</a></li>
						<li><a href="/statement-of-faith">Statement of Faith</a></li>
						<li><a href="/charter">Charter</a></li>
					</ul>
				</li>
				<li><a href="/get-involved">Get Involved</a></li>
				<li><a href="/frequently-asked-questions">FAQ</a></li>
			</ul>
			
			<ul class="right">
				@if (Auth::check() && Auth::user()->isAdmin == 0)
				<li class="has-dropdown">
					<a href="#">Action</a>
					<ul class="dropdown">
						<li><a href="/database/add">Add Guest</a></li>
						<li><a href="/database/search">Search Guests</a></li>
						<li class="divider"></li>
						<li><a href="/logout">Logout</a></li>
					</ul>
				</li>
				@elseif (Auth::check() && Auth::user()->isAdmin == 1)
				<li class="has-dropdown">
					<a href="#">Action</a>
					<ul class="dropdown">
						<li><a href="/database/add">Add Guest</a></li>
						<li><a href="/database/search">Search Guests</a></li>
						<li class="divider"></li>
						<li><a href="/database/admin/add">Add Volunteer</a></li>
						<li><a href="/database/admin/show-all">Show All Volunteers</a></li>
						<li class="divider"></li>
						<li><a href="/logout">Logout</a></li>
					</ul>
				</li>
				@else
				<li><a href="/login">Volunteer Sign-in</a></li>
				@endif
			</ul>
		</section>
	</nav>
</div>