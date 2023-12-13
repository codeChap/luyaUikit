<?php

namespace luya\uikit\blocks;
use luya\cms\base\PhpBlock;
use luya\uikit\Module;
use luya\cms\helpers\BlockHelper;
use luya\uikit\blockgroups\Uikitgroup;
use luya\uikit\BaseUikitBlock;
use luya\cms\frontend\blockgroups\LayoutGroup;

final class Flex2Block extends BaseUikitBlock
{
    /**
     * @inheritdoc
     */
    public $isContainer = true;

    /**
     * @inheritdoc
     */
    public function blockGroup()
    {
        return Uikitgroup::class;
    }

    /**
     * @inheritdoc
     */
    public function name()
    {
        return '2 Column Flex Layout';
    }

    /**
     * @inheritdoc
     */
    public function icon()
    {
        return 'view_column';
    }

    /**
     * @inheritdoc
     */
    public function config()
    {
        return [
            'vars' => [
                ['var' => 'container', 'label' => 'Container Size', 'initvalue' => 'uk-container', 'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption([
                    'uk-container'        => 'Default',
                    'uk-container-xsmall' => 'X - Small',
                    'uk-container-small'  => 'Small',
                    'uk-container-large'  => 'Large',
                    'uk-container-xlarge' => 'X - Large',
                    'uk-container-expand' => 'Expand',
                    'container-none'      => 'None'
                ])
                ],
                ['var' => 'width_left', 'label' => 'Left Width', 'initvalue' => '1-2', 'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption([
                    '1-2' => '1 / 2',
                    '1-3' => '1 / 3',
                    '2-3' => '2 / 3',
                    '1-4' => '1 / 4',
                    '2-4' => '2 / 4',
                    '3-4' => '3 / 4',
                    '1-5' => '1 / 5',
                    '2-5' => '2 / 5',
                    '3-5' => '3 / 5',
                    '4-5' => '4 / 5',
                    '1-6' => '1 / 6'
                ]),
                ],
                ['var' => 'width_right', 'label' => 'Right Width', 'initvalue' => '1-2', 'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption([
                    '1-2' => '1 / 2',
                    '1-3' => '1 / 3',
                    '2-3' => '2 / 3',
                    '1-4' => '1 / 4',
                    '2-4' => '2 / 4',
                    '3-4' => '3 / 4',
                    '1-5' => '1 / 5',
                    '2-5' => '2 / 5',
                    '3-5' => '3 / 5',
                    '4-5' => '4 / 5',
                    '1-6' => '1 / 6'
                ]),
                ],
                ['var' => 'marginTop', 'label' => 'Top Margin', 'initvalue' => false, 'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption([
                    'uk-margin-top'        => 'Default',
                    'uk-margin-small-top'  => 'Small',
                    'uk-margin-large-top'  => 'Medium',
                    'uk-margin-large-top'  => 'Large',
                    'uk-margin-xlarge-top' => 'xLarge'
                ])
                ],
                ['var' => 'marginBottom', 'label' => 'Bottom Margin', 'initvalue' => false, 'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption([
                    'uk-margin-bottom'        => 'Default',
                    'uk-margin-small-bottom'  => 'Small',
                    'uk-margin-large-bottom'  => 'Medium',
                    'uk-margin-large-bottom'  => 'Large',
                    'uk-margin-xlarge-bottom' => 'xLarge'
                ])
                ],
                ['var' => 'v_align', 'label' => 'Vertical alignment', 'initvalue' => 'uk-flex-top', 'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption([
                    'uk-flex-top'     => 'Top (Default)',
                    'uk-flex-stretch' => 'Stretch',
                    'uk-flex-middle'  => 'Middle',
                    'uk-flex-bottom'  => 'Bottom'
                ])
                ],
                [
                    'var' => 'background_image_left', 'label' => 'Background Image Left', 'type' => self::TYPE_IMAGEUPLOAD, 'options' => ['no_filter' => false],
                ]
            ],
            'cfgs' => [
                ['var' => 'leftColumnClassesBlock',  'label' => Module::t('block_layout_left_column_css_class'), 'type'  => self::TYPE_TEXT],
                ['var' => 'rightColumnClassesBlock', 'label' => Module::t('block_layout_right_column_css_class'), 'type' => self::TYPE_TEXT],
                ['var' => 'rowDivClass',             'label' => Module::t('block_layout_row_column_css_class'), 'type'   => self::TYPE_TEXT],
            ],
            'placeholders' => [
                [
                    ['var' => 'left', 'cols' => $this->getExtraValue('leftWidth'), 'label' => Module::t('block_layout_placeholders_left')],
                    ['var' => 'right', 'cols' => $this->getExtraValue('rightWidth'), 'label' => Module::t('block_layout_placeholders_right')],
                ]
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function extraVars()
    {
        return [
            'leftWidth'  => 6,
            'rightWidth' => 6,
            'background_image_left' => BlockHelper::imageUpload($this->getVarValue('background_image_left'), false, true)
        ];
    }

    /**
     * @inheritdoc
     */
    public function admin()
    {
        return '';
    }
}
