<?php

$link = $this->varValue('link', '');

?>
<div class="uk-inline uk-margin uk-flex-center uk-flex-middle">
    <!-- <span class="uk-link uk-text-decoration-none uk-icon-button uk-padding uk-h1 uk-position-center" uk-toggle="target: +">‣</span>-->
    <video src="<?= $link; ?>" width="1920" height="1080" playsinline uk-video></video>
</div>