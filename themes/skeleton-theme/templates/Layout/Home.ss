<%-- Banner --%>
<div class="homeBanner_wrap" style="background-image: url('$Photo.ScaleWidth(750).URL');">
	<h2>Build<h2>
		<h2>Repair</h2>
		<h2>Maintenance</h2>
</div>

<h1>$Title</h1>

<%-- Loop through the profiles to display photo and name --%>
<% if $Profiles.exists %>
	<div class="thumbnail_container">
		<% loop $Profiles %>
			<% if $Photo.exists %>
				<div class="thumbnail">
					<a class="page_link" href="$Link">
						<img class="thumbnail_img" src="$Photo.ScaleWidth(250).URL" alt="$Title">
						<h3 id="profile_name">$Title</h3>
					</a>
				</div>
			<% end_if %>
		<% end_loop %>
	</div>
<% end_if %>

<div class="homeContent_wrap">
$Content	
	<div id="homeContent1">
		<%-- Display testimonial if they are checked to be featured on the home page --%>
		<% if $Top.FeaturedTestimonials.exists %>
			<% loop Top.FeaturedTestimonials %>
				<p class="testimonialText">"$Description"</p>
				<h3 class="testimonialName">$Title</h3>
			<% end_loop %>
		<% end_if %>
	</div>
</div>

$Layout
