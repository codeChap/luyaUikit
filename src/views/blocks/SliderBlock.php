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

?>

<!-- Slider -->
<div uk-slider>
    <div class="uk-position-relative">
        <div class="uk-slider-container uk-light">
            <ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-3@m uk-grid">
                <?php foreach($photos AS $p) : ?>
                <li>
                    <div class="item">
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
        <a class="uk-position-center-left-out" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
        <a class="uk-position-center-right-out" href="#" uk-slidenav-next uk-slider-item="next"></a>
    </div>
    </div>
    <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>
</div>