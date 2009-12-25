<?php $theme->display('header') ?>

<?php if (!empty($post->content)): ?>
<article id="post-<?php echo $post->id ?>">
    <?php echo $post->content_out ?>
</article>
<?php endif ?>

<?php foreach ($entries as $entry): ?>
<article>
    <header>
        <h2><a href="<?php echo $entry->permalink ?>" rel="bookmark"><?php echo $entry->title_out ?></a></h2>
        <time datetime="<?php echo $entry->pubdate->out(Sparse::$datetime_html5) ?>"><?php echo $entry->pubdate->out(Sparse::$datetime_visible) ?></time>
        <?php if ($entry->tags): ?><span class="tags">tags: <?php echo $entry->tags_out ?></span><?php endif ?>
    </header>
</article>
<?php endforeach ?>

<?php $theme->display('footer') ?>
