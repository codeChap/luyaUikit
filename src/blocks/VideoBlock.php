<?php

namespace luya\uikit\blocks;
use luya\cms\base\PhpBlock;
use luya\uikit\Module;
use luya\cms\helpers\BlockHelper;
use luya\cms\frontend\blockgroups\MediaGroup;


class VideoBlock extends PhpBlock
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
        return MediaGroup::class;
    }

    /**
     * @inheritdoc
     */
    public function name()
    {
        return 'Video';
    }

    /**
     * @inheritdoc
     */
    public function icon()
    {
        return 'video';
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
                ['var' => 'link', 'label' => Module::t('block_video.link'), 'type' => self::TYPE_TEXT],
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function admin()
    {
        return 'Video';
    }
}
