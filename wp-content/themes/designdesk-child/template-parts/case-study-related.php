<?php
$postId = get_the_ID();

$relatedPostsArgs = [
    'post_type'  => 'dd_case_study',
    'posts_per_page'      => 3,
    "order_by"  => 'date',
    "order" => 'DESC',
    'ignore_sticky_posts' => 1,
    'post__not_in' => array( $post->ID ),
];

$relatedPosts = new WP_Query($relatedPostsArgs);

?>

<?php if($relatedPosts->have_posts()): ?>
<div class="alignfull">
    <div class="alignwide">
        <hr class="mb-40 horizontal-seperator">
        <div class="related-posts">
            <p class="section-heading">Other Projects</p>
            <div class="dd-card-list">
                <?php  while($relatedPosts->have_posts()) : $relatedPosts->the_post();?>
                    <?php get_template_part('template-parts/card', 'case-study'); ?>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>