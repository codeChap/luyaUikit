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

$size         = $this->varValue('size', 'cover');
$backPosition = $this->varValue('backPosition', 'center');
$height       = $this->varValue('height', 'medium');
$fixed        = $this->varValue('fixed', false);
$padding      = $this->varValue('padding', false);
$image        = $this->extraValue('image', false);

$placement    = $this->varValue('placement', 'center');
$darken       = $this->varValue('darken', false);

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

$heightStyle = false;
if($height == 'vp'){
    $height = false;
    $heightStyle = 'height:100vh;';
}

// Break up camelCase word
$backPosition = strtolower(preg_replace('/(?<!^)[A-Z]/', ' $0', $backPosition));

?>
<?php if ($image) : ?>
    <div class="backgroundImgBlock <?= $height; ?> <?= $padding; ?> uk-padding-remove-horizontal" style="background: no-repeat <?= $backPosition; ?> / <?= $size; ?> <?= $fixed; ?>; <?= $heightStyle; ?>" data-src="<?= $image->source ?>" uk-img>
        <div style="<?= $darken; ?> height:inherit; z-index:0;" class="uk-flex uk-flex-wrap uk-flex-middle uk-flex-center uk-width-1-1">
            <div style="width:inherit;">
                <?= $this->placeholderValue('content'); ?>
            </div>
        </div>
    </div>
<?php endif; ?>