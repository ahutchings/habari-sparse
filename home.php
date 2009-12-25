<?php $theme->display('header') ?>

<?php foreach ($posts as $post): ?>
    <article id="post-<?php echo $post->id ?>">
        <header>
            <h2><a href="<?php echo $post->permalink ?>" rel="bookmark"><?php echo $post->title_out ?></a></h2>
            <time datetime="<?php echo $post->pubdate->out(Sparse::$datetime_html5) ?>"><?php echo $post->pubdate->out(Sparse::$datetime_visible) ?></time>
            <?php if ($post->tags): ?><span class="tags">tags: <?php echo $post->tags_out ?></span><?php endif ?>
        </header>
        <?php echo $post->content_out ?>
    </article>
<?php endforeach ?>

<nav id="pagination">
    <?php $theme->prev_page_link(_t('&#8249; Previous')) ?>
    <?php $theme->page_selector(null, array('leftSide' => 2, 'rightSide' => 2)) ?>
    <?php $theme->next_page_link(_t('Next &#8250;')) ?>
</nav>

<?php $theme->display('footer') ?>
