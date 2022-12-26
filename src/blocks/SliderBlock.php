<?php

namespace luya\uikit\blocks;
use luya\cms\base\PhpBlock;
use luya\uikit\Module;
use luya\cms\helpers\BlockHelper;
use luya\uikit\blockgroups\Uikitgroup;
use luya\uikit\BaseUikitBlock;

//use luya\cms\frontend\blockgroups\MediaGroup;

final class SliderBlock extends BaseUikitBlock
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
        return 'Slider Block';
    }
    
    /**
     * @inheritDoc
     */
    public function icon()
    {
        return 'image'; // see the list of icons on: https://material.io/icons/
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
                [
                    'var' => 'photos', 'label' => 'Photos', 'type' => self::TYPE_MULTIPLE_INPUTS, 
                    'options' =>
                    [
                        [
                            'type'    => self::TYPE_IMAGEUPLOAD,
                            'var'     => 'image',
                            'label'   => 'Image',
                            'options' => ['no_filter' => false]
                        ],
                        //[
                        //'type' => self::TYPE_TEXT,
                        //'var' => 'name',
                        //'label' => 'Name'
                        //]
                    ]
                ]
            ]
        ];
    }

    /**
     * @inheritDoc
     */
    public function extraVars(array $params = [])
    {
        // Build up photos
        $photos = [];
        if($this->getVarValue('photos')){
            foreach($this->getVarValue('photos') AS $photo){
                $photos[] = BlockHelper::imageUpload($photo['image']) ;
            };
        }
        return ['photos' => $photos];
    }
    
    /**
     * {@inheritDoc} 
     *
    */
    public function admin()
    {
        return '<div class="clearfix" {% if vars.align == \'center\' %}style="text-align: center;"{% endif %}>
                    <div style="display: inline-block; max-width: 80%; {% if vars.align == \'left\' %} float: left;{% elseif vars.align == \'right\' %} float: right;{% endif %}">
                        <div>
                            <img src="{{extras.image.source}}" class="img-fluid" alt="" />
                        </div>
                        {% if vars.showCaption and extras.image.caption %}
                            <p class="text-muted"><small>{{extras.image.caption}}</small></p>
                        {% endif %}
                    </div>
                </div>';
    }

    public function getFieldHelp()
    {
        return [
            'content' => 'Image Slider',
        ];
    }
}