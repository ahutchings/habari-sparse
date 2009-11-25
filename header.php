<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="generator" content="Habari">
    <title><?php $theme->out_title() ?></title>
    <link rel="edit" type="application/atom+xml" title="<?php Options::out('title') ?>" href="<?php URL::out('atompub_servicedocument') ?>">
    <link rel="alternate" type="application/atom+xml" title="<?php Options::out('title') ?> Atom Feed" href="<?php $theme->feed_alternate() ?>">
    <link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php URL::out('rsd') ?>">
    <?php $theme->header() ?>
    <!--[if IE]>
    <link rel="stylesheet" href="<?php echo Site::out_url('theme') ?>/css/ie.css" type="text/css" media="screen, projection" />
    <![endif]-->
</head>
<body class="<?php $theme->body_class() ?>">
    <div class="container">
    <header role="banner" id="top">
        <h1><a href="<?php Site::out_url('habari') ?>" rel="home"><?php Options::out('title') ?></a></h1>
    </header>
    <nav role="navigation">
        <ul><?php $theme->navigation() ?></ul>
    </nav>
