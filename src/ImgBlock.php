<?php

namespace codechap\uikit;
use luya\cms\base\PhpBlock;

class Img extends PhpBlock
{
    /**
     * @inheritDoc
     */
    public function blockGroup()
    {
        return ProjectGroup::class;
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