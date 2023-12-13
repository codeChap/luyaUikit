<?php

namespace luya\uikit\blockgroups;

use luya\cms\base\BlockGroup;


/**
 * Bootstrap 3 Group.
 *
 * @author Basil Suter <basil@nadar.io>
 * @since 1.0.0
 */
class Uikitgroup extends BlockGroup
{
    public function identifier()
    {
        return 'uikit';
    }
    
    public function label()
    {
        return 'Uikit';
    }
    
    public function getPosition()
    {
        return 60;
    }
}
