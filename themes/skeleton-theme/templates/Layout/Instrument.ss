<div class="title_wrap">
	<h1>$Title</h1>
</div>

<%-- Loop through each instrument type and place a photo and name of each --%>
<div class="instrument_container">
	<% loop $InstrumentObjects %>
		<div class="instrument_wrap">
			<a class="instrument_link" href="$Link">
				<h3 id="instrument_name">$Name</h3>
				<% if $PhotoURL %>
					<img class="instrument_img" src="$PhotoURL" alt="$Name Photo"/>
				<% end_if %>
			</a>
		</div>
	<% end_loop %>
</div>

<div class="content_wrap">
	$Content
</div>

$Layout