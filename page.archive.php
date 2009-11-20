<?php $theme->display('header') ?>

<?php if (!empty($post->content)): ?>
<article id="post-<?php echo $post->id ?>">
    <?php echo $post->content_out ?>
</article>
<?php endif ?>

<?php foreach ($entries as $entry): ?>
<article>
	<header>
		<h3><a href="<?php echo $entry->permalink ?>" rel="bookmark"><?php echo $entry->title_out ?></a></h3>
        <time datetime="<?php echo $entry->pubdate->text_format('{Y}-{m}-{d}T{H}:{i}:{s}{O}') ?>"><?php echo $entry->pubdate->text_format('{N}{S} {F} {Y}') ?></time>
        <span class="tags">tags: <?php echo $entry->tags_out ?></span>
	</header>
</article>
<?php endforeach ?>

<?php $theme->display('footer') ?>