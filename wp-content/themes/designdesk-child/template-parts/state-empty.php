<?php
$post_type_title = $args['post_type_title'];
?>

<div class="empty-state">
    <p class="h4-reg-400 title">No <?php if($post_type_title): echo __( $post_type_title ); else: echo "posts"; endif; ?> Found!</p>
</div>