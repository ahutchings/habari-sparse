<?php

define('THEME_CLASS', 'Sparse');

class Sparse extends Theme
{
    public function action_init_theme()
    {
        Format::apply('tag_and_list', 'post_tags_out');

        Stack::add('template_stylesheet', array(Site::get_url('theme') . '/css/reset.css', 'screen'), 'reset');
    }

    public function out_title()
    {
        switch (URL::get_matched_rule()->name) {
        case 'display_home':
            $title = Options::get('title');
            if (Options::get('tagline')) {
                $title .= ' &#8211; '.Options::get('tagline');
            }
            break;

        case 'display_entry':
        case 'display_page':
            $title = $this->post->title.' &#8211; '.Options::get('title');
            break;

        case 'display_entries_by_tag':
            $title = 'Tag Archive for &#8220;'.$this->tag.'&#8221; &#8211; '.Options::get('title');
            break;

        default:
            $title = Options::get('title');
        }

        echo $title;
    }
}
