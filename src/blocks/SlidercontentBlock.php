<?php

namespace luya\uikit\blocks;
use luya\cms\base\PhpBlock;
use luya\uikit\Module;
use luya\cms\helpers\BlockHelper;
use luya\uikit\blockgroups\Uikitgroup;
use luya\uikit\BaseUikitBlock;

//use luya\cms\frontend\blockgroups\MediaGroup;

final class SlidercontentBlock extends BaseUikitBlock
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
        return 'Slider Content';
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
            'vars' => [
                [
                    'var' => 'backgroundColor', 'label' => 'Background Color',  'type' => self::TYPE_COLOR
                ],
                ['var' => 'dark_light', 'label' => Module::t('Dark / Light'), 'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption([
                        'uk-light'   => 'Light',
                        'uk-dark'   => 'Dark',
                    ])
                ],
            ],
            'cfgs' => [
                ['var' => 'divCssClass', 'label' => Module::t('block_additonal_css_class'), 'type' => self::TYPE_TEXT],
                ['var' => 'height', 'label' => Module::t('height in px'), 'type' => self::TYPE_NUMBER],
            ],
            'placeholders' => [
                [
                    ['var' => 's1', 'cols' => 6, 'label' => 'Slide A'],
                    ['var' => 's2', 'cols' => 6, 'label' => 'Slide B'],
                    ['var' => 's3', 'cols' => 6, 'label' => 'Slide C'],
                    ['var' => 's4', 'cols' => 6, 'label' => 'Slide D'],
                    ['var' => 's5', 'cols' => 6, 'label' => 'Slide E'],
                    ['var' => 's6', 'cols' => 6, 'label' => 'Slide F']
                ]
            ],
        ];
    }
    
    /**
     * {@inheritDoc} 
     *
    */
    public function admin()
    {
        return '';
    }

    public function getFieldHelp()
    {
        return [
            'content' => 'Slider',
        ];
    }
}