<?php

namespace luya\uikit\blocks;
use luya\cms\base\PhpBlock;
use luya\uikit\Module;
use luya\cms\helpers\BlockHelper;
use luya\uikit\blockgroups\Uikitgroup;
use luya\uikit\BaseUikitBlock;

//use luya\cms\frontend\blockgroups\MediaGroup;

final class ThumbBlock extends BaseUikitBlock
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
        return 'Thumb Block';
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
                ['var' => 'title', 'label' => Module::t('block_background_image.title'), 'type' => self::TYPE_TEXT],
                ['var' => 'image', 'label' => Module::t('block_image.image'),            'type' => self::TYPE_IMAGEUPLOAD, 'options' => ['no_filter' => false]],
            ],
            'cfgs' => [

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
        return '
        <div style="position: relative; width: 100%; height: auto;">
        <img src="{{extras.image.source}}" alt="{{vars.title}}" style="width: 100%; height: auto;">
        <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
            <p style="color: white; font-size: 24px; font-weight: bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">{{vars.title}}</p>
        </div>
        </div>';
    }

    public function getFieldHelp()
    {
        return [
            'content' => 'Thumbnail image with title.',
        ];
    }
}