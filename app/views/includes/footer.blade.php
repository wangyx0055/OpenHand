<footer class="contain-to-grid oh-footer">
	<div class="row">
		<div class="medium-4 small-12 columns">
			<ul class="no-bullet">
				<li><a href="/ministry-guidelines">Ministry Guidelines</a></li>
				<li><a href="/vision">Open Hand's Vision</a></li>
				<li><a href="/statement-of-faith">Statement of Faith</a></li>
				<li><a href="/charter">Charter</a></li>
				<li><a href="/frequently-asked-questions">FAQ</a></li>
			</ul>
		</div>
		<div class="medium-4 small-12 columns">
			<ul class="no-bullet">
				<li><a href="/get-involved">Get Involved</a></li>		
				<li><a href="/contact-us">Contact Us</a></li>
			</ul>
		</div>
		<div class="medium-4 small-12 columns">
			<ul class="no-bullet">
				@if (Auth::check() && Auth::user()->isAdmin == 0)
				<li><a href="/database/add">Add Guest</a></li>
				<li><a href="/database/search">Search Guests</a></li>
				<li><a href="/logout">Logout</a></li>
				@elseif (Auth::check() && Auth::user()->isAdmin == 1)
				<li><a href="/database/add">Add Guest</a></li>
				<li><a href="/database/search">Search Guests</a></li>
				<li><a href="/database/admin/add">Add User</a></li>
				<li><a href="/database/admin/show-all">Show All Users</a></li>
				<li><a href="/database/admin/history">Guest History</a></li>
				<li><a href="/logout">Logout</a></li>
				@else
				<li><a href="/login">User Sign-in</a></li>
				@endif
			</ul>
		</div>
	</div>	
</footer>

{{ HTML::script('js/vendor/jquery.js'); }}
{{ HTML::script('js/foundation.min.js'); }}
<script>
	$(document).foundation();
</script>