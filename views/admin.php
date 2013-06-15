<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Download DokuWiki</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Le styles -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="../style.css" rel="stylesheet">

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

    <div class="row">
        <div class="span6">
            <form action="index.php" method="post" class="admin form-horizontal">
                <input type="hidden" name="do" value="symlink">
                <fieldset>
                    <legend>Set Version Symlinks</legend>
                    <div class="control-group">
                        <label class="control-label" for="rc">RC</label>
                        <div class="controls">
                            <select id="rc" name="rc">
                                <option></option>
                                <?php $TPL->versionselect('rc'); ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="stable">stable</label>
                        <div class="controls">
                            <select id="stable" name="stable">
                                <option></option>
                                <?php $TPL->versionselect('stable'); ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="oldstable">oldstable</label>
                        <div class="controls">
                            <select id="oldstable" name="oldstable">
                                <option></option>
                                <?php $TPL->versionselect('oldstable'); ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <button type="submit" class="btn">Update</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>

        <div class="span6">
            <form action="index.php" method="post" class="upload" enctype="multipart/form-data">
                <input type="hidden" name="do" value="upload">
                <fieldset>
                    <legend>Upload new Version</legend>
                    <label>File:</label>
                    <input type="file" name="file">
                    <span class="help-block">.tgz files *need* to contain a top directory named <code>dokuwiki-&lt;version&gt;</code>!</span>
                    <button type="submit" class="btn">Upload</button>
                </fieldset>
            </form>
        </div>
    </div>
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

