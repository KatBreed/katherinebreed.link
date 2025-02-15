<h1>$Title</h1>

<%-- Loop through the individual instruments to produce a thumbnail photo and name of each --%>
<% if $ChildThumbnails.exists %>
	<div class="thumbnail_container">
		<% loop $ChildThumbnails %>
			<% if $Photo.exists %>
				<div class="thumbnail">
					<a class="page_link" href="$Link">
						<img class="thumbnail_img" src="$Photo.ScaleWidth(250).URL" alt="$Title">
						<h4>$Title</h4>
					</a>
				</div>
			<% end_if %>
		<% end_loop %>
	</div>
<% end_if %>

<div class="content_wrap">
	$Content
</div>

$Layout


