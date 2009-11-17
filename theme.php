<?php

define('THEME_CLASS', 'Sparse');

class Sparse extends Theme
{
    public function action_init_theme()
    {
        Format::apply('tag_and_list', 'post_tags_out');

        Stack::add('template_stylesheet', array(Site::get_url('theme') . '/css/reset.css', 'screen'), 'reset');
    }
}
