<?php
$postId = get_the_ID();
$tags = wp_get_post_terms( get_queried_object_id(), 'post_tag', ['fields' => 'ids'] );

$relatedPostsArgs = [
    "type"  => 'post',
    'posts_per_page'      => 3,
    "order_by"  => 'date',
    "order" => 'ASC',
    'ignore_sticky_posts' => 1,
    'post__not_in' => array( $post->ID ),
    'tax_query' => [
        [
            'taxonomy' => 'post_tag',
            'terms'    => $tags
        ]
    ]
];

$relatedPosts = new WP_Query($relatedPostsArgs);

?>

<?php if($relatedPosts->have_posts()): ?>
<div class="alignfull">
    <div class="alignwide">
        <div class="related-posts">
            <p class="section-heading">Related Articles</p>
            <div class="dd-card-list">
                <?php  while($relatedPosts->have_posts()) : $relatedPosts->the_post();?>
                    <?php get_template_part('template-parts/card', 'post'); ?>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>