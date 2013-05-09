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
    <link rel="apple-touch-icon" href="https://www.dokuwiki.org/lib/tpl/dokuwiki/images/apple-touch-icon.png">
    <link rel="shortcut icon" href="https://www.dokuwiki.org/lib/tpl/dokuwiki/images/favicon.ico">
</head>

<body>


<div class="container">

    <!-- Main hero unit for a primary marketing message or call to action -->
    <div class="hero-unit">
        <h1>Thanks for Downloading!</h1>

        <p>
            Your Download should begin shortly, if not: <a
                href="out/dokuwiki-<?php echo htmlspecialchars($_REQUEST['id']) ?>.tgz" id="download">click here</a>.
        </p>
    </div>

    <!-- Example row of columns -->
    <div class="row">
        <div class="span4">
            <h2>Learn More</h2>

            <ul>
                <li>Learn how to <a href="https://www.dokuwiki.org/install" target="_blank">install</a> or <a
                        href="https://www.dokuwiki.org/install:upgrade" target="_blank">upgrade</a> DokuWiki
                </li>
                <li>Read the <a href="https://www.dokuwiki.org/manual" target="_blank">DokuWiki manual</a></li>
            </ul>

            <h3>Donate</h3>

            <div class="pull-right">
                <a class="FlattrButton" style="display:none;" href="http://www.splitbrain.org/projects/dokuwiki" target="_blank"></a>
            </div>

            <p>
                Say thanks using the flattr button or by <a href="https://www.dokuwiki.org/donate" target="_blank">donating</a> via <a
                    href="http://donate.dokuwiki.org" target="_blank">Paypal</a> or <a
                    href="bitcoin:1Dokuw1Ki8dGk4p2hAWZv4TwGj8Ax1Vcqz">Bitcoin</a>.
            </p>

            <p>You may also want to check out the shop for cool <a href="http://www.splitbrain.org/shop" target="_blank">DokuWiki
                    Merchandise</a>.</p>

        </div>

        <div class="span4">
            <h2>Subscribe</h2>

            <p>Subscribe to our Newsletter to stay up to date with what happens in the DokuWiki world:</p>

            <!-- Begin MailChimp Signup Form -->
            <form
                action="http://dokuwiki.us1.list-manage.com/subscribe/post?u=72ec38d1614d3a63c1184f448&amp;id=9c27f4f01d"
                method="post" class="form-horizontal" target="_blank">
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

            <p>If you have any questions, check out the <a href="https://forum.dokuwiki.org/" target="_blank">user forum</a> to talk to
                other experienced DokuWiki users.</p>

        </div>

        <div class="span4">
            <h2>Follow Us!</h2>


            <p>

            <div class="g-plus" data-href="//plus.google.com/106967944317856873610" data-rel="publisher"></div>
            </p>

            <p>

            <div id="fb-root"></div>
            <div class="fb-like-box" data-href="http://www.facebook.com/dokuwiki" data-width="300"
                 data-show-faces="true" data-stream="false" data-header="true"></div>
            </p>

            <p><a href="http://twitter.com/dokuwiki" class="twitter-follow-button" data-show-count="true"
                  data-size="large" target="_blank">Follow @dokuwiki</a></p>

        </div>
    </div>

</div>
<!-- /container -->

<?php
if(file_exists('../wiki/lib/tpl/dokuwiki/dwtb.html')){
    include('../wiki/lib/tpl/dokuwiki/dwtb.html');
}
?>

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="script.js"></script>
<script type="text/javascript">
    /* Google plus */
    (function () {
        var po = document.createElement('script');
        po.type = 'text/javascript';
        po.async = true;
        po.src = 'https://apis.google.com/js/plusone.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(po, s);
    })();

    /* Facebook */
    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=167577225459";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    /* twitter */
    !function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
        if (!d.getElementById(id)) {
            js = d.createElement(s);
            js.id = id;
            js.src = p + '://platform.twitter.com/widgets.js';
            fjs.parentNode.insertBefore(js, fjs);
        }
    }(document, 'script', 'twitter-wjs');

    /* flatter */
    (function () {
        var s = document.createElement('script'), t = document.getElementsByTagName('script')[0];
        s.type = 'text/javascript';
        s.async = true;
        s.src = 'http://api.flattr.com/js/0.6/load.js?mode=auto';
        t.parentNode.insertBefore(s, t);
    })();

    <?php include('ga.js')?>
</script>


</body>
</html>

