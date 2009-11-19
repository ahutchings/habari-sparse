<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="generator" content="Habari">
        <title><?php $theme->out_title() ?></title>
        <link rel="edit" type="application/atom+xml" title="<?php Options::out('title') ?>" href="<?php URL::out('atompub_servicedocument') ?>">
        <link rel="alternate" type="application/atom+xml" title="Atom 1.0" href="<?php $theme->feed_alternate() ?>">
        <link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php URL::out('rsd') ?>">
        <?php $theme->header() ?>
        <!--[if IE]>
        <link rel="stylesheet" href="<?php echo Site::out_url('theme') ?>/css/ie.css" type="text/css" media="screen, projection" />
        <![endif]-->
    </head>
    <body>
        <div class="container">
		<header role="banner" id="top">
			<h1><a href="<?php Site::out_url('habari') ?>" rel="home"><?php Options::out('title') ?></a></h1>
		</header>
		<nav role="navigation">
			<ul>
				<li>
    				<?php if ($request->display_home): ?>
    				Home
    				<?php else: ?>
    				<a href="<?php Site::out_url('habari') ?>" title="<?php Options::out('title') ?>">Home</a>
    				<?php endif ?>
				</li>
				<?php foreach ($pages as $page): ?>
				<li>
    				<?php if (isset($post) && $post->id == $page->id): ?>
    				    <?php echo $page->title ?>
    				<?php else: ?>
    					<a href="<?php echo $page->permalink ?>" title="<?php echo $page->title ?>"><?php echo $page->title ?></a>
    				<?php endif ?>
				</li>
				<?php endforeach ?>
			</ul>
		</nav>
