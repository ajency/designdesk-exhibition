<?php
$postId = get_the_ID();
$term = get_queried_object();
?>

<div class="dd-breadcrumb">
    <div class="site-inner">
        <div class="dd-breadcrumb__wraper">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo home_url() ?>" class="link">Home</a></li>
                <?php if (is_singular('post')) { ?>
                    <li class="breadcrumb-item"><a href="<?php echo site_url() . '/blogs'; ?>" class="link">Blogs</a></li>
                <?php } ?>
                <?php if (is_singular('dd_case_study')) { ?>
                    <li class="breadcrumb-item"><a href="<?php echo site_url() . '/case-studies'; ?>" class="link">Case Studies</a></li>
                <?php } ?>
                <?php if (is_single()) { ?>
                    <li class="breadcrumb-item active"><a class="link"><?php the_title() ?></a></li>
                <?php } elseif (is_page()) { ?>
                    <li class="breadcrumb-item active"><a class="link"><?php the_title() ?></a></li>
                <?php } elseif (is_tag()) { ?>
                    <?php if ($term->taxonomy == 'post_tag'){?>
                        <li class="breadcrumb-item"><a href="<?php echo site_url() . '/blogs'; ?>" class="link">Blogs</a></li>
                    <?php }?>
                    <li class="breadcrumb-item active"><a class="link"><?php echo $term->name;  ?></a></li>
                <?php } elseif (is_archive()) { ?>
                    <li class="breadcrumb-item active"><a class="link"><?php echo $term->label;  ?></a></li>
                <?php } elseif (is_search()) { ?>
                    <li class="breadcrumb-item active"><a class="link">Search Results for... <?php echo the_search_query(); ?></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>