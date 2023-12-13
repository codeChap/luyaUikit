<?php

namespace luya\uikit\blocks;
use luya\cms\base\PhpBlock;
use luya\uikit\Module;
use luya\cms\helpers\BlockHelper;
use luya\uikit\blockgroups\Uikitgroup;
use luya\uikit\BaseUikitBlock;

//use luya\cms\frontend\blockgroups\MediaGroup;

final class SpaceBlock extends BaseUikitBlock
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
        return 'Space';
    }
    
    /**
     * @inheritDoc
     */
    public function icon()
    {
        return 'height-icon'; // see the list of icons on: https://material.io/icons/
    }
 
    /**
     * @inheritDoc
     */
    public function config()
    {
        return 
        [
            'vars' => [
                ['var' => 'size', 'label' => Module::t('block_space.size'), 'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption([
                'uk-margin-small'  => 'Small',
                'uk-margin-medium' => 'Medium',
                'uk-margin-large'  => 'Large',
                'uk-margin-xlarge' => 'X-Large'
                ])
            ]]
        ];
    }

    /**
     * {@inheritDoc} 
     *
    */
    public function admin()
    {
        return '<div style="text-align:center;">-- space -- </div>';
    }

    public function getFieldHelp()
    {
        return [
            'content' => 'Space block',
        ];
    }
}