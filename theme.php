<?php

define('THEME_CLASS', 'Sparse');

class Sparse extends Theme
{
    public function action_init_theme()
    {
        Format::apply('tag_and_list', 'post_tags_out', ', ', ', ');
        Format::apply_with_hook_params('more', 'post_content_out', 'More &rarr;', null, 1);

        Stack::add('template_stylesheet', array(Site::get_url('theme') . '/css/screen.css', 'screen, projection'), 'screen');
        Stack::add('template_stylesheet', array(Site::get_url('theme') . '/css/style.css', 'screen, projection'), 'style');
        Stack::add('template_stylesheet', array(Site::get_url('theme') . '/css/print.css', 'print'), 'print');
    }

    public function theme_header($theme)
    {
        $out = parent::theme_header($theme);

        switch (URL::get_matched_rule()->name) {
        case 'display_entries_by_tag':
        case 'display_entries':
            $out .= "<meta name=\"robots\" content=\"noindex,follow\">\n";
            break;
        case 'display_entry':
            $out .= '<link rel="alternate" type="application/atom+xml" title="'.Options::get('title').' &raquo; '.$this->post->title_out.' Comments Feed" href="'.$this->post->comment_feed_link.'">'."\n";
        }

        return $out;
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

    public function add_template_vars()
    {
        if ($this->request->display_page && URL::get_matched_rule()->entire_match == 'archive') {
            if (!$this->template_engine->assigned('entries')) {
                $this->assign('entries', Posts::get(array('content_type' => 'entry', 'status' => Post::status('published'), 'nolimit' => true)));
            }
        }

        parent::add_template_vars();
    }

    public function comment_class($comment, $post)
    {
    	$classes = array('comment');

    	if ($comment->status == Comment::STATUS_UNAPPROVED) {
            $classes[] = 'unapproved';
        }

        if ($u = User::get($comment->email)) {
            $classes[] = 'byuser';
            $classes[] = 'comment-author-'.Utils::slugify($u->displayname);
        }

        if ($comment->email == $post->author->email) {
            $classes[] = 'bypostauthor';
        }

    	echo implode(' ', $classes);
    }

    public function navigation()
    {
        $items = array();

        if ($this->request->display_home) {
            $items[] = 'Home';
        } else {
            $items[] = sprintf('<a href="%s" title="%s" rel="home">Home</a>', Site::get_url('habari'), Options::get('title'));
        }

        $pages = Posts::get(array('content_type' => 'page', 'status' => Post::status('published')));

        foreach ($pages as $page) {
            if (isset($this->post) && $this->post->id == $page->id) {
                $items[] = $page->title;
            } else {
                $items[] = "<a href=\"$page->permalink\" title=\"$page->title\">$page->title</a>";
            }
        }

        $items = array_map('sprintf', array_fill(0, count($items), '<li>%s</li>'), $items);

        echo implode("\n", $items);
    }
}
