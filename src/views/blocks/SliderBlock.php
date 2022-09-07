<?php
/**
 * View file for block: SliderBlock 
 *
 * File has been created with `block/create` command. 
 *
 *
 * @var \luya\cms\base\PhpBlockView $this
 */
?>

<!-- Slider -->
<div uk-slider>
    <div class="uk-position-relative">
        <div class="uk-slider-container">
            <ul class="uk-slider-items">
                
                <li class="uk-width-1-1">
                    <div class="uk-inline uk-width-1-1">
                        <div class="uk-container">
                            <div class="uk-flex uk-flex-wrap uk-flex-bottom uk-child-width-1-1 uk-child-width-1-2@m">
                                <div class="uk-text-center"><img data-src="<?= $this->publicHtml; ?>/girl.png" uk-img></div>
                                <div class="uk-flex uk-flex-middle" style="height:500px;">
                                    <div class="uk-light uk-text-center uk-text-left@m uk-padding">
                                        <div>Our Values</div>
                                        <h2 class="uk-margin-small">Accountability</h2>
                                        <div>We employ great people and empowerthem to get it right first time.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="uk-background-primary uk-position-bottom-center" style="width:100%; height:500px; z-index:-1;"></div>
                    </div>
                </li>

                <li class="uk-width-1-1">
                    <div class="uk-inline uk-width-1-1">
                        <div class="uk-container">
                            <div class="uk-flex uk-flex-wrap uk-flex-bottom uk-child-width-1-1 uk-child-width-1-2@m">
                                <div class="uk-text-center"><img data-src="<?= $this->publicHtml; ?>/girl.png" uk-img></div>
                                <div class="uk-flex uk-flex-middle" style="height:500px;">
                                    <div class="uk-light uk-text-center uk-text-left@m uk-padding">
                                        <div>Our Values</div>
                                        <h2 class="uk-margin-small">Collaboration</h2>
                                        <div>We create a culture where the team is greater than the individual.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="uk-background-primary uk-position-bottom-center" style="width:100%; height:500px; z-index:-1;"></div>
                    </div>
                </li>

                <li class="uk-width-1-1">
                    <div class="uk-inline uk-width-1-1">
                        <div class="uk-container">
                            <div class="uk-flex uk-flex-wrap uk-flex-bottom uk-child-width-1-1 uk-child-width-1-2@m">
                                <div class="uk-text-center"><img data-src="<?= $this->publicHtml; ?>/girl.png" uk-img></div>
                                <div class="uk-flex uk-flex-middle" style="height:500px;">
                                    <div class="uk-light uk-text-center uk-text-left@m uk-padding">
                                        <div>Our Values</div>
                                        <h2 class="uk-margin-small">Transformation</h2>
                                        <div>We harness technology & innovation to influence change in our business and markets.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="uk-background-primary uk-position-bottom-center" style="width:100%; height:500px; z-index:-1;"></div>
                    </div>
                </li>

            </ul>
        </div>
        <div class="uk-light">
            <div class="uk-position-bottom-left uk-flex uk-flex-middle" style="height:500px;">
                <a uk-slidenav-previous uk-slider-item="previous"><a>
            </div>
            <div class="uk-position-bottom-right uk-flex uk-flex-middle" style="height:500px;">
                <a uk-slidenav-next uk-slider-item="next"></a>
            </div>
        </div>
    </div>
    <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>
</div>