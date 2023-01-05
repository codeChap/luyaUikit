<?php

$heading     = $this->varValue('heading', false);
$subHeading  = $this->varValue('subHeading', false);
$linkLabel   = $this->varValue('linkLabel', 'VIEW MORE');

$link = $this->extraValue('linkData', '#');

?>

<?php if ($vid = $this->extraValue('video')) : ?>
<div id="vidWrapper" class="uk-inline uk-background-muted uk-width-expand">
    <video id="vid" autoplay muted loop class="uk-width-expand"><source src="<?= $this->extraValue('video')['source']; ?>"></video>
    <div class="uk-position-center-left uk-width-expand uk-text-center">
        <div class="uk-inline uk-light">
            <?php if ($heading) : ?><p class="uk-h1 uk-text-bold uk-margin-remove-bottom"><?= $heading; ?></p><?php endif; ?>
            <?php if($subHeading) : ?><p class="uk-h2 uk-margin-remove-top"><?= $subHeading; ?></p><?php endif; ?>
            <?php if($linkLabel) : ?><a href="<?= $link; ?>" class="uk-button uk-button-default"><?= $linkLabel; ?></a><?php endif; ?>
        </div>
    </div>
</div>
<?php endif; ?>