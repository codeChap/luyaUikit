<?php

namespace luya\uikit\blocks;
use luya\uikit\Module;
use luya\cms\helpers\BlockHelper;
use luya\uikit\blockgroups\Uikitgroup;

//use luya\cms\frontend\blockgroups\MediaGroup;

use luya\uikit\BaseUikitBlock;
use luya\web\WebsiteLink;
use luya\cms\injectors\LinkInjector;


final class BackgroundvideoBlock extends BaseUikitBlock
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
        return 'Background Video';
    }

    /**
     * @inheritdoc
     */
    public function icon()
    {
        return 'videocam';
    }

    /**
     * @inheritdoc
     */
    public function injectors()
    {
        return [
            'linkData' => new LinkInjector([
                'varLabel' => Module::t('block_link_button_btnhref_label'),
            ]),
        ];
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
                ['var' => 'videoId',    'label' => Module::t('block_backgroundvideo.link'), 'type' => self::TYPE_FILEUPLOAD],
                ['var' => 'heading',    'label' => Module::t('block_backgroundvideo.heading'), 'type' => self::TYPE_TEXT],
                ['var' => 'subHeading', 'label' => Module::t('block_backgroundvideo.subheading'), 'type' => self::TYPE_TEXT],
                ['var' => 'linkLabel',  'label' => Module::t('block_backgroundvideo.linkLabel'), 'type' => self::TYPE_TEXT],
            ],
            'cfgs' => 
            [
                ['var' => 'hideOnMobile', 'label' => Module::t('block_backgroundvideo.hideOnMobile'), 'type' => self::TYPE_CHECKBOX],
                ['var' => 'dontLoadVid',  'label' => Module::t('block_backgroundvideo.dontLoadVid'),  'type' => self::TYPE_CHECKBOX],
                ['var' => 'imageId',      'label' => Module::t('block_background_image.image'),       'type' => self::TYPE_IMAGEUPLOAD, 'options' => ['no_filter' => false]],
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function extraVars()
    {
        return [
            'video' => BlockHelper::fileUpload($this->getVarValue('videoId')),
            'image' => BlockHelper::imageUpload($this->getCfgValue('imageId'), false, true),
        ];
    }

    /**
     * @inheritdoc
     */
    public function admin()
    {
        return '
        <div style="display: inline-block; position: relative; width: 100%; vertical-align: middle; -webkit-backface-visibility: hidden;">
            <video autoplay muted loop style="width:100%;"><source src="{{extras.video.source}}"></video>
            <div style="
                position: absolute !important;
                box-sizing: border-box;
                top: 50%;
                transform: translate(0,-50%);
                width:100%;
            ">
                <div style="display: inline-block; position: relative; width: 100%; vertical-align: middle; text-align:center; -webkit-backface-visibility: hidden;" class=" uk-light">
                    <p style="font-size: 2.625rem; font-weight:700; margin:0; color:white;">{{vars.heading}}</p>
                    <p style="font-size: 2rem; margin-top:0; color:white;">{{vars.subHeading}}</p>
                    <a style="
                     margin: 0;
                     border: none;
                     overflow: visible;
                     font: inherit;
                     font-size: inherit;
                     line-height: inherit;
                     color: inherit;
                     text-transform: none;
                     -webkit-appearance: none;
                     border-radius: 0;
                     display: inline-block;
                     box-sizing: border-box;
                     padding: 0 30px;
                     vertical-align: middle;
                     font-size: 14px;
                     line-height: 38px;
                     text-align: center;
                     text-decoration: none;
                     text-transform: uppercase;
                     transition: .1s ease-in-out;
                     transition-property: all;
                     transition-property: color,background-color,border-color;
                     border: 1px solid #e5e5e5;
                     color:white;
                    ">{{vars.linkLabel}}</a>
                </div>
            </div>
        </div>';
    }
}
