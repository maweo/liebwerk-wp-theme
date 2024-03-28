<?php
$heading = get_sub_field('heading');
$heading_tag = get_sub_field('heading_tag');
$text = get_sub_field('text');
$grid_elements = get_sub_field('grid_element'); 
?>

<section class="grid">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8 text-lg-center grid__content">
                <?php echo maweo_get_heading($heading, $heading_tag, "grid__heading" ) ?>
                <?php if ($text): ?>
                    <div class="grid__text">
                        <?php echo $text ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php if ($grid_elements) : ?>
            <div class="row grid__row">
                <?php foreach( $grid_elements as $gridelem) : ?>
                    <?php 
                        $icon = $gridelem['icon'];
                        $title = $gridelem['title'];
                        $text = $gridelem['text'];
                        $link = $gridelem['link'];
                    ?>
                    <div class="col-12 col-lg-3 grid__element">
                        <?php if ($icon) { ?>
                            <img src="<?php echo $icon['url'] ?>" alt="<?php echo $icon['alt'] ?>"
                                class="grid__element-icon">
                        <?php } else { ?>
                            <div class="grid__element-icon"></div>
                        <?php }; ?>
                        <?php if ($title) : ?>
                            <div class="grid__element-title">
                                <?php echo $title; ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($text) : ?>
                            <div class="grid__element-text wysiwyg">
                                <?php echo $text; ?>
                            </div>
                        <?php endif; ?>
                        <?php if($link) : 
                            echo maweo_get_link($link, "grid__element-link");
                        endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
