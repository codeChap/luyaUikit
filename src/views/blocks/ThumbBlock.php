<?php

use luya\cms\helpers\BlockHelper;

$image = BlockHelper::imageUpload($this->varValue('image'), false, true);
$title = $this->varValue('title');

?>

<div style="position: relative; width: 100%; height: auto;" uk-height-match>
    <img data-src="<?= $image->source; ?>" alt="<?= $title; ?>" style="width: 100%; height: auto;" uk-img />
    <div style="position: absolute; top: 0; left: 0; width:100%;" class="uk-flex uk-flex-center uk-flex-middle">
        <div style="color: white; font-size: 22px; font-weight: bold;"><?= $title; ?></div>
    </div>
</div>