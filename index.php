<?php
define('VIEW_PATH',dirname('.').'/views/');
$host = $_SERVER['SCRIPT_NAME'];
$configArr = require("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Laravel Cheat Sheet , Codes , function , methods of laravel framework">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="@summer">
    <title>Yii 1.x && 2.x LTS </title>
    <link rel="stylesheet" href="web/css/normalize.css" />
    <link rel="stylesheet" href="web/css/foundation.min.css" />
    <link rel="stylesheet" href="web/css/font-awesome.min.css" />
    <link rel="stylesheet" href="web/css/page.css" />
</head>
<body>

<div class="off-canvas-wrapper wrapper-container">
    <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>

        <div class="off-canvas position-left sidebar-canvas" id="offCanvasLeft" data-off-canvas data-position="left">
            <button class="close-button" aria-label="Close menu" type="button" data-close>
                <span aria-hidden="true">&times;</span>
            </button>
            <ul class="mobile-ofc vertical menu">
                <li>
                    <button class="warning hollow button check-all-button">All</button>
                </li>
                <li>
                    <ul class="submenu menu vertical mobile-cmd-cell" data-submenu>
                    </ul>
                </li>
            </ul>
        </div>

        <div class="off-canvas-content" data-off-canvas-content>
            <div class="title-bar hide-for-medium">
                <div class="title-bar-left">
                    <button class="menu-icon" type="button" data-open="offCanvasLeft"></button>
                </div>
            </div>
        </div>

        <a href="#top" id="top-button" title="Top"><i class="icon-arrow-up"></i></a>
        <a href="#" class="comments-toggle"><i class="icon-eye-close"></i></a>

        <div class="row full-width">

            <div class="large-2 columns code-column sidebar">
                <h5 class="sidebar-title">Yii 1.x && 2.x LTS </h5>
                <hr class="horizonal-line">
                <ul class="sidebar-top-menu">
                <?php foreach($configArr['folders'] as $k=>$folder):?>
                    <li>
                        <a <?php if($configArr['category'] == $folder): ?> class="active-top-link" <?php endif;?> href="<?php echo $host.'?r='.$folder;?>">
                            <?php echo str_replace('_', ' ', $folder);?>
                        </a>
                    </li>
                <?php endforeach;?>
                </ul>
                <hr class="horizonal-line">
                <div class="show-for-medium">
					<form method="post" action="">
						<button class="warning hollow button check-all-button">All</button>
					</form>
                    <div class="clearfix"></div>
                    <ul class="sidebar-menu">
                    </ul>

                    <div class="clearfix"></div>

                    <hr class="horizonal-line">
                </div>
				<form method="post" action="">
						<input type="text" name="search" value="<?php echo isset($_POST['search'])?$_POST['search']:'';?>" />
						<button id = "search" class="segreen hollow button check-all-button">Search</button>
				</form>
            </div>
            <div class="large-10 columns code-column code-container">
                <div class="grid">
                    <?php foreach($configArr['files'] as $k=>$v):?>
                        <section class="cmd-description grid-item">
                            <h4><a name="<?php echo $filename = pathinfo($v)['filename'];?>" href="#<?php echo $filename;?>" target="_blank"><?php echo str_replace('_',' ',$filename);?></a> <a><i class="icon-file-text"></i></a></h4>
						<pre class="prettyprint lang-php">
							<?php include(VIEW_PATH.$configArr['category'].'/'.$v);?>
						</pre>
                        </section>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script src="web/js/jquery.js"></script>
<script src="web/js/jquery.highlight-4.js"></script>
<script src="web/js/prettify.js"></script>
<script src="web/js/foundation.min.js"></script>
<script src="web/js/masonry.js"></script>
<script src="web/js/app.js"></script>

</body>
</html>