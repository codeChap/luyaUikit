<?php

namespace luya\uikit\blocks;
use luya\cms\base\PhpBlock;
use luya\uikit\Module;
use luya\cms\helpers\BlockHelper;
use luya\uikit\blockgroups\Uikitgroup;
use luya\uikit\BaseUikitBlock;

use luya\cms\injectors\LinkInjector;

//use luya\cms\frontend\blockgroups\MediaGroup;

final class BackgroundImgBlock extends BaseUikitBlock
{
    /**
     * @var string The module where this block belongs to in order to find the view files.
     */
    public $module = 'uikit';

    /**
     * @var bool Choose whether a block can be cached trough the caching component. Be carefull with caching container blocks.
     */
    public $cacheEnabled = true;

    /**
     * @var int The cache lifetime for this block in seconds (3600 = 1 hour), only affects when cacheEnabled is true
     */
    public $cacheExpiration = 3600;

    /**
     * @inheritDoc
     */
    public function blockGroup()
    {
        return UikitGroup::class;
    }

    /**
     * @inheritDoc
     */
    public function name()
    {
        return 'Background Image Block';
    }
    
    /**
     * @inheritDoc
     */
    public function icon()
    {
        return 'image'; // see the list of icons on: https://material.io/icons/
    }
 
    /**
     * @inheritDoc
     */
    public function config()
    {
        return 
        [
            'vars' => 
            [
                [
                    'var' => 'title',    'label' => Module::t('block_background_image.title'),    'type' => self::TYPE_TEXT],
                [
                    'var' => 'titleSize', 'label' => Module::t('block_background_image.title_size'), 'type' => self::TYPE_SELECT,
                    'options' => BlockHelper::selectArrayOption([
                        'uk-heading-small'   => Module::t('size_small'),
                        'uk-heading-medium'  => Module::t('size_medium'),
                        'uk-heading-large'   => Module::t('size_large'),
                        'uk-heading-xlarge'  => Module::t('size_xlarge'),
                        'uk-heading-2xlarge' => Module::t('size_2xlarge')
                    ])
                ],
                ['var' => 'subTitle', 'label' => Module::t('block_background_image.subTitle'), 'type' => self::TYPE_WYSIWYG],

                
                ['var' => 'image',    'label' => Module::t('block_background_image.image'),     'type' => self::TYPE_IMAGEUPLOAD, 'options' => ['no_filter' => false]],
                [
                    'var' => 'size', 'label' => Module::t('background_size'), 'type' => self::TYPE_SELECT,
                    'options' => BlockHelper::selectArrayOption([
                        'cover'   => Module::t('block_background_image.cover'),
                        'contain' => Module::t('block_background_image.contain'),
                    ])
                ],
                [
                    'var' => 'color', 'label' => Module::t('block_background_image.color'), 'type' => self::TYPE_SELECT,
                    'options' => BlockHelper::selectArrayOption([
                        '' => Module::t('block_background_image.none'),
                        'uk-text-primary'   => Module::t('block_background_image.primary'),
                        'uk-text-secondary' => Module::t('block_background_image.secondary'),
                        'uk-text-muted'     => Module::t('block_background_image.muted'),
                    ])
                ],
                [
                    'var' => 'darkOrLight', 'label' => Module::t('block_background_image.darkOrLight'), 'type' => self::TYPE_SELECT,
                    'options' => BlockHelper::selectArrayOption([
                        ''  => Module::t('block_background_image.none'),
                        'uk-dark'  => Module::t('block_background_image.light'),
                        'uk-light' => Module::t('block_background_image.dark'),
                    ])
                ],
                [
                    'var' => 'backPosition', 'label' => Module::t('block_background_image.position'), 'type' => self::TYPE_SELECT,
                    'options' => BlockHelper::selectArrayOption([
                        'top'    => Module::t('block_background_image.top'),
                        'bottom' => Module::t('block_background_image.bottom'),
                        'left'   => Module::t('block_background_image.left'),
                        'right'  => Module::t('block_background_image.right'),
                        'center' => Module::t('block_background_image.center'),
                    ])
                ],
                [
                    'var' => 'height', 'label' => 'Height', 'type' => self::TYPE_SELECT, 
                    'options' => BlockHelper::selectArrayOption([
                        'uk-height-small'  => Module::t('block_background_image.small'),
                        'uk-height-medium' => Module::t('block_background_image.medium'),
                        'uk-height-large'  => Module::t('block_background_image.large'),
                    ])
                ],
                [
                    'var' => 'padding', 'label' => 'Add vertical padding', 'type' => self::TYPE_SELECT, 
                    'options' => BlockHelper::selectArrayOption([
                        'uk-padding'       => Module::t('block_padding_small'),
                        'uk-padding-large' => Module::t('block_padding_large'),
                    ])
                ],
                [
                    'var' => 'placement', 'label' => 'Put content', 'type' => self::TYPE_SELECT, 
                    'options' => BlockHelper::selectArrayOption([
                        'center' => 'Center (Default)',
                        'left'   => 'Left',
                        'right'  => 'Right',
                    ])
                ],
                [
                    'var' => 'fixed', 'label' => 'Fixed background attachment', 'type' => self::TYPE_CHECKBOX
                ]
            ],
            'cfgs' => 
            [
                [
                    'var' => 'darken', 'label' => 'Darken Image', 'type' => self::TYPE_CHECKBOX
                ]
            ],
            'placeholders' => 
            [
                ['var' => 'content', 'cols' => 6, 'label' => ''],
            ]
        ];
    }

    /**
     * @inheritDoc
     */
    public function extraVars()
    {
        return [
            'image' => BlockHelper::imageUpload($this->getVarValue('image'), false, true),
        ];
    }

    /**
     * {@inheritDoc} 
     *
    */
    public function admin()
    {
        return '<div class="clearfix" style="
             background-image:url({{extras.image.source}});
             background-repeat:no-repeat;
             background-size:{{vars.size}};
             background-position:{{vars.backPosition}};
             position: absolute; top:0; left: 0;
             width: 100%;
             height: 100%;
             color:white;
            ">
            </div>
            ';
    }

    public function getFieldHelp()
    {
        return [
            'content' => 'Image',
        ];
    }
}