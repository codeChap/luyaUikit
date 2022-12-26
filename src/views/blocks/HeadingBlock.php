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

$title = $this->varValue('title', false);
$align = $this->varValue('align', false);
$size  = $this->varValue('size', 'uk-heading-large');
$tag   = $this->varValue('tag', 1);
$color = $this->varValue('color', false);

$class = $this->cfgValue('divCssClass', false);

// Combine classes
$finalClasses = array_filter([$align, $size, $color, $class]);

?>

<h<?=$tag;?> class="<?= implode(" ", $finalClasses); ?>"><?= $title; ?></h<?=$tag;?>>