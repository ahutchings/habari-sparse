<?php $theme->display('header') ?>

<?php foreach ($posts as $post): ?>
	<article>
		<header>
            <h2><a href="<?php echo $post->permalink ?>" rel="bookmark"><?php echo $post->title ?></a></h2>
            <time datetime="<?php echo $post->pubdate->text_format('{Y}-{m}-{d}T{H}:{i}:{s}{O}') ?>"><?php $post->pubdate->out() ?></time>
            <span class="tags">tagged: <?php echo $post->tags_out ?></span>
        </header>
        <?php echo $post->content ?>
	</article>

<?php endforeach ?>

<?php $theme->display('footer') ?>
