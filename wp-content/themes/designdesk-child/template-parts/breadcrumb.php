<?php
$postId = get_the_ID();
?>
<div class="dd-breadcrumb">
    <div class="site-inner">
        <div class="dd-breadcrumb__wraper">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo home_url() ?>" class="link">Home</a></li>
                <li class="breadcrumb-item"><a href="" class="link">Blogs</a></li>
                <li class="breadcrumb-item active"><a class="link"><?php the_title() ?></a></li>
            </ul>
        </div>
    </div>
</div>