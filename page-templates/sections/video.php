<?php
$heading = get_sub_field('heading');
$heading_tag = get_sub_field('heading_tag');
$text = get_sub_field('text');
$video_url = get_sub_field('video_url');
$link = get_sub_field('link');

?>

<section class="video-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php echo maweo_get_heading($heading, $heading_tag, "video-section__heading mb-0") ?>
                <?php if ($text): ?>
                    <div class="maweo-wysiwyg video-section__text">
                        <?php echo $text ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-12">
                <div class="video-section__video">
                    <iframe src="<?php echo $video_url ?>" frameborder="0"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
    <?php if ($link): ?>
        <?php echo maweo_get_link($link, "maweo-button video-section__button" . $is_centered_class) ?>
    <?php endif; ?>
    </div>
</section>