<?php
/**
 * View file for block: HeadingBlock
 *
 * @param $this->extraValue('title');
 * @param $this->extraValue('align');
 * @param $this->varValue('size');
 * @param $this->varValue('tag');
 * @param $this->varValue('color');
 * @param $this->cfgValue('divCssClass');
 *
 * @var $this \luya\uikit\BaseUikitBlock;
 */

 // Get variables
$title = $this->varValue('title', false);
$tag   = $this->varValue('tag', 1);

// Combine classes
$finalClasses = array_filter([
    $this->varValue('align', false),
    $this->varValue('size', 'uk-heading-large'),
    $this->varValue('weight', false),
    $this->varValue('transform', false),
    $this->varValue('color', false),
    $this->cfgValue('divCssClass', false),
    $this->cfgValue('invert', false)
]);

?>

<h<?=$tag;?> class="<?= implode(" ", $finalClasses); ?>"><?= $title; ?></h<?=$tag;?>>