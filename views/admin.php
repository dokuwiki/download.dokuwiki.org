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

    <div id="dokuwiki__site"><div class="dokuwiki admin site">

        <div id="dokuwiki__header" class="group">
            <h1>
                <img src="https://www.dokuwiki.org/lib/tpl/dokuwiki/images/logo.png" width="64" height="64" alt="" />
                Thanks for Downloading!
            </h1>
        </div>

        <div id="dokuwiki__content" class="wrapper group">
            <div class="page group">


                <div class="row">
                    <div class="col">
                        <form action="index.php" method="post" class="admin">
                            <input type="hidden" name="do" value="symlink" />
                            <fieldset>
                                <legend>Set Version Symlinks</legend>
                                <p>
                                    <label for="rc">RC</label>
                                    <select id="rc" name="rc">
                                        <option></option>
                                        <?php $TPL->versionselect('rc'); ?>
                                    </select>
                                </p>
                                <p>
                                    <label for="stable">stable</label>
                                    <select id="stable" name="stable">
                                        <option></option>
                                        <?php $TPL->versionselect('stable'); ?>
                                    </select>
                                </p>
                                <p>
                                    <label for="oldstable">oldstable</label>
                                    <select id="oldstable" name="oldstable">
                                        <option></option>
                                        <?php $TPL->versionselect('oldstable'); ?>
                                    </select>
                                </p>
                                <p>
                                    <button type="submit" class="btn">Update</button>
                                </p>
                            </fieldset>
                        </form>
                    </div>

                    <div class="col">
                        <form action="index.php" method="post" class="upload" enctype="multipart/form-data">
                            <input type="hidden" name="do" value="upload" />
                            <fieldset>
                                <legend>Upload new Version</legend>
                                <p>
                                    <label for="file">File:</label>
                                    <input type="file" name="file" />
                                </p>
                                <p class="hint">
                                    .tgz files *need* to contain a top directory named <code>dokuwiki-&lt;version&gt;</code>!
                                </p>
                                <p>
                                    <button type="submit" class="btn">Upload</button>
                                </p>
                            </fieldset>
                        </form>
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
    <?php include('ga.js')?>
</script>

</body>
</html>

