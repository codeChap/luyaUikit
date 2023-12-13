<?php

namespace luya\uikit\blocks;
use luya\cms\base\PhpBlock;
use luya\uikit\Module;
use luya\cms\helpers\BlockHelper;
use luya\uikit\blockgroups\Uikitgroup;
use luya\uikit\BaseUikitBlock;

//use luya\cms\frontend\blockgroups\MediaGroup;

final class TextBlock extends BaseUikitBlock
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
        return 'Text Editor';
    }
    
    /**
     * @inheritDoc
     */
    public function icon()
    {
        return 'format_color_text'; // see the list of icons on: https://material.io/icons/
    }
 
    /**
     * @inheritDoc
     */
    public function config()
    {
        return [
            'vars' => [
                ['var' => 'content', 'label' => Module::t('block_text_content'), 'type' => self::TYPE_WYSIWYG],
                ['var' => 'color', 'label' => Module::t('block_text.color'),  'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption([
                    'uk-text-muted'     => 'Muted',
                    'uk-text-emphasis'  => 'Emphasis',
                    'uk-text-primary'   => 'Primary',
                    'uk-text-secondary' => 'Secondary',
                    'uk-text-success'   => 'Success',
                    'uk-text-warning'   => 'Warning',
                    'uk-text-danger'    => 'Danger'
                    ])
                ],
                ['var' => 'align', 'label' => Module::t('block_text.align'), 'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption([
                    'uk-text-left'   => 'Left',
                    'uk-text-center' => 'Center',
                    'uk-text-right'  => 'Right'
                    ])
                ],
                ['var' => 'style', 'label' => Module::t('block_text.style'),  'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption([
                    'uk-text-lead' => 'Leading Text',
                    'uk-text-meta' => 'Meta Text',
                    ])
                ],
                ['var' => 'size', 'label' => Module::t('block_text.size'),  'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption([
                    'uk-text-small'   => 'Small',
                    'uk-text-default' => 'Default',
                    'uk-text-large'   => 'Large',
                    ])
                ],
                ['var' => 'weight', 'label' => Module::t('block_text.weight'),  'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption([
                    'uk-text-light'   => 'Light',
                    'uk-text-normal'  => 'Normal',
                    'uk-text-bold'    => 'Bold',
                    'uk-text-lighter' => 'Lighter',
                    'uk-text-bolder'  => 'Bolder',
                    ])
                ],
                ['var' => 'transform', 'label' => Module::t('block_text.transform'),  'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption([
                    'uk-text-capitalize' => 'Capitalize',
                    'uk-text-uppercase'  => 'Uppercase',
                    'uk-text-lowercase'  => 'Lowercase',
                    ])
                ],
                ['var' => 'tag', 'label' => Module::t('block_heading.tag'),  'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption([
                    'div'  => 'Block (Default)',
                    'span' => 'Span',
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
        "
        style="
        {% if vars.style == "uk-text-lead" %}font-size:24px; color: #222; font-weight: 300;{% endif %}
        {% if vars.style == "uk-text-meta" %}font-size: 14px; line-height: 1.4; color: #999;{% endif %}

        {% if vars.size == "uk-text-small" %}font-size: 14px;{% endif %}
        {% if vars.size == "uk-text-default" %}font-size: 15px;{% endif %}
        {% if vars.size == "uk-text-large" %}font-size: 24px;{% endif %}

        {% if vars.weight == "uk-text-light" %}font-weight: 300;{% endif %}
        {% if vars.weight == "uk-text-normal" %}font-weight: 400;{% endif %}
        {% if vars.weight == "uk-text-bold" %}font-weight: 700;{% endif %}
        {% if vars.weight == "uk-text-lighter" %}font-weight: lighter;{% endif %}
        {% if vars.weight == "uk-text-bolder" %}font-weight: bolder;{% endif %}

        {% if vars.transform == "uk-text-capitalize" %}text-transform: capitalize;{% endif %}
        {% if vars.transform == "uk-text-uppercase" %}text-transform: uppercase;{% endif %}
        {% if vars.transform == "uk-text-lowercase" %}text-transform: lowercase;{% endif %}

        {% if vars.color == "uk-text-muted" %}color:rgb(153, 153, 153){% endif %}
        {% if vars.color == "uk-text-emphasis" %}color:rgb(34, 34, 34){% endif %}
        {% if vars.color == "uk-text-primary" %}color:rgb(30, 135, 240){% endif %}
        {% if vars.color == "uk-text-secondary" %}color:rgb(34, 34, 34){% endif %}
        {% if vars.color == "uk-text-success" %}color:rgb(50, 210, 150){% endif %}
        {% if vars.color == "uk-text-warning" %}color:rgb(250, 160, 90){% endif %}
        {% if vars.color == "uk-text-danger" %}color:rgb(240, 80, 110){% endif %}
        ">
            {{vars.content}}
        </div>';
    }

    public function getFieldHelp()
    {
        return [
            'content' => 'WYSIWYG Editor',
        ];
    }
}