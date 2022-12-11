<?php
$portfoliosQuery = new WP_Query([
    'post_type' => 'dd_portfolio',
    'posts_per_page' => -1
]);
$stallSizes = [];
$locations = [];

$industries = get_terms('dd_industries');

if($portfoliosQuery->have_posts()):
    while($portfoliosQuery->have_posts()) : $portfoliosQuery->the_post();

        $stallSize = get_field('stall_size');
        if(!in_array($stallSize, $stallSizes, true) AND !empty($stallSize)):
            array_push($stallSizes, $stallSize);
        endif;

        $location = get_field('location');
        if(!in_array($location, $locations, true) AND !empty($location)):
            array_push($locations, $location);
        endif;

    endwhile;
endif;
?>


<div class="dd-filters">
<div class="dd-filters__wraper">
<div class="field-group">
<div id="reset-button" onclick="resetFilter(this)"></div>
<label for="stallSize">Stall Size</label>
<select class="dd-select" id="stallSizes">
    <option value="hide">Select Stall Size</option>
    <?php
        foreach( $stallSizes as $stallSize ) {?>
            <option class="filter-list-item" value="<?php echo $stallSize ?>" data-slug="<?php echo cleanStr($stallSize) ?>"><?php echo $stallSize ?></option>
        <?php }
    ?>
</select> 
</div>
<div class="field-group">
<label for="industries">Industry</label>
<div id="reset-button" onclick="resetFilter(this)"></div>
<select class="dd-select" id="industries">
    <option value="hide">Select Industry</option>
    <?php
        foreach( $industries as $industry ) {?>
            <option class="filter-list-item" value="<?php echo $industry->name ?>" data-slug="<?php echo $industry->slug ?>"><?php echo $industry->name ?></option>
        <?php }
    ?>
</select> 
</div>
<div class="field-group">
<label for="locations">Location</label>
<div id="reset-button" onclick="resetFilter(this)"></div>
<select class="dd-select" id="locations">
    <option value="hide">Select Location</option>
    <?php
        foreach( $locations as $location ) {?>
            <option class="filter-list-item" value="<?php echo $location ?>" data-slug="<?php echo cleanStr($location) ?>"><?php echo $location ?></option>
        <?php }
    ?>
</select> 
</div>

</div>
</div>