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

$titleSize = $this->varValue('titleSize', 'uk-heading-medium');

?>
<?php if ($image) : ?>
    <div class="backgroundImgBlock <?= $height; ?> <?= $darkOrLight; ?> uk-flex" style="background: no-repeat center bottom / cover;" data-src="<?= $image->source ?>" uk-img>
        <div style="background-color:rgba(50,50,50,0.6); width:100%; height:inherit; z-index:0;" class="<?= $height; ?> uk-flex uk-flex-center uk-flex-middle">
            <div class="uk-text-center">
                <p class="<?= $color; ?> <?= $titleSize; ?>"><?= $title; ?></p>
                <div class="<?= $color; ?> uk-text-large"><?= nl2br($subtitle); ?></div>
            </div>
        </div>
    </div>
<?php endif; ?>