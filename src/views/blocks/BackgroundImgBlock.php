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

$title    = $this->varValue('title', '');
$subtitle = $this->varValue('subTitle', '');
$size     = $this->varValue('size', 'uk-background-cover');
$position = $this->varValue('position', 'uk-background-center-center');
$height   = $this->varValue('height', 'medium');
$image    = $this->extraValue('image', false);
$href     = '';

?>
<?php if ($image) : ?>
<div class="uk-light">
    <div>
        <div class="<?= $position; ?> <?= $height; ?> <?= $size; ?> uk-panel uk-flex uk-flex-center uk-flex-middle" style="background-image: url(<?= $image->source ?>);">
            <a href="" class="uk-display-block uk-text-center">
                <div class="uk-h2"><?= $title; ?></div>
                <div class="uk-h6"><?= $subtitle; ?></div>
            </a>
        </div>
    </div>
</div>
<?php endif; ?>