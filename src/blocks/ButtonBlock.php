<?php

namespace luya\uikit\blocks;
use luya\cms\base\PhpBlock;
use luya\uikit\Module;
use luya\cms\helpers\BlockHelper;
use luya\uikit\blockgroups\Uikitgroup;
use luya\uikit\BaseUikitBlock;
use luya\cms\injectors\LinkInjector;

//use luya\cms\frontend\blockgroups\MediaGroup;

final class ButtonBlock extends BaseUikitBlock
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
        return 'Button';
    }
    
    /**
     * @inheritDoc
     */
    public function icon()
    {
        return 'crop_16_9'; // see the list of icons on: https://material.io/icons/
    }

    /**
     * @inheritdoc
     */
    public function injectors()
    {
        return [
            'linkData' => new LinkInjector([
                'varLabel' => Module::t('block_button_link'),
            ]),
        ];
    }
 
    /**
     * @inheritDoc
     */
    public function config()
    {
        return [
            'vars' => [
                ['var' => 'title', 'label' => Module::t('block_button.title'), 'type' => self::TYPE_TEXT],
                ['var' => 'style', 'label' => Module::t('block_button.style'),  'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption([
                    'uk-button-default'   => 'Default',
                    'uk-button-primary'   => 'Primary',
                    'uk-button-secondary' => 'Secondary',
                    'uk-button-danger'    => 'Danger',
                    'uk-button-link'      => 'Link',
                    ])
                ],
                ['var' => 'align', 'label' => Module::t('block_button.align'), 'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption([
                    'uk-text-left'   => 'Left',
                    'uk-text-center' => 'Center',
                    'uk-text-right'  => 'Right'
                    ])
                ],
                ['var' => 'size', 'label' => Module::t('block_button.size'),  'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption([
                    'uk-button-small'   => 'Small',
                    'uk-button-large'   => 'Large',
                    ])
                ],
                ['var' => 'transform', 'label' => Module::t('block_button.transform'),  'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption([
                    'uk-text-capitalize' => 'Capitalize',
                    'uk-text-uppercase'  => 'Uppercase',
                    'uk-text-lowercase'  => 'Lowercase',
                    ])
                ],
            ],
            'cfgs' => [
                ['var' => 'divCssClass', 'label' => Module::t('block_additonal_css_class'), 'type' => self::TYPE_TEXT],
            ]
        ];
    }

    /**
     * {@inheritDoc} 
    */
    public function admin()
    {
        return '
        <div style="width:100%;" class="
         {% if vars.align == "uk-text-center" %}text-center{% endif %}
         {% if vars.align == "uk-text-right" %}text-right{% endif %}
        ">
            <div
            style="
            margin: 0;
            border: none;
            overflow: visible;
            font: inherit;
            font-size: inherit;
            line-height: inherit;
            color: inherit;
            text-transform: none;
            -webkit-appearance: none;
            border-radius: 0;
            display: inline-block;
            box-sizing: border-box;
            padding: 0 30px;
            vertical-align: middle;
            font-size: 14px;
            line-height: 38px;
            text-align: center;
            text-decoration: none;
            text-transform: uppercase;
            transition: .1s ease-in-out;
            transition-property: all;
            transition-property: color,background-color,border-color;

            {% if vars.style == "uk-button-default" %}background-color: transparent; color: #222; border: 1px solid #e5e5e5;{% endif %}
            {% if vars.style == "uk-button-primary" %}background-color: #1e87f0; color: #fff; border: 1px solid transparent;{% endif %}
            {% if vars.style == "uk-button-secondary" %}background-color: #222; color: #fff; border: 1px solid transparent;{% endif %}
            {% if vars.style == "uk-button-danger" %}background-color: #f0506e; color: #fff; border: 1px solid transparent;{% endif %}
            {% if vars.style == "uk-button-text" %}padding: 0; line-height: 1.5; background: 0 0; color: #222; position: relative;{% endif %}
            {% if vars.style == "uk-button-link" %}padding: 0; line-height: 1.5; background: 0 0; color: #222;{% endif %}

            {% if vars.size == "uk-button-small" %}padding: 0 15px; line-height: 28px; font-size: 14px;{% endif %}
            {% if vars.size == "uk-button-large" %}padding: 0 40px; line-height: 53px; font-size: 14px;{% endif %}

            {% if vars.transform == "uk-text-capitalize" %}text-transform: capitalize;{% endif %}
            {% if vars.transform == "uk-text-uppercase" %}text-transform: uppercase;{% endif %}
            {% if vars.transform == "uk-text-lowercase" %}text-transform: lowercase;{% endif %}
            ">
            {{vars.title}}
            </div>
        </div>';
    }

    public function getFieldHelp()
    {
        return [
            'content' => 'Button',
        ];
    }
}