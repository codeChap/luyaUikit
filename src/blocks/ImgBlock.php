<?php

namespace luya\uikit\blocks;
use luya\cms\base\PhpBlock;
use luya\cms\frontend\blockgroups\MediaGroup;

class ImgBlock extends PhpBlock
{
    /**
     * @inheritDoc
     */
    public function blockGroup()
    {
        return MediaGroup::class;
    }

    /**
     * @inheritDoc
     */
    public function name()
    {
        return 'Image Block';
    }
    
    /**
     * @inheritDoc
     */
    public function icon()
    {
        return 'collections'; // see the list of icons on: https://material.io/icons/
    }
 
    /**
     * @inheritDoc
     */
    public function config()
    {
        return [
        ];
    }
    
    /**
     * {@inheritDoc} 
     *
    */
    public function admin()
    {
        return 'Image';
    }

    public function getFieldHelp()
    {
        return [
            'content' => 'Image',
        ];
    }
}