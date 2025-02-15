<h1>$Title</h1>

<%-- A hero image of the photo uploaded from in the CMS--%>
<div class="border_wrap">	
	<% with $Photo.ScaleWidth(750) %>
		<img class="img" src="$URL" alt="" width="$width" height="$height" />
	<% end_with %>
</div>

<div class="content_wrap">
	$Content
</div>

$Layout

