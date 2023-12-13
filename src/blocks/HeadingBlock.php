<?php

namespace luya\uikit\blocks;
use luya\cms\base\PhpBlock;
use luya\uikit\Module;
use luya\cms\helpers\BlockHelper;
use luya\uikit\blockgroups\Uikitgroup;
use luya\uikit\BaseUikitBlock;

//use luya\cms\frontend\blockgroups\MediaGroup;

final class HeadingBlock extends BaseUikitBlock
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
        return 'Heading';
    }
    
    /**
     * @inheritDoc
     */
    public function icon()
    {
        return 'format_size'; // see the list of icons on: https://material.io/icons/
    }
 
    /**
     * @inheritDoc
     */
    public function config()
    {
        return [
            'vars' => [
                ['var' => 'title', 'label' => Module::t('block_title'), 'type' => self::TYPE_TEXT],
                ['var' => 'align', 'label' => Module::t('block_align'), 'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption([
                    'uk-text-left'   => 'left',
                    'uk-text-center' => 'center',
                    'uk-text-right'  => 'right'
                    ])
                ],
                ['var' => 'size',  'label' => Module::t('block_size'),  'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption([
                    'uk-heading-small'   => 'Small',
                    'uk-heading-medium'  => 'Medium',
                    'uk-heading-large'   => 'Large',
                    'uk-heading-xlarge'  => 'X Large',
                    'uk-heading-2xlarge' => '2x Large'
                    ])
                ],
                ['var' => 'weight',  'label' => Module::t('block_weight'),  'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption([
                    'uk-text-light'   => 'Light',
                    'uk-text-normal'  => 'Normal',
                    'uk-text-bold'    => 'Bold',
                    'uk-text-lighter' => 'Lighter',
                    'uk-text-bolder'  => 'Bolder'
                    ])
                ],
                ['var' => 'transform', 'label' => Module::t('block_transform'),  'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption([
                    'uk-text-capitalize' => 'Capitalize',
                    'uk-text-uppercase'  => 'Uppercase',
                    'uk-text-lowercase'  => 'Lowercase',
                    ])
                ],
                ['var' => 'tag', 'label' => Module::t('block_tag'),  'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption([
                    '1' => 'h1',
                    '2' => 'h2',
                    '3' => 'h3',
                    '4' => 'h4',
                    '5' => 'h5',
                    '6' => 'h6',
                    ])
                ],
                ['var' => 'color', 'label' => Module::t('block_color'),  'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption([
                    'uk-text-muted'     => 'Muted',
                    'uk-text-emphasis'  => 'Emphasis',
                    'uk-text-primary'   => 'Primary',
                    'uk-text-secondary' => 'Secondary',
                    'uk-text-success'   => 'Success',
                    'uk-text-warning'   => 'Warning',
                    'uk-text-danger'    => 'Danger'
                    ])
                ],
            ],
            'cfgs' => [
                ['var' => 'divCssClass', 'label' => Module::t('block_additonal_css_class'), 'type' => self::TYPE_TEXT],
                ['var' => 'invert',      'label' => Module::t('block_invert'), 'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption([
                    'uk-light' => 'Light',
                    'uk-dark'  => 'Dark'
                    ])
                ],
            ]
        ];
    }

    /**
     * {@inheritDoc} 
     *
    */
    public function admin()
    {
        return '
        <div class="
         {% if vars.align == "uk-text-center" %}text-center{% endif %}
         {% if vars.align == "uk-text-right" %}text-right{% endif %}
         {% if vars.size  == "uk-heading-small" %}display-4{% endif %}
         {% if vars.size  == "uk-heading-medium" %}display-3{% endif %}
         {% if vars.size  == "uk-heading-large" %}display-2{% endif %}
         {% if vars.size  == "uk-heading-xlarge" %}display-1{% endif %}
         {% if vars.size  == "uk-heading-2xlarge" %}display-1{% endif %}
         "
         style="
         {% if vars.color == "uk-text-muted" %}color:rgb(153, 153, 153){% endif %}
         {% if vars.color == "uk-text-emphasis" %}color:rgb(34, 34, 34){% endif %}
         {% if vars.color == "uk-text-primary" %}color:rgb(30, 135, 240){% endif %}
         {% if vars.color == "uk-text-secondary" %}color:rgb(34, 34, 34){% endif %}
         {% if vars.color == "uk-text-success" %}color:rgb(50, 210, 150){% endif %}
         {% if vars.color == "uk-text-warning" %}color:rgb(250, 160, 90){% endif %}
         {% if vars.color == "uk-text-danger" %}color:rgb(240, 80, 110){% endif %}

         {% if vars.transform == "uk-text-capitalize" %}text-transform: capitalize;{% endif %}
         {% if vars.transform == "uk-text-uppercase" %}text-transform: uppercase;{% endif %}
         {% if vars.transform == "uk-text-lowercase" %}text-transform: lowercase;{% endif %}
         ">
            {{vars.title}}
        </div>';
    }

    public function getFieldHelp()
    {
        return [
            'content' => 'Heading Block',
        ];
    }
}