<?php

namespace luya\uikit\blocks;
use luya\cms\base\PhpBlock;
use luya\uikit\Module;
use luya\cms\helpers\BlockHelper;
use luya\uikit\blockgroups\Uikitgroup;
use luya\uikit\BaseUikitBlock;

//use luya\cms\frontend\blockgroups\MediaGroup;

final class SocialBlock extends BaseUikitBlock
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
        return 'Social Media';
    }
    
    /**
     * @inheritDoc
     */
    public function icon()
    {
        return 'facebook'; // see the list of icons on: https://material.io/icons/
    }
 
    /**
     * @inheritDoc
     */
    public function config()
    {
        return 
        [
            'vars' => [
                ['var' => 'showFacebook', 'label' => Module::t('block_social.facebook'), 'type' => self::TYPE_CHECKBOX],
                ['var' => 'showInstagram', 'label' => Module::t('block_social.instagram'), 'type' => self::TYPE_CHECKBOX],
                ['var' => 'showLinkedin', 'label' => Module::t('block_social.linkedin'), 'type' => self::TYPE_CHECKBOX],
            ]
        ];
    }

    /**
     * {@inheritDoc} 
     *
    */
    public function admin()
    {
        return '<div style="text-align:center;">-- Social Media --</div>';
    }

    public function getFieldHelp()
    {
        return [
            'content' => 'Space block',
        ];
    }
}