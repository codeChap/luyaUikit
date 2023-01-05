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
    public function name()
    {
        return '2 Column Layout';
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
                ['var' => 'container', 'label' => 'Container Size', 'initvalue' => 1, 'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption([
                    'uk-container'        => 'Default',
                    'uk-container-xsmall' => 'X - Small',
                    'uk-container-small'  => 'Small',
                    'uk-container-large'  => 'Large',
                    'uk-container-xlarge' => 'X - Large',
                    'uk-container-expand' => 'Expand'
                ])
                ],
                ['var' => 'width_left', 'label' => 'Left Width', 'initvalue' => 1, 'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption([
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
                ['var' => 'width_right', 'label' => 'Right Width', 'initvalue' => 1, 'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption([
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
                ['var' => 'v_align', 'label' => 'Vertical alignment', 'initvalue' => 1, 'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption([
                        'uk-flex-stretch' => 'Stretch',
                        'uk-flex-top'     => 'Top',
                        'uk-flex-middle'  => 'Middle',
                        'uk-flex-bottom'  => 'Bottom'
                    ])
                ]
            ],
            'cfgs' => [
                ['var' => 'leftColumnClasses',  'label' => Module::t('block_layout_left_column_css_class'), 'type' => self::TYPE_TEXT],
                ['var' => 'rightColumnClasses', 'label' => Module::t('block_layout_right_column_css_class'), 'type' => self::TYPE_TEXT],
                ['var' => 'rowDivClass',        'label' => Module::t('block_layout_row_column_css_class'), 'type' => self::TYPE_TEXT],
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
            'rightWidth' => 6
        ];
    }

    /**
     * @inheritdoc
     */
    public function admin()
    {
        return '';
    }
    
    /**
     * @inheritdoc
     */
    public function blockGroup()
    {
        return Uikitgroup::class;
    }
}
