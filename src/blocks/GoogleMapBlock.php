<?php

namespace luya\uikit\blocks;
use luya\cms\base\PhpBlock;
use luya\uikit\Module;
use luya\cms\helpers\BlockHelper;
use luya\uikit\blockgroups\Uikitgroup;
use luya\uikit\BaseUikitBlock;

//use luya\cms\frontend\blockgroups\MediaGroup;

final class GoogleMapBlock extends BaseUikitBlock
{
    /**
     * @inheritdoc
     */
    public $module = 'uikit';

    /**
     * @inheritdoc
     */
    public function blockGroup()
    {
        return UikitGroup::class;
    }

    /**
     * @inheritdoc
     */
    public function name()
    {
        return 'Map';
    }

    /**
     * @inheritdoc
     */
    public function icon()
    {
        return 'map';
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
                ['var' => 'lat',   'label' => Module::t('block_map.lat'),  'type' => self::TYPE_TEXT],
                ['var' => 'lng',   'label' => Module::t('block_map.lng'),  'type' => self::TYPE_TEXT],
                ['var' => 'zoom',  'label' => Module::t('block_map.zoom'), 'type' => self::TYPE_NUMBER],
                ['var' => 'color', 'label' => Module::t('block_map.color'),'type' => self::TYPE_TEXT],
                ['var' => 'label', 'label' => Module::t('block_map.label'),'type' => self::TYPE_TEXT],
                ['var' => 'key',   'label' => Module::t('block_map.key'),  'type' => self::TYPE_TEXT],
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function admin()
    {
        return 'Google Map';
    }
}
