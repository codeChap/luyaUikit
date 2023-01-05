<?php

/**
 * @var $this \luya\cms\base\PhpBlockView
 */

$leftColumnClasses = implode(' ', array_filter([
    $this->varValue('width_left', false) ? 'uk-width-'.$this->varValue('width_left') : 'uk-width-1-2',
    $this->cfgValue('rowDivClass', false)
]));

$rightColumnClasses = implode(' ', array_filter([
    $this->varValue('width_right', false) ? 'uk-width-'.$this->varValue('width_right') : 'uk-width-1-2',
    $this->cfgValue('rightColumnClasses')
]));

// Build classes
$finalClasses = implode(' ', array_unique(array_filter([
    $this->varValue('v_align', false) ?? 'uk-flex-top',
    $this->varValue('container', false) ? 'uk-container' : false,
    $this->varValue('container', false) ?? false,
])));

?>
<div uk-grid class="<?= $finalClasses; ?> uk-margin-auto">
    <div class="<?= $leftColumnClasses; ?>">
        <?= $this->placeholderValue('left'); ?>
    </div>
    <div class="<?= $rightColumnClasses; ?>">
        <?= $this->placeholderValue('right'); ?>
    </div>
</div>