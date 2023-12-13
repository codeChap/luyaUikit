<?php
/**
 * View file for block: ImageBlock
 *
 * @param $this->extraValue('image');
 * @param $this->varValue('align');
 * @param $this->varValue('showCaption');
 * @param $this->varValue('image');
 * @param $this->cfgValue('lazyload');
 *
 * @var $this \luya\cms\base\PhpBlockView
 */

$align   = $this->varValue('align', 'left');
$width   = $this->varValue('width', '');
$image   = $this->extraValue('image', false);
$caption = ($image AND !empty($image->caption)) ? $image->caption : '';
$class   = $this->cfgValue('divCssClass', false);
?>

<?php if ($image) : ?>
    <figure class="<?= $class ?? ''; ?> <?php if ($align === 'left'): ?>uk-text-left<?php elseif ($align === 'right'): ?>uk-text-right<?php else: ?>uk-text-center<?php endif; ?>">

        <!-- Image -->
        <?php if($this->cfgValue('lazyload', false)): ?>
        <img class="<?= $width; ?>" data-src="<?= $image->source ?>"<?php if (!empty($caption)): ?> alt="<?= $caption ?>"<?php endif; ?> uk-img>
        <?php else: ?>
        <img class="<?= $width; ?>" src="<?= $image->source ?>"<?php if (!empty($caption)): ?> alt="<?= $caption ?>"<?php endif; ?> uk-img>
        <?php endif; ?>

        <!-- Caption -->
        <?php if ($this->varValue('showCaption', false) && !empty($caption)): ?>
        <figcaption><?= $caption ?></figcaption>
        <?php endif; ?>
    </figure>
<?php endif; ?>