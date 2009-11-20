<?php $theme->display('header') ?>

<?php foreach ($posts as $post): ?>
    <article id="post-<?php echo $post->id ?>">
        <header>
            <h2><a href="<?php echo $post->permalink ?>" rel="bookmark"><?php echo $post->title ?></a></h2>
            <time datetime="<?php echo $post->pubdate->text_format('{Y}-{m}-{d}T{H}:{i}:{s}{O}') ?>"><?php echo $post->pubdate->text_format('{N}{S} {F} {Y}') ?></time>
            <span class="tags">tags: <?php echo $post->tags_out ?></span>
        </header>
        <?php echo $post->content_out ?>
    </article>
<?php endforeach ?>

<?php $theme->display('footer') ?>
