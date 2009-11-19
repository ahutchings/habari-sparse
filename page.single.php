<?php $theme->display('header') ?>

    <article id="post-<?php echo $post->id ?>">
        <?php echo $post->content_out ?>
    </article>

<?php $theme->display('footer') ?>
