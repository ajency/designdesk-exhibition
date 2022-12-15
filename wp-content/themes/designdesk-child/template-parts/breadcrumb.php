<?php
$postId = get_the_ID();
?>

<div class="dd-breadcrumb">
    <div class="site-inner">
        <div class="dd-breadcrumb__wraper">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo home_url() ?>" class="link">Home</a></li>
                <?php if ( is_singular( 'post' ) || is_tag() ) { ?>
                    <li class="breadcrumb-item"><a href="<?php echo site_url().'/blogs'; ?>" class="link">Blogs</a></li>
                <?php } ?>
                <?php  if ( is_single()) { ?>
                    <li class="breadcrumb-item active"><a class="link"><?php the_title() ?></a></li>
                <?php } elseif (is_page()) { ?>
                    <li class="breadcrumb-item active"><a class="link"><?php the_title() ?></a></li>
                <?php } elseif (is_archive()) { ?>
                    <li class="breadcrumb-item active"><a class="link"><?php single_term_title() ?></a></li>
                <?php } elseif (is_search()) { ?>
                    <li class="breadcrumb-item active"><a class="link">Search Results for...  <?php echo the_search_query(); ?></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>