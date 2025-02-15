<div class="title_wrap">
    <h1>$Title</h1>
</div>

<div class="content_wrap">  
    $Content

    <%-- Loop through each profile and produce a linked name for each --%>
    <% if $Profiles.exists %>
        <div class="luthier_div">
            <% loop $Profiles %>
                <h2><a class="luthier_link" href="$Link">$Title</a></h2>
            <% end_loop %>
        <% else %>
            <p>No Profiles Found</p>
        </div>   
    <% end_if %>
    
</div>

$Layout