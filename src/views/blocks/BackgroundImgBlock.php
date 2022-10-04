<?php
/**
 * View file for block: ImageBlock
 *
 * @param $this->extraValue('image');
 * @param $this->varValue('align');
 * @param $this->varValue('showCaption');
 * @param $this->varValue('image');
 * @param $this->cfgValue('lazyload');
 *
 * @var $this \luya\cms\base\PhpBlockView
 */

$title       = $this->varValue('title', '');
$subtitle    = $this->varValue('subTitle', '');
$size        = $this->varValue('size', 'uk-background-cover');
$position    = $this->varValue('position', 'uk-background-center-center');
$height      = $this->varValue('height', 'medium');
$color       = $this->varValue('color', false);
$darkOrLight = $this->varValue('darkOrLight', false);
$image       = $this->extraValue('image', false);
$href     = '';

?>
<?php if ($image) : ?>
<div class="<?= $height; ?> <?= $darkOrLight; ?> uk-flex uk-flex-center uk-flex-middle" style="background: no-repeat center bottom / cover;" data-src="<?= $image->source ?>" uk-img>
    <div class="uk-text-center">
        <h4 class="<?= $color; ?> uk-h2 uk-text-bold"><?= $title; ?></h4>
        <div class="<?= $color; ?>"><?= $subtitle; ?></div>
    </div>
</div>
<?php endif; ?>