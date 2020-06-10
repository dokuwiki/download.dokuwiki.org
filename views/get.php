<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Download DokuWiki</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="https://www.dokuwiki.org/lib/exe/css.php?t=dokuwiki" rel="stylesheet" />
    <link href="style.css" rel="stylesheet" />

    <link rel="apple-touch-icon" href="https://www.dokuwiki.org/lib/tpl/dokuwiki/images/apple-touch-icon.png" />
    <link rel="shortcut icon" href="https://www.dokuwiki.org/lib/tpl/dokuwiki/images/favicon.ico">
</head>

<body>

    <div id="dokuwiki__site"><div class="dokuwiki site">

        <div id="dokuwiki__header" class="group">
            <h1>
                <img src="https://www.dokuwiki.org/lib/tpl/dokuwiki/images/logo.png" width="64" height="64" alt="" />
                Thanks for Downloading!
            </h1>
        </div>

        <div id="dokuwiki__content" class="wrapper group">
            <div class="page group">

                <p class="intro">
                    Your Download should begin shortly, if not: <a
                        href="out/dokuwiki-<?php echo htmlspecialchars($_REQUEST['id']) ?>.tgz" id="download">download via this link</a>.
                </p>


                <div class="row">
                    <div class="col">
                        <h2>Learn More</h2>

                        <ul>
                            <li>Learn how to <a href="https://www.dokuwiki.org/install" target="_blank">install</a> or <a
                                    href="https://www.dokuwiki.org/install:upgrade" target="_blank">upgrade</a> DokuWiki
                            </li>
                            <li>Read the <a href="https://www.dokuwiki.org/manual" target="_blank">DokuWiki manual</a></li>
                        </ul>

                        <h2>Donate ❤️</h2>

                        <div class="donate">
                            <p>Say thanks by <a href="https://www.dokuwiki.org/donate" target="_blank">donating</a> via</p>

                            <ul>
                                <li><a href="http://donate.dokuwiki.org" target="_blank"><img src="img/paypal.svg" alt="">Paypal</a>,</li>
                                <li><a href="https://www.patreon.com/dokuwiki" target="_blank"><img src="img/patreon.svg" alt="">Patreon</a>,</li>
                                <li><a href="https://github.com/sponsors/splitbrain/" target="_blank"><img src="img/github.svg" alt="">Github Sponsors</a> or</li>
                                <li><a href="bitcoin:1Dokuw1Ki8dGk4p2hAWZv4TwGj8Ax1Vcqz"><img src="img/bitcoin.svg" alt="">Bitcoin</a>.</li>
                            </ul>
                        </div>

                        <p>You may also want to check out the shop for cool <a href="http://www.splitbrain.org/shop" target="_blank">DokuWiki
                                Merchandise</a>.</p>

                    </div>

                    <div class="col">
                        <h2>Join the Community</h2>

                        <p>If you have any questions, check out the <a href="https://forum.dokuwiki.org/" target="_blank">user forum</a> to talk to
                            other experienced DokuWiki users.</p>
                    </div>

                    <div class="col">
                        <h2>Follow Us!</h2>

                        <div class="block">
                            <div class="g-plus" data-href="//plus.google.com/106967944317856873610" data-rel="publisher" data-width="274"></div>
                        </div>

                        <div class="block">
                            <div id="fb-root"></div>
                            <div class="fb-like-box" data-href="http://www.facebook.com/dokuwiki" data-width="274"
                                 data-show-faces="true" data-stream="false" data-header="true"></div>
                        </div>

                        <p><a href="http://twitter.com/dokuwiki" class="twitter-follow-button" data-show-count="true"
                              data-size="large" target="_blank">Follow @dokuwiki</a></p>

                    </div>
                </div>


            </div>
        </div><!-- /wrapper -->
    </div></div><!-- /site -->


<?php $TPL->globalheader() ?>

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="script.js"></script>
<script type="text/javascript">
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
    <?php include('ga.js')?>
</script>


</body>
</html>

