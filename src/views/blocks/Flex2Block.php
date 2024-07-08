<?php

/**
 * @var $this \luya\cms\base\PhpBlockView
 */

$leftColumnClasses = implode(' ', array_filter([
    $this->varValue('width_left', false) ? 'uk-width-'.$this->varValue('width_left') : 'uk-width-1-2',
]));

$rightColumnClasses = implode(' ', array_filter([
    $this->varValue('width_right', false) ? 'uk-width-'.$this->varValue('width_right') : 'uk-width-1-2',
]));

$leftColumnClassesBlock  = $this->cfgValue('leftColumnClassesBlock', false);
$rightColumnClassesBlock = $this->cfgValue('rightColumnClassesBlock', false);

$background_image_left = $this->extraValue('background_image_left', false);
$background_image_right = $this->extraValue('background_image_right', false);

$leftColumnStyle = '';
if($background_image_left){
    $leftColumnStyle = 'style="background-image:url('.$background_image_left->source.'); background-size:cover; min-height:480px;"';
}
$rightColumnStyle = '';
if($background_image_right){
    $backgroundImageRightPos = $this->varValue('background_image_right_position', 'center center');

    // Break up camelCase word
    $backgroundImageRightPos = strtolower(preg_replace('/(?<!^)[A-Z]/', ' $0', $backgroundImageRightPos));

    $rightColumnStyle = 'style="background-image:url('.$background_image_right->source.'); background-size:cover; background-position:' . $backgroundImageRightPos . '; min-height:480px;"';
}

$container = 'uk-width-1-1';
if($this->varValue('container') != 'container-none'){
   $container = $this->varValue('container') ? $this->varValue('container') : false;
}

$style = '';
if($backgroundColor = $this->varValue('backgroundColor', false)){
    $style = 'style="background-color:'.$backgroundColor.';"';
}


// Build classes
$finalClasses = implode(' ', array_unique(array_filter([
    'uk-flex',
    'uk-flex-wrap',
    $container,
    $this->varValue('v_align', ''),
    $this->varValue('marginTop', ''),
    $this->varValue('marginBottom', ''),
    $this->varValue('marginLeft', ''),
    $this->varValue('marginRight', ''),
    $this->cfgValue('rowDivClass', '')
])));

?>

<div class="<?= $finalClasses; ?>" <?= $style; ?>>
    <div class="<?= $leftColumnClasses; ?>@m" <?= $leftColumnStyle; ?> >
        <div class="<?= $leftColumnClassesBlock; ?>">
            <?= $this->placeholderValue('left'); ?>
        </div>
    </div>
    <div class="<?= $rightColumnClasses; ?>@m rhsBlock">
        <div class="<?= $rightColumnClassesBlock; ?> " <?= $rightColumnStyle; ?>>
            <?= $this->placeholderValue('right'); ?>
        </div>
    </div>
</div>