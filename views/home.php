<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Download DokuWiki</title>
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
<form action="index.php" method="post" class="dlform">
    <input type="hidden" name="do" value="download">


    <div class="hero-unit">
        <h1>Download DokuWiki!</h1>

        <p>
            Here you can download the latest DokuWiki-Version. Either just click "Download" or customize the
            download
            to your likings with the options below.
        </p>

        <p><input type="submit" value="Download" class="btn btn-primary btn-large"></p>

        <p><small>DokuWiki is available free of charge under the <a href="http://www.gnu.org/licenses/gpl-2.0.html">GNU General Public License Version 2</a>.</small></p>
    </div>


    <div class="row">
        <div class="span4">
            <h2>Version</h2>

            <p>Here you can select which release you'd like to download. The default is usually what you want.</p>

            <ul class="unstyled">
                <li>
                    <label class="radio"><input type="radio" name="version" value="master">Development
                        Snapshot <a href="http://github.com/splitbrain/dokuwiki/tarball/master">(direct
                            link)</a>
                        <p class="help-block"><?php echo $TPL->version('master') ?></p>
                    </label>
                </li>
                <?php
                $checked = 'checked="checked"';
                $recommend = '(Recommended)';
                if($TPL->version('rc')):
                    $checked   = '';
                    $recommend = '';
                    ?>
                    <li>
                        <label class="radio"><input type="radio" name="version" value="rc" checked="checked">Release
                            Candidate
                            (Recommended) <a href="src/dokuwiki/dokuwiki-rc.tgz">(direct link)</a>

                            <p class="help-block"><?php echo $TPL->version('rc') ?></p>
                        </label>
                    </li>
                <?php
                endif;
                ?>
                <li>
                    <label class="radio"><input type="radio" name="version" value="stable" <?php echo $checked ?>>Stable
                        <?php echo $recommend ?> <a href="src/dokuwiki/dokuwiki-stable.tgz">(direct link)</a>

                        <p class="help-block"><?php echo $TPL->version('stable') ?></p>
                    </label>
                </li>
                <li>
                    <label class="radio"><input type="radio" name="version" value="oldstable">Old Stable <a
                            href="src/dokuwiki/dokuwiki-oldstable.tgz">(direct link)</a>

                        <p class="help-block"><?php echo $TPL->version('oldstable') ?></p>
                    </label>

                </li>
            </ul>

            <h3>Update</h3>

            <p>
                Use this if you want to only download the files that have changed since the old stable version.
                Check
                <a href="https://www.dokuwiki.org/install:upgrade">Upgrade Instructions</a> on how an update is
                done,
                irregardless if you download a full package or not.
            </p>

            <label class="checkbox"><input type="checkbox" name="updateonly">Download changed files only</label>

            <p class="help-block">
                This setting will be ignored if you download the old stable
                (<?php echo $TPL->version('oldstable') ?>) release. Additional downloads like
                plugins or webserver components will always be included in full.
            </p>

            <h3>Include Web-Server</h3>

            <p>
                You may optionally include a minimal Webserver with PHP in your download. This is useful if for quickly
                trying DokuWiki or for running it from an USB stick. This is recommended for personal, single-user use
                only.
            </p>

            <ul class="unstyled">
                <li>
                    <label class="checkbox">
                        <input type="checkbox" name="onastick[]" value="mapache">
                        MicroApache (Windows)
                        <p class="help-block">Apache 2.0.64, PHP 5.2.17, GD2 and SQLite</p>
                    </label>
                </li>
            </ul>
        </div>

        <div class="span4">
            <h2>Languages</h2>

            <p>
                DokuWiki is available in a whole bunch of languages. You probably will not need all of them.
                You can save space by removing the ones you won't need here.
            </p>

            <span id="toggle" class="btn hidden pull-right">Toggle all</span>

            <ul class="unstyled">
                <li><label class="checkbox"><input type="checkbox" name="langs[]" value="en" disabled="disabled"
                                                   checked="checked">en - English (always enabled)</label></li>
                <?php $TPL->langlist() ?>
            </ul>

        </div>
        <div class="span4">
            <h2>Popular Plugins</h2>

            <p>
                DokuWiki can be extended by hundreds of available <a
                    href="https://www.dokuwiki.org/plugins">plugins</a>.
                You don't need any to get started, but here is a small choice of popular plugins that you might want
                to include in your download.
            </p>

            <ul class="unstyled">
                <li>
                    <label class="checkbox">
                        <input type="checkbox" name="plugins[]" value="captcha">
                        CAPTCHA Plugin
                        <a href="https://www.dokuwiki.org/plugin:captcha">(Learn more)</a>
                    </label>


                    <p class="help-block">
                        Use a CAPTCHA to secure your wiki against spammers. Comes with different accessibility
                        options. Recommended if you intend to run a public wiki.

                    </p>
                </li>

                <li>
                    <label class="checkbox">
                        <input type="checkbox" name="plugins[]" value="wrap">
                        Wrap Plugin
                        <a href="https://www.dokuwiki.org/plugin:wrap">(Learn more)</a>
                    </label>

                    <p class="help-block">
                        Versatile plugin that adds additional syntax for creating various colored boxes, columns
                        or even your own styles.
                    </p>
                </li>

                <li>
                    <label class="checkbox">
                        <input type="checkbox" name="plugins[]" value="translation">
                        Translation Plugin
                        <a href="https://www.dokuwiki.org/plugin:translation">(Learn more)</a>
                    </label>

                    <p class="help-block">
                        This is the recommended plugin if you'd like to create a multi-lingual wiki.
                    </p>
                </li>

                <li>
                    <label class="checkbox">
                        <input type="checkbox" name="plugins[]" value="vshare">
                        Video Share Plugin
                        <a href="https://www.dokuwiki.org/plugin:vshare">(Learn more)</a>
                    </label>

                    <p class="help-block">
                        A plugin that makes it easier to add videos from popular video sharing sites like Youtube or
                        Vimeo to your wiki pages.
                    </p>
                </li>

                <li>
                    <label class="checkbox">
                        <input type="checkbox" name="plugins[]" value="gallery">
                        Gallery Plugin
                        <a href="https://www.dokuwiki.org/plugin:gallery">(Learn more)</a>
                    </label>

                    <p class="help-block">
                        Easily embed nice looking image galleries into your pages.
                    </p>
                </li>
            </ul>
        </div>
    </div>

    <div class="form-actions row">
        <button type="submit" class="btn btn-primary">Start Download</button>
    </div>
</form>

</div>
<!-- /container -->

<?php $TPL->globalheader() ?>

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="script.js"></script>
<script type="text/javascript">
    <?php include('ga.js')?>
</script>

</body>
</html>

