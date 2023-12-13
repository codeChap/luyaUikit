<?php

$heading     = $this->varValue('heading', false);
$subHeading  = $this->varValue('subHeading', false);
$linkLabel   = $this->varValue('linkLabel', 'VIEW MORE');

$hideOnMobile = $this->cfgValue('hideOnMobile', false) ? 'uk-visible@m' : false;
$dontLoadVid  = $this->cfgValue('dontLoadVid', false);

$image        = $this->extraValue('image');

$link = $this->extraValue('linkData', '#');

?>

<?php if ($vid = $this->extraValue('video')) : ?>
<div class="vidWrapper uk-visible@m uk-background-secondary" style="position: relative; overflow:hidden;" uk-height-viewport="offset-top:true;">
    <video id="vid" autoplay muted loop class="<?= $hideOnMobile; ?>" data-src="<?= $this->extraValue('video')['source']; ?>" style="object-fit:cover; position:absolute; height:100%; width:100%;">
        <?php if($dontLoadVid == false) : ?>
        <source src="<?= $this->extraValue('video')['source']; ?>">
        <?php endif; ?>
    </video>
    <div class="uk-position-center uk-width-expand uk-text-center">
        <div class="uk-inline uk-light">
            <?php if ($heading) : ?><p class="uk-h1 uk-text-bold uk-margin-remove-bottom"><?= $heading; ?></p><?php endif; ?>
            <?php if($subHeading) : ?><p class="uk-h2 uk-margin-remove-top"><?= $subHeading; ?></p><?php endif; ?>
            <?php if($linkLabel) : ?><a href="<?= $link; ?>" class="uk-button uk-button-default"><?= $linkLabel; ?></a><?php endif; ?>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if ($vid = $this->extraValue('video')) : ?>
<div class="uk-inline uk-hidden@m uk-background-secondary">
    <div class="uk-height-medium" style="background-image:url(<?= $image->source; ?>); background-size:cover; background-position:center; width:100vw;"></div>
    <div class="uk-position-center uk-width-expand uk-text-center">
        <div class="uk-inline uk-light">
            <?php if ($heading) : ?><p class="uk-h1 uk-text-bold uk-margin-remove-bottom"><?= $heading; ?></p><?php endif; ?>
            <?php if($subHeading) : ?><p class="uk-h2 uk-margin-remove-top"><?= $subHeading; ?></p><?php endif; ?>
            <?php if($linkLabel) : ?><a href="<?= $link; ?>" class="uk-button uk-button-default"><?= $linkLabel; ?></a><?php endif; ?>
        </div>
    </div>
</div>
<?php endif; ?>