<?php

// Find slides
$slides = array_filter([
    $this->placeholderValue('s1'),
    $this->placeholderValue('s2'),
    $this->placeholderValue('s3'),
    $this->placeholderValue('s4'),
    $this->placeholderValue('s5'),
    $this->placeholderValue('s6')
]);

$height = $this->cfgValue('height', false) ? 'min-height:'.$this->cfgValue('height').'; max-height:' . $this->cfgValue('height', false).';' : false;

$backgroundColor = $this->varValue('background_color', false) ?? 'uk-background-default';

$classes = implode(' ', array_filter([
    $this->varValue('dark_light', false) ?? false,
    $this->cfgValue('divCssClass', false) ?? false
]));

?>

<div uk-slideshow="animation: slide;<?= $height; ?>">
    <div class="uk-position-relative uk-visible-toggle <?= $backgroundColor; ?> <?= $classes; ?>" tabindex="-1">
        <ul class="uk-slideshow-items">
            <?php foreach($slides AS $slde) : ?>
            <li class="uk-padding">
                <?= $slde; ?>
            </li>
            <?php endforeach; ?>
        </ul>
        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
    </div>
    <ul class="uk-slideshow-nav uk-dotnav uk-flex-center uk-margin"></ul>
</div>