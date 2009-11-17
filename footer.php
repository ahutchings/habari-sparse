    	<footer role="contentinfo">
    		&copy; <?php echo date('Y')?> <?php echo Options::out('title') ?>
			<a href="<?php URL::out('atom_feed', array('index' => '1')) ?>"><?php _e('Atom Entries') ?></a>
			<a href="<?php URL::out('atom_feed_comments') ?>"><?php _e('Atom Comments') ?></a>
			<a href="#top">Top</a>
    	</footer>
    	<?php echo $theme->footer() ?>
    </body>
</html>
