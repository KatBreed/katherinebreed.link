<!DOCTYPE html>
<html lang="$ContentLocale">
<head>
    <meta charset="utf-8">
    <% base_tag %>
    <title>$SiteConfig.Title | <% if $MetaTitle %>$MetaTitle<% else %>$Title<% end_if %></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    $MetaTags(false)

    <% require themedCSS('stylesheet') %>

    <%-- Fonts --%>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Lato|Roboto+Condensed">

</head>
<body id="$ClassName.ShortName">
    <% include Header %>
    <% include Navigation %>
    <main>
		$Layout
    </main>
    <% include Footer %>

    <% require themedJavascript('scripts') %>
</body>
</html>
