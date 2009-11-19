<?php $theme->display('header') ?>

    <article id="post-<?php echo $post->id ?>">
        <header>
            <h2><a href="<?php echo $post->permalink ?>" rel="bookmark"><?php echo $post->title ?></a></h2>
            <time datetime="<?php echo $post->pubdate->text_format('{Y}-{m}-{d}T{H}:{i}:{s}{O}') ?>"><?php echo $post->pubdate->text_format('{N}{S} {F} {Y}') ?></time>
            <span class="tags">tags: <?php echo $post->tags_out ?></span>
        </header>
        <?php echo $post->content_out ?>
    </article>

<?php if (Session::has_messages()) { Session::messages_out(); } ?>

<div id="comments">
<a href="<?php echo $post->comment_feed_link ?>"><?php _e('Feed for this Entry') ?></a>
    <?php if ($post->comments->pingbacks->count): ?>
            <div id="pings">
            <h4><?php echo $post->comments->pingbacks->approved->count ?> <?php echo _n('Pingback', 'Pingbacks', $post->comments->pingbacks->count) ?> <?php _e('to') ?> <?php echo $post->title ?></h4>
                <ul id="pings-list">
                    <?php foreach ($post->comments->pingbacks->approved as $pingback): ?>
                        <li id="ping-<?php echo $pingback->id ?>">
                                <div class="comment-content">
                                <?php echo $pingback->content ?>
                                </div>
                                <div class="ping-meta"><a href="<?php echo $pingback->url ?>"><?php echo $pingback->name ?></a></div>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif ?>

    <h4 class="commentheading"><?php echo $post->comments->comments->approved->count ?> <?php echo _n('Response', 'Responses', $post->comments->comments->approved->count ); ?> <?php _e('to'); ?> <?php echo $post->title; ?></h4>
    <ul id="commentlist">

        <?php
        if ($post->comments->moderated->count) {
            foreach ($post->comments->moderated as $comment) {
            $class = 'class="comment';
            if ($comment->status == Comment::STATUS_UNAPPROVED) {
                $class.= '-unapproved';
            }
            $class.= '"';
        ?>

            <li id="comment-<?php echo $comment->id ?>" <?php echo $class ?>>
                <div class="comment-content">
                <?php echo $comment->content_out ?>
               </div>
            <div class="comment-meta">#<a href="#comment-<?php echo $comment->id ?>" class="counter" title="<?php _e('Permanent Link to this Comment') ?>"><?php echo $comment->id ?></a> |
               <span class="commentauthor"><?php _e('Comment by') ?> <a href="<?php echo $comment->url ?>"><?php echo $comment->name ?></a></span>
               <span class="commentdate"> <?php _e('on') ?> <a href="#comment-<?php echo $comment->id ?>" title="<?php _e('Time of this comment') ?>"><?php $comment->date->out('M j, Y h:ia') ?></a></span><h5><?php if ($comment->status == Comment::STATUS_UNAPPROVED): ?> <em><?php _e('In moderation') ?></em><?php endif ?></h5></div>
              </li>

        <?php
            }
        }
        else {
            _e('There are currently no comments.');
        }
        ?>
    </ul>
    <div class="comments">

        <br>
        <form id="comments_form" action="<?php URL::out('submit_feedback', array('id' => $post->id)) ?>" method="post">

        <fieldset>
            <legend><?php _e('Add to the Discussion') ?></legend>
            <p>
            <textarea name="content" id="commentContent" cols="20" rows="10"></textarea>
            </p>
        </fieldset>

        <fieldset>
            <p>
            <label for="name"><?php _e('Name:') ?> <span class="required"><?php if (Options::get('comments_require_id') == 1) : ?> *<?php endif ?></span></label>
            <input name="name" id="name" value="<?php echo $commenter_name ?>" type="text" >
            </p>

            <p>
            <label for="email"><?php _e('Email:') ?> <span class="required"><?php if (Options::get('comments_require_id') == 1) : ?> *<?php endif ?></span></label>
            <input name="email" id="email" value="<?php echo $commenter_email ?>" type="text" >
            </p>

            <p>
            <label for="url"><?php _e('URL:') ?></label>
            <input name="url" id="url" value="<?php echo $commenter_url ?>" type="text" >
            </p>
        </fieldset>

        <p><input id="submit" class="submit" name="submit" value="<?php _e('Comment') ?>" type="submit"></p>
        </form>
    </div>

</div>

<?php $theme->display('footer') ?>
