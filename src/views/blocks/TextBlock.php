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

$tag     = $this->varValue('tag', 'div');
$content = $this->varValue('content', false);

$color     = $this->varValue('color');
$align     = $this->varValue('align');
$style     = $this->varValue('style');
$size      = $this->varValue('size');
$weight    = $this->varValue('weight');
$transform = $this->varValue('transform');

$invert = $this->cfgValue('invert', false);

$class = $this->cfgValue('divCssClass');


// Combine classes
$finalClasses = array_filter([$color, $align, $style, $size, $weight, $transform, $invert, $class]);

?>

<<?=$tag;?> class="<?= implode(" ", $finalClasses); ?>"><?= $content; ?></<?=$tag;?>>