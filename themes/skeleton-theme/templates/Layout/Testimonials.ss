<div class="title_wrap">
    <h1>$Title</h1>
</div>

<%-- Loop through the testimonials --%>
<div class="content_wrap">
    <% if $TestimonialsList.exists %>
        <% loop $TestimonialsList %>
            <p class="testimonialText">"$Description"</p>
            <h3 class="testimonialName">$Title</h3>
        <% end_loop %>
    <% end_if %>
</div>

$Content
$Layout
