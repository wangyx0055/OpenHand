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
						<li><a href="/guidelines">Ministry Guidelines</a></li>
						<li><a href="/vision">Open Hand's Vision</a></li>
						<li><a href="/statement">Statement of Faith</a></li>
						<li><a href="/charter">Charter</a></li>
					</ul>
				</li>
				<li><a href="/involved">Get Involved</a></li>
				<li><a href="/faq">FAQ</a></li>
			</ul>
			
			<ul class="right">
				@if (Auth::check())
				<li class="has-dropdown">
					<a href="#">Action</a>
					<ul class="dropdown">
						<li><a href="/database-add">Add</a></li>
						<li><a href="/database-search">Search</a></li>
						<li><a href="logout">Volunteer Logout</a></li>
					</ul>
				</li>
				@else
				<li><a href="/login">Volunteer Sign-in</a></li>
				@endif
			</ul>
		</section>
	</nav>
</div>