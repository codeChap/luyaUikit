<?php

namespace luya\uikit\blocks;
use luya\cms\base\PhpBlock;
use luya\uikit\Module;
use luya\cms\helpers\BlockHelper;
use luya\cms\frontend\blockgroups\MediaGroup;

class BackgroundImgBlock extends PhpBlock
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
        return MediaGroup::class;
    }

    /**
     * @inheritDoc
     */
    public function name()
    {
        return 'Backlground Image Block';
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
                ['var' => 'title',    'label' => Module::t('block_background_image.title'),    'type' => self::TYPE_TEXT],
                ['var' => 'subTitle', 'label' => Module::t('block_background_image.subTitle'), 'type' => self::TYPE_TEXT],
                ['var' => 'image',    'label' => Module::t('block_background_image.size'),     'type' => self::TYPE_IMAGEUPLOAD, 'options' => ['no_filter' => false]],
                [
                    'var' => 'size',     'label' => Module::t('block_background_image.image'), 'type' => self::TYPE_SELECT,
                    'options' => BlockHelper::selectArrayOption([
                        'uk-background-cover'      => Module::t('block_background_image.cover'),
                        'uk-background-contain'    => Module::t('block_background_image.contain'),
                        'uk-background-width-1-1'  => Module::t('block_background_image.100Width'),
                        'uk-background-height-1-1' => Module::t('block_background_image.100Height'),
                    ])
                ],
                [
                    'var' => 'align', 'label' => Module::t('block_background_image.position'), 'type' => self::TYPE_SELECT,
                    'options' => BlockHelper::selectArrayOption([
                        'top-left'          => Module::t('block_background_image.topLeft'),
                        'top-center'        => Module::t('block_background_image.topCenter'),
                        'top-right'         => Module::t('block_background_image.topRight'),
                        'top-center-left'   => Module::t('block_background_image.centerLeft'),
                        'top-center-center' => Module::t('block_background_image.centerCenter'),
                        'top-center-right'  => Module::t('block_background_image.centerRight'),
                        'top-bottom-left'   => Module::t('block_background_image.bottomLeft'),
                        'top-bottom-center' => Module::t('block_background_image.bottomCenter'),
                        'top-bottom-right'  => Module::t('block_background_image.bottomRight'),
                    ])
                ],
                [
                    'var' => 'height', 'label' => 'Height', 'type' => self::TYPE_SELECT, 
                    'options' => BlockHelper::selectArrayOption([
                        'uk-height-small'  => Module::t('block_background_image.small'),
                        'uk-height-medium' => Module::t('block_background_image.medium'),
                        'uk-height-large'  => Module::t('block_background_image.large'),
                    ])
                ]
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
        return '<div class="clearfix" {% if vars.align == \'center\' %}style="text-align: center;"{% endif %}>
                    <div style="display: inline-block; max-width: 80%; {% if vars.align == \'left\' %} float: left;{% elseif vars.align == \'right\' %} float: right;{% endif %}">
                        <div>
                            <img src="{{extras.image.source}}" class="img-fluid" alt="" />
                        </div>
                        {% if vars.showCaption and extras.image.caption %}
                            <p class="text-muted"><small>{{extras.image.caption}}</small></p>
                        {% endif %}
                    </div>
                </div>';
    }

    public function getFieldHelp()
    {
        return [
            'content' => 'Image',
        ];
    }
}