<!DOCTYPE HTML>
<!--[if IE 6]>
<html id="ie6" lang="en-US" class="ie ie6 lt-ie9">
<![endif]-->
<!--[if IE 7]>
<html id="ie7" lang="en-US" class="ie ie7 lt-ie9">
<![endif]-->
<!--[if IE 8]>
<html id="ie8" lang="en-US" class="ie ie8 lt-ie9">
<![endif]-->
<!--[if gte IE 9]>
<html lang="en-US" class="ie ie9">
<![endif]-->
<!--[if !(IE)]><!-->
<html lang="en-US" class="">
<!--<![endif]-->
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1.0">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="author" content="marcolago">

	<meta name="description" content="Flowtime.js is an open source framework for easily build HTML presentations or websites. It’s built with web standards in mind and on top of a solid full page grid layout powered by CSS3 hardware accelerated transition and comes with a complete set of Javascript API for deep customization.">

	<title>Stage Orpalis</title>
	<link rel="stylesheet" href="assets/css/reset.css">
	<link rel="stylesheet" href="css/flowtime.css">
	<link rel="stylesheet" href="css/themes/default.css">
	
</head>
<body class="">
	
	<div class="flowtime">
		<div class="ft-section" data-id="section-1">
			<div id="/section-1/page-1" class="ft-page" data-id="page-1">
				<h1>Sub Pages Demo</h1>
				<p>This presentation has just one section with five pages. Page 3 has a sub page that is not part of the main structure flow (it is not an <code>.ft-page</code>) so is not reachable by Flowtime.js logic but only by custom navigation.</p>
				<p><a href="#/section-1/page-3">Go to Page 3</a> to take show and hide the sub page.</p>
			</div>
			<div id="/section-1/page-2" class="ft-page" data-id="page-2">
				<h1>Page 2</h1>
			</div>
			<div id="/section-1/page-3" class="ft-page" data-id="page-3">
				<h1>Page 3</h1>
				<p>This page has a sub page content which is not reachable by Flowtime.js logic.</p>
				<p>To go to the sub page <a href="#" class="sub-link">click here</a>.</p>
				<p>Sub pages will also not appear in the overview mode.</p>
			</div>
			<div id="/section-1/page-4" class="ft-page" data-id="page-4">
				<h1>Page 4</h1>
			</div>
			<div id="/section-1/page-5" class="ft-page" data-id="page-5">
				<h1>Page 5</h1>
			</div>
		</div>
		<div class="ft-section" data-id="section-2">
		  <div class="ft-page">
		    <h1>Test</h1>
		  </div>
		</div>
	</div>
	
	<script src="js/brav1toolbox.js"></script>
	<script src="js/flowtime.js"></script>

	<script type="text/javascript">
		
		
		// Configuration API test
		Flowtime.showProgress(true);
		// Flowtime.fragmentsOnSide(true);
		// Flowtime.fragmentsOnBack(true);
		// Flowtime.useHistory(false);
		// Flowtime.slideInPx(true);
		// Flowtime.sectionsSlideToTop(true);
		// Flowtime.gridNavigation(false);
		// Flowtime.useOverviewVariant(true);
		// Flowtime.parallaxInPx(true);
		//
		// event management
		Flowtime.addEventListener("flowtimenavigation", onNavigation, false);
		function onNavigation(e)
		{	
			/**
			 * resets the sub pages status when navigating between pages
			 * but maintains the subpages status if was only triggered the overview mode
			 */
			if (!e.isOverview && e.pastPageIndex != e.pageIndex)
			{
				var subs = document.querySelectorAll(".ft-page .sub-page")
				for (var i = 0; i < subs.length; i++)
				{
					Brav1Toolbox.removeClass(subs[i], "active");
				}
			}
		}
		// starts the application with configuration options
		Flowtime.start();
	</script>
	
	<script>
		Brav1Toolbox.addListener(document, "click", onClick);
		Brav1Toolbox.addListener(document, "touchend", onClick);
		function onClick(e)
		{
			// use e.preventDefault to disable the hash change
			e.preventDefault();
			// caching of the current page and of the sub page
			var p = Flowtime.getPage();
			var subPage = p.querySelector(".sub-page");
			//
			// sub page show logic
			var t = e.target;
			if (t.className.indexOf("sub-link") != -1)
			{
				var subPage = p.querySelector(".sub-page");
				Brav1Toolbox.addClass(subPage, "active");
			}
			// sub page hide logic
			if (t.className.indexOf("sub-back") != -1)
			{
				var subPage = p.querySelector(".sub-page");
				Brav1Toolbox.removeClass(subPage, "active");
			}
		}
	</script>
</body>
</html>
