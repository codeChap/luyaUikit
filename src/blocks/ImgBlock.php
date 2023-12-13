<?php

namespace luya\uikit\blocks;
use luya\cms\base\PhpBlock;
use luya\uikit\Module;
use luya\cms\helpers\BlockHelper;
use luya\uikit\blockgroups\Uikitgroup;
use luya\uikit\BaseUikitBlock;

//use luya\cms\frontend\blockgroups\MediaGroup;

final class ImgBlock extends BaseUikitBlock
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
        return 'Image';
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
        return [
            'vars' => [
                ['var' => 'image', 'label' => Module::t('block_image.image'), 'type' => self::TYPE_IMAGEUPLOAD, 'options' => ['no_filter' => false]],
                ['var' => 'align', 'label' => Module::t('block_image.align'), 'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption(['left' => Module::t('block_image.align_left'), 'center' => Module::t('block_image.align_center'), 'right' => Module::t('block_image.align_right')])],
                ['var' => 'width', 'label' => 'Width', 'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption([
                    'uk-width-1-1' => '100%',
                    'uk-width-1-2' => '50%',
                    'uk-width-1-3' => '1/3',
                    'uk-width-2-3' => '2/3',
                    'uk-width-1-4' => '1/4',
                    'uk-width-2-4' => '2/4',
                    'uk-width-3-4' => '3/4',
                    'uk-width-1-5' => '1/5',
                    'uk-width-2-5' => '2/5',
                    'uk-width-3-5' => '3/5',
                    'uk-width-4-5' => '4/5',
                    'uk-width-1-6' => '1/6',
                    'uk-width-5-6' => '5/6'
                    ])
                ],
                ['var' => 'showCaption', 'label' => Module::t('block_image.show_caption'), 'type' => self::TYPE_CHECKBOX],
            ],
            'cfgs' => [
                ['var' => 'divCssClass', 'label' => Module::t('block_additonal_css_class'), 'type' => self::TYPE_TEXT],
                ['var' => 'lazyload', 'label' => Module::t('block_image.lazyload'), 'type' => self::TYPE_CHECKBOX]
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