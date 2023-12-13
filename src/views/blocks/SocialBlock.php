<?php

$socials = array_filter([
    'facebook'  => $this->varValue('showFacebook')  ? '<a href="" class="uk-text-secondary uk-text-decoration-none"><span class="uk-background-secondary uk-light" style="padding:8px; border-radius:50%;" uk-icon="icon: facebook"></span> Facebook</a>' : false,
    'linkedin'  => $this->varValue('showLinkedin')  ? '<a href="" class="uk-text-secondary uk-text-decoration-none"><span class="uk-background-secondary uk-light" style="padding:8px; border-radius:50%;" uk-icon="icon: linkedin"></span> LinkedIn</a>' : false,
    'instagram' => $this->varValue('showInstagram') ? '<a href="" class="uk-text-secondary uk-text-decoration-none"><span class="uk-background-secondary uk-light" style="padding:8px; border-radius:50%;" uk-icon="icon: instagram"></span> Instagram</a>' : false,
]);

?>

<?php if(!empty($socials)) : ?>
    <div class="uk-flex uk-flex-bottom uk-child-width-1-3">
        <?php foreach($socials AS $social) : ?>
            <div class="uk-margin-small"><?= $social; ?></div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>