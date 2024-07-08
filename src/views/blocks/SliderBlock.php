<?php
/**
 * View file for block: SliderBlock 
 *
 * File has been created with `block/create` command. 
 *
 *
 * @var \luya\cms\base\PhpBlockView $this
 */

$photos = $this->extraValue('photos', []);

$sliderClass     = false;
$sliderClasses   = [];
$sliderClasses[] = $this->varValue('margin', false);
$nav             = $this->varValue('nav', 'out');

if(count(array_filter($sliderClasses))){
    $sliderClass = 'class = "' . implode(' ', $sliderClasses) . '"';
}

$itemWidth = $this->varValue('width', false) ? ' uk-child-width-' . $this->varValue('width') . '@m ' : ' ';
$align = $this->varValue('align', false);
$valign = $this->varValue('valign', false);

if($valign == 'uk-flex-middle'){
    $valign = 'uk-flex-middle uk-flex-center';
}

?>

<!-- Slider -->
<div uk-slider <?= $sliderClass; ?>>
    <div class="uk-position-relative">
        <div class="uk-slider-container uk-light">
            <ul class="uk-slider-items uk-child-width-1-1<?= $itemWidth; ?>uk-grid">
                <?php foreach($photos AS $p) : ?>
                <li class="uk-flex <?= $valign; ?>">
                    <div class="item <?= $align; ?>">
                        <img data-src="<?= $p['source']; ?>" alt="<?= $p['caption']; ?>" uk-img>
                        <?php if( ! empty($p['caption']) ) : ?>
                        <div class="uk-position-center"><h1><?= $p['caption']; ?></h1></div>
                        <?php endif; ?>
                    </div>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <div>
        <a class="uk-position-center-left<?= $nav == 'out' ? '-out' : ''; ?>" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
        <a class="uk-position-center-right<?= $nav == 'out' ? '-out' : ''; ?>" href="#" uk-slidenav-next uk-slider-item="next"></a>
    </div>
    <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>
</div>