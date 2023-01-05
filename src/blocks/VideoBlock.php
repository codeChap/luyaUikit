<?php

namespace luya\uikit\blocks;
use luya\cms\base\PhpBlock;
use luya\uikit\Module;
use luya\cms\helpers\BlockHelper;
use luya\uikit\blockgroups\Uikitgroup;

//use luya\cms\frontend\blockgroups\MediaGroup;

use luya\uikit\BaseUikitBlock;


final class VideoBlock extends BaseUikitBlock
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
        return 'External Video';
    }

    /**
     * @inheritdoc
     */
    public function icon()
    {
        return 'videocam';
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
