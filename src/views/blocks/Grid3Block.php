<?php

/**
 * @var $this \luya\cms\base\PhpBlockView
 */

$leftColumnClass = implode(' ', array_filter([
    $this->varValue('width_left', false) ? 'uk-width-'.$this->varValue('width_left') : 'uk-width-1-2',
]));

$middleColumnClass = implode(' ', array_filter([
    $this->varValue('width_middle', false) ? 'uk-width-'.$this->varValue('width_middle') : 'uk-width-1-2',
]));

$rightColumnClass = implode(' ', array_filter([
    $this->varValue('width_right', false) ? 'uk-width-'.$this->varValue('width_right') : 'uk-width-1-2',
]));

$leftColumnClassesBlock  = $this->cfgValue('leftColumnClassesBlock', false);
$middleColumnClassesBlock  = $this->cfgValue('middleColumnClassesBlock', false);
$rightColumnClassesBlock = $this->cfgValue('rightColumnClassesBlock', false);

// Get left side alignment
$v_align_left = 'uk-flex uk-flex-column uk-flex-center';
if ($this->varValue('v_align_left', false)) {
    switch($this->varValue('v_align_left')){
        case 'uk-flex-top':
            $valign = 'uk-flex uk-flex-column uk-flex-top';
        break;
        case 'uk-flex-bottom':
            $valign = 'uk-flex uk-flex-bottom';
        break;
    }
}

// Middle alignment
$v_align_middle = 'uk-flex uk-flex-column uk-flex-center';
if ($this->varValue('v_align_middle', false)) {
    switch($this->varValue('v_align_middle')){
        case 'uk-flex-top':
            $valign = 'uk-flex uk-flex-column uk-flex-top';
        break;
        case 'uk-flex-bottom':
            $valign = 'uk-flex uk-flex-bottom';
        break;
    }
}

// Get right side alignment
$v_right_left = 'uk-flex uk-flex-column uk-flex-center';
if ($this->varValue('v_align_right', false)) {
    switch($this->varValue('v_align_right')){
        case 'uk-flex-top':
            $valign = 'uk-flex uk-flex-column uk-flex-top';
        break;
        case 'uk-flex-bottom':
            $valign = 'uk-flex uk-flex-bottom';
        break;
    }
}

$containLeft   = $this->varValue('contain_left',   false) == 1 ? true : false;
$containMiddle = $this->varValue('contain_middle', false) == 1 ? true : false;
$containRight  = $this->varValue('contain_right',  false) == 1 ? true : false;

?>

<div class="uk-grid" uk-grid>

    <div class="<?= $leftColumnClass; ?>@m <?= $v_align_left; ?> lhsBlock">
        <?php if($containLeft) : ?>
        <div class="uk-flex" uk-scrollspy="target: > *; cls: uk-animation-fade; delay: 300">
            <div class="uk-width-1-3 uk-visible@s">&nbsp;</div>
            <div class="uk-width-expand"><?= $this->placeholderValue('left'); ?></div>
        </div>
        <?php else : ?>
            <div class="uk-text-center"><?= $this->placeholderValue('left'); ?></div>
        <?php endif; ?>
    </div>

    <div class="<?= $middleColumnClass; ?>@m <?= $v_align_middle; ?> mhsBlock">
        <?php if($containMiddle) : ?>
        <div class="uk-flex" uk-scrollspy="target: > *; cls: uk-animation-fade; delay: 300">
            <div class="uk-width-1-3 uk-visible@s">&nbsp;</div>
            <div class="uk-width-expand"><?= $this->placeholderValue('middle'); ?></div>
        </div>
        <?php else : ?>
            <div class="uk-text-center"><?= $this->placeholderValue('middle'); ?></div>
        <?php endif; ?>
    </div>

    <div class="<?= $rightColumnClass; ?>@m <?= $v_right_left; ?> rhsBlock">
        <?php if($containRight) : ?>
        <div class="uk-flex" uk-scrollspy="target: > *; cls: uk-animation-fade; delay: 300">
        <div class="uk-width-expand"><?= $this->placeholderValue('right'); ?></div>
            <div class="uk-width-1-3 uk-visible@s">&nbsp;</div>
        </div>
        <?php else : ?>
            <div class="uk-text-center"><?= $this->placeholderValue('right'); ?></div>
        <?php endif; ?>
    </div>
</div>