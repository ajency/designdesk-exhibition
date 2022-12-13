<?php
$post_tags = get_the_tags();

if ($post_tags) { ?>
    <div class="post-tags-container">
        <p class="title">Tags:</p>
        <ul class="tags">
            <?php foreach ($post_tags as $tag) { ?>
                <li class="tag"><a target="_blank" href="<?php echo esc_attr( get_tag_link( $tag->term_id ) ) ?>"><?php echo $tag->name ?></a></li>
            <?php } ?>
        </ul>
    </div>
<?php } ?>