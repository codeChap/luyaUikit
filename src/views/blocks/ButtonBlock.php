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

use yii\helpers\Html;

$title     = $this->varValue('title', 'Find out more');
$style     = $this->varValue('style', 'uk-button-default');
$size      = $this->varValue('size', false);
$transform = $this->varValue('transform', false);
$align     = $this->varValue('align', false);
$rounded   = $this->varValue('rounded', false) == true ? 'uk-border-rounded' : false;
$chevron   = $this->varValue('chevron', false) == true ? true : false;
$class     = $this->cfgValue('divCssClass');
$page      = $this->cfgValue('page', false);

// Combine classes
$finalClasses = array_filter(['uk-button', $style, $size, $transform, $rounded, $class]);

?>
<?php if($align) : ?><div class="<?= $align; ?>"><?php endif; ?>
    <?= Html::a($this->varValue('title'), $this->extraValue('linkData') ? $this->extraValue('linkData')->getHref() : '/', [
        'class'  => $finalClasses,
        'target' => $this->extraValue('linkData')? $this->extraValue('linkData')->getTarget() : false,
    ]); ?>
    <?php if($chevron) : ?>
        <a href="<?= $this->extraValue('linkData') ? $this->extraValue('linkData')->getHref() : '/'; ?>" class="uk-icon-button" uk-icon="icon: chevron-right"></a>
    <?php endif; ?>
    <?php if($align) : ?></div><?php endif; ?>