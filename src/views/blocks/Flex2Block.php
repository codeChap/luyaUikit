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

$leftColumnStyle = '';
if($background_image_left){
    $leftColumnStyle = 'style="background-image:url('.$background_image_left->source.'); background-size:cover; min-height:480px;"';
}

$container = 'uk-width-1-1';
if($this->varValue('container') != 'container-none'){
   $container = $this->varValue('container') ? 'uk-container uk-'.$this->varValue('container') : false;
}

// Build classes
$finalClasses = implode(' ', array_unique(array_filter([
    'uk-flex',
    'uk-flex-wrap',
    $container,
    $this->varValue('v_align', ''),
    $this->varValue('marginTop', ''),
    $this->varValue('marginBottom', ''),
    $this->cfgValue('rowDivClass', '')
])));

?>

<div class="<?= $finalClasses; ?>">
    <div class="<?= $leftColumnClasses; ?>@m" <?= $leftColumnStyle; ?> >
        <div class="<?= $leftColumnClassesBlock; ?>">
            <?= $this->placeholderValue('left'); ?>
        </div>
    </div>
    <div class="<?= $rightColumnClasses; ?>@m rhsBlock">
        <div class="<?= $rightColumnClassesBlock; ?> ">
            <?= $this->placeholderValue('right'); ?>
        </div>
    </div>
</div>