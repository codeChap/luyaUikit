<?php

use yii\helpers\Html;

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

$title        = $this->varValue('title', '');
$subtitle     = $this->varValue('subTitle', '');
$size         = $this->varValue('size', 'cover');
$backPosition = $this->varValue('backPosition', 'center');
$height       = $this->varValue('height', 'medium');
$color        = $this->varValue('color', false);
$darkOrLight  = $this->varValue('darkOrLight', false);
$fixed        = $this->varValue('fixed', false);
$padding      = $this->varValue('padding', false);
$image        = $this->extraValue('image', false);
$linkLabel    = $this->varValue('linkLabel', 'Find out more');
$placement    = $this->varValue('placement', 'center');
$darken       = $this->cfgValue('darken', false);

$titleSize = $this->varValue('titleSize', 'uk-heading-medium');

if($darken){
    $darken = 'background-color:rgba(50,50,50,0.6)';
}else{
    $darken = '';
}

if($fixed){
    $fixed = 'fixed';
}else{
    $fixed = '';
}

?>
<?php if ($image) : ?>

    <?php ob_start(); ?>
    <p class="<?= $color; ?> <?= $titleSize; ?> <?= $darkOrLight; ?> "><?= $title; ?></p>
    <div class="<?= $color; ?> <?= $darkOrLight; ?> uk-text-large uk-padding-small"><?= $subtitle; ?></div>
    <?php if($this->extraValue('linkData')) : ?>
    <?= Html::a($linkLabel, $this->extraValue('linkData') ? $this->extraValue('linkData')->getHref() : '/', [
        'class'  => 'uk-button uk-button-large uk-button-primary uk-width-1-3',
        'target' => $this->extraValue('linkData')? $this->extraValue('linkData')->getTarget() : false,
    ]); ?>
    <?php endif; ?>
    <?php $content = ob_get_clean(); ?>

    <div class="backgroundImgBlock <?= $height; ?> <?= $padding; ?> uk-padding-remove-horizontal" style="background: no-repeat <?= $backPosition; ?> / <?= $size; ?> <?= $fixed; ?>;" data-src="<?= $image->source ?>" uk-img>
        <div style="<?= $darken; ?> height:inherit; z-index:0;" class="uk-flex uk-flex-wrap uk-flex-middle uk-flex-center uk-width-1-1">
            <div width="" style="width:inherit;">
                <?= $this->placeholderValue('content'); ?>
            </div>
        </div>
    </div>
<?php endif; ?>