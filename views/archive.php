<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>DokuWiki Archived Downloads</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="https://www.dokuwiki.org/lib/exe/css.php?t=dokuwiki" rel="stylesheet" />
    <link href="style.css" rel="stylesheet" />

    <link rel="apple-touch-icon" href="https://www.dokuwiki.org/lib/tpl/dokuwiki/images/apple-touch-icon.png" />
    <link rel="shortcut icon" href="https://www.dokuwiki.org/lib/tpl/dokuwiki/images/favicon.ico" />
</head>

<body>


<div id="dokuwiki__site"><div class="dokuwiki site">

    <div id="dokuwiki__header" class="group">
        <h1>
            <img src="https://www.dokuwiki.org/lib/tpl/dokuwiki/images/logo.png" width="64" height="64" alt="" />
            DokuWiki Archived Downloads
        </h1>
    </div>

    <div id="dokuwiki__content" class="wrapper group">
        <div class="page group">


            <div class="intro">
                <p>This is a list of all DokuWiki versions ever released. Please <b>do not use old releases in production</b> as they might contain unfixed security issues.</p>

                <p><a href="./">Download the most recent release here</a></p>

            </div>


            <div class="row group">
                <a href="rss" class="rss">Subscribe to new releases by RSS feed</a>

                <?php $TPL->archivelist(); ?>
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
    <?php include('ga.js')?>
</script>

</body>
</html>

