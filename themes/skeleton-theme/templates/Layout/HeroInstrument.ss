<h1>$Title</h1>

<%-- A hero image of the photo uploaded from in the CMS --%>
<div class="border_wrap">
	<% with $Photo.ScaleWidth(750) %>
		<img class="img" src="$URL" alt="$Title" />
	<% end_with %>
</div>

<div class="content_wrap">
	$Content
</div>

<%-- Enter Price and Luthier in the CMS and display it --%>
<div class="content_wrap2">
	<% if $Price %>
		<h3>Price NZD: $FormattedPrice</h3>
	<% end_if %>

	<% if $Luthier %>
		<h3>Luthier: $Luthier</h3>
	<% end_if %>
</div>

<h4>For further enquiries or to place an order, please contact our sales team.</h4>

$Layout

