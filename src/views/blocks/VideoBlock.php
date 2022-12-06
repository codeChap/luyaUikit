<?php

$link = $this->varValue('link', '');

?>
<div class="uk-inline uk-margin uk-flex-center uk-flex-middle">
    <iframe class="uk-hidden@l" width="398" height="315" src="<?= $link; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <iframe class="uk-visible@l" width="560" height="315" src="<?= $link; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>