<?php

namespace luya\uikit\blocks;
use luya\cms\base\PhpBlock;
use luya\uikit\Module;
use luya\cms\helpers\BlockHelper;
use luya\uikit\blockgroups\Uikitgroup;
use luya\uikit\BaseUikitBlock;
use luya\cms\frontend\blockgroups\LayoutGroup;

final class Grid3Block extends BaseUikitBlock
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
        return '3 Column Grid Layout';
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
                ['var' => 'width_left', 'label' => 'Left Width', 'initvalue' => '1-3', 'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption([
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
                ['var' => 'width_middle', 'label' => 'Middle Width', 'initvalue' => '1-3', 'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption([
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
                ['var' => 'width_right', 'label' => 'Right Width', 'initvalue' => '1-3', 'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption([
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
                ['var' => 'v_align_left', 'label' => 'Left side alignment', 'initvalue' => 'uk-flex-middle', 'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption([
                    'uk-flex-top'     => 'Top',
                    'uk-flex-middle'  => 'Middle (Default)',
                    'uk-flex-bottom'  => 'Bottom'
                ]),
                ],
                ['var' => 'v_align_middle', 'label' => 'Middle alignment', 'initvalue' => 'uk-flex-middle', 'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption([
                    'uk-flex-top'     => 'Top',
                    'uk-flex-middle'  => 'Middle (Default)',
                    'uk-flex-bottom'  => 'Bottom'
                ]),
                ],
                ['var' => 'v_align_right', 'label' => 'Right side alignment', 'initvalue' => 'uk-flex-middle', 'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption([
                    'uk-flex-top'     => 'Top',
                    'uk-flex-middle'  => 'Middle (Default)',
                    'uk-flex-bottom'  => 'Bottom'
                ])
                ],
                ['var' => 'contain_left', 'label' => 'Contain Left Column', 'initvalue' => false, 'type' => self::TYPE_CHECKBOX],
                ['var' => 'contain_middle', 'label' => 'Contain Middle Column', 'initvalue' => false, 'type' => self::TYPE_CHECKBOX],
                ['var' => 'contain_right', 'label' => 'Contain Right column', 'initvalue' => false, 'type' => self::TYPE_CHECKBOX],
            ],
            'cfgs' => [
                ['var' => 'leftColumnClassesBlock',   'label' => Module::t('block_layout_left_column_css_class'), 'type'  => self::TYPE_TEXT],
                ['var' => 'MiddleColumnClassesBlock', 'label' => Module::t('block_layout_left_column_css_class'), 'type'  => self::TYPE_TEXT],
                ['var' => 'rightColumnClassesBlock',  'label' => Module::t('block_layout_right_column_css_class'), 'type' => self::TYPE_TEXT],
                ['var' => 'rowDivClass',              'label' => Module::t('block_layout_row_column_css_class'), 'type'   => self::TYPE_TEXT],
            ],
            'placeholders' => [
                [
                    ['var' => 'left',   'cols' => $this->getExtraValue('leftWidth'), 'label' => Module::t('block_layout_placeholders_left')],
                    ['var' => 'middle', 'cols' => $this->getExtraValue('middleWidth'), 'label' => Module::t('block_layout_placeholders_middle')],
                    ['var' => 'right',  'cols' => $this->getExtraValue('rightWidth'), 'label' => Module::t('block_layout_placeholders_right')],
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
            'leftWidth'   => 4,
            'middleWidth' => 4,
            'rightWidth'  => 4,
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
