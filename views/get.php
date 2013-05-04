<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Your DokuWiki Download is ready</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Le styles -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <!-- FIXME
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="../assets/ico/favicon.png">
    -->
</head>

<body>


<div class="container">
    <input type="hidden" name="do" value="download">

    <!-- Main hero unit for a primary marketing message or call to action -->
    <div class="hero-unit">
        <h1>Thanks for Downloading!</h1>

        <p>
            Your Download should start immeadiately, if not: <a
                href="out/dokuwiki-<?php echo htmlspecialchars($_REQUEST['id']) ?>.tgz" id="download">click here</a>.
        </p>
    </div>

    <!-- Example row of columns -->
    <div class="row">
        <div class="span4">
            <h2>Learn More</h2>

            <ul>
                <li>Learn how to <a href="https://www.dokuwiki.org/install">install</a> or <a
                        href="https://www.dokuwiki.org/install:upgrade">upgrade</a> DokuWiki
                </li>
                <li>Read the <a href="https://www.dokuwiki.org/manual">DokuWiki manual</a></li>
            </ul>
        </div>

        <div class="span4">
            <h2>Subscribe</h2>

            <p>Subscribe to our Newsletter to stay up to date with what happens in the DokuWiki world:</p>

            <!-- Begin MailChimp Signup Form -->
            <form
                action="http://dokuwiki.us1.list-manage.com/subscribe/post?u=72ec38d1614d3a63c1184f448&amp;id=9c27f4f01d"
                method="post" class="form-horizontal">
                <input type="hidden" name="EMAILTYPE" value="html">

                <div class="control-group">
                    <label class="control-label" for="mce-EMAIL">Email Address</label>

                    <div class="controls">
                        <input type="email" value="" name="EMAIL" id="mce-EMAIL" class="input-medium">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="mce-FNAME">First Name</label>

                    <div class="controls">
                        <input type="text" value="" name="FNAME" id="mce-FNAME" class="input-medium">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="mce-LNAME">Last Name</label>

                    <div class="controls">
                        <input type="text" value="" name="LNAME" id="mce-LNAME" class="input-medium">
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <input type="submit" value="Subscribe" name="subscribe" class="btn">
                    </div>
                </div>

            </form>
            <!--End mc_embed_signup-->
        </div>

        <div class="span4">
            <h2>Donate</h2>
        </div>
    </div>

</div>
<!-- /container -->

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="script.js"></script>


</body>
</html>

