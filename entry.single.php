<?php $theme->display('header') ?>

    <article id="post-<?php echo $post->id ?>">
        <header>
            <h2><a href="<?php echo $post->permalink ?>" rel="bookmark"><?php echo $post->title ?></a></h2>
            <time datetime="<?php echo $post->pubdate->text_format('{Y}-{m}-{d}T{H}:{i}:{s}{P}') ?>"><?php echo $post->pubdate->text_format('{N}{S} {F} {Y}') ?></time>
            <span class="tags">tags: <?php echo $post->tags_out ?></span>
        </header>
        <?php echo $post->content_out ?>
    </article>

<?php if (Session::has_messages()) { Session::messages_out(); } ?>

<section id="feedback">
    <h4>Feedback</h4>
    <?php if ($post->comments->pingbacks->count): ?>
    <div id="pings">
        <?php foreach ($post->comments->pingbacks->approved as $pingback): ?>
        <article id="ping-<?php echo $pingback->id ?>">
            <div class="content"><?php echo $pingback->content ?></div>
            <footer>
                <a href="<?php echo $pingback->url ?>"><?php echo $pingback->name ?></a>
            </footer>
        </article>
        <?php endforeach ?>
    </div>
    <?php endif ?>

    <?php if ($post->comments->moderated->count): ?>
    <div id="comments">
        <?php foreach ($post->comments->moderated as $comment): ?>
        <article id="comment-<?php echo $comment->id ?>" class="<?php $theme->comment_class($comment, $post) ?>">
            <header>
                <a href="<?php echo $comment->url ?>"><?php echo $comment->name ?></a>
                <time datetime="<?php echo $comment->date->text_format('{Y}-{m}-{d}T{H}:{i}:{s}{O}') ?>">
                   <a href="#comment-<?php echo $comment->id ?>"><?php $comment->date->out('NS F Y') ?></a>
                   </time>
            </header>
            <div class="content"><?php echo $comment->content_out ?></div>
        </article>
        <?php endforeach ?>
    </div>
    <?php endif ?>

        <form action="<?php URL::out('submit_feedback', array('id' => $post->id)) ?>" method="post">
        <fieldset>
            <dl>
            <dt></dt>
            <dd>
                <textarea name="content" id="comment-content" cols="20" rows="10"></textarea>
            </dd>

            <dt>
                <label for="name"><?php _e('Name') ?> <span class="required"><?php if (Options::get('comments_require_id') == 1) : ?> *<?php endif ?></span></label>
            </dt>
            <dd>
                <input name="name" id="name" value="<?php echo $commenter_name ?>" type="text" >
            </dd>

            <dt>
                <label for="email"><?php _e('Email') ?> <span class="required"><?php if (Options::get('comments_require_id') == 1) : ?> *<?php endif ?></span></label>
            </dt>
            <dd>
                <input name="email" id="email" value="<?php echo $commenter_email ?>" type="text" >
            </dd>

            <dt>
                <label for="url"><?php _e('URL') ?></label>
            </dt>
            <dd>
                <input name="url" id="url" value="<?php echo $commenter_url ?>" type="text" >
            </dd>
            </dl>
        </fieldset>

        <p><input id="submit" class="submit" name="submit" value="<?php _e('Comment') ?>" type="submit"></p>
        </form>
</section><!-- /feedback -->

<?php $theme->display('footer') ?>
