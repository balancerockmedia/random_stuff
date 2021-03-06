<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CDIA Jobs</title>
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.0/jquery.mobile-1.3.0.min.css" />
<link rel="stylesheet" href="css/app.css" />
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.3.0/jquery.mobile-1.3.0.min.js"></script>
<script src="js/libs/lodash.min.js"></script>
<script data-main="js/app" src="js/require.js"></script>
</head>
<body>
    
<div data-role="page" class="page" id="home_page">
    <div data-role="header">
        <h1>Job Board</h1>
        
        <div data-role="navbar">
            <ul>
                <li><a href="#home_page" data-transition="flip reverse">Full-time</a></li>
                <li><a href="#">Contract</a></li>
                <li><a href="#">Freelance</a></li>
                <li><a href="#">Internship</a></li>
            </ul>
        </div>
    </div>
    
    <div data-role="content">
        <ul data-role="listview" data-inset="true" data-theme="c" id="job_list"></ul>
    </div>
    
    <div data-role="footer" data-position="fixed">
        <a class="favorites_link" href="#home_page_favorites">Favorites</a>
    </div>
    
    <div data-role="panel" id="home_page_favorites" class="favorites" data-position="right" data-display="push">
        <h3>Favorites</h3>
        <div class="favorites_list"></div>
    </div>
</div>

<div data-role="page" id="job_detail_page" class="page" data-add-back-btn="true">
    <div data-role="header">
        <h1>Job Board</h1>
        
        <div data-role="navbar">
            <ul>
                <li><a href="#home_page" data-transition="flip reverse">Full-time</a></li>
                <li><a href="#">Contract</a></li>
                <li><a href="#">Freelance</a></li>
                <li><a href="#">Internship</a></li>
            </ul>
        </div>
    </div>
    
    <div data-role="content" id="job_details"></div>
    
    <div data-role="footer" data-position="fixed">
        <a class="favorites_link" href="#job_detail_page_favorites">Favorites</a>
    </div>
    
    <div data-role="panel" id="job_detail_page_favorites" class="favorites" data-position="right" data-display="push">
        <h3>Favorites</h3>
        <div class="favorites_list"></div>
    </div>
</div>

</body>
</html>