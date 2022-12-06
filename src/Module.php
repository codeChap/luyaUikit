<?php

namespace luya\uikit;

use Yii;

/**
 * Uikit Module
 *
 * When adding this module to your configuration the bootstrap4 block will be added to your
 * cmsadministration by running the `import` command.
 *
 * @author Basil Suter <basil@nadar.io>
 */
class Module extends \luya\base\Module
{
    /**
     * @inheritdoc
     */
    public static function onLoad()
    {
        Yii::setAlias('@uikit', static::staticBasePath());
        
        self::registerTranslation('uikit*', static::staticBasePath() . '/messages', [
            'uikit' => 'uikit.php',
        ]);
    }

    /**
     * Translations
     *
     * @param string $message
     * @param array $params
     * @return string
     */
    public static function t($message, array $params = [])
    {
        return parent::baseT('uikit', $message, $params);
    }
}