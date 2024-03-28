<?php 
    $heading = get_sub_field('heading');
    $heading_tag = get_sub_field('heading_tag');
    $text = get_sub_field('text');

    $downloads = get_sub_field('downloads');
    $download_icon = get_image_data_from_sub_field('download_icon');

    $style = "";
    $background = get_sub_field('background');
    if($background === "image") {
        $bg_image = get_image_data_from_sub_field('background_image');
        $style = "style='background-image: url(".$bg_image['url'].");'";
    }
?>

<section class="downloads downloads--<?php echo $background ?>" <?php echo $style ?>>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php echo maweo_get_heading($heading, $heading_tag, "downloads__heading") ?>
                <?php if($text): ?>
                    <div class="maweo-wysiwyg downloads__text">
                        <?php echo $text; ?>
                    </div>
                <?php endif; ?>
                <div class="downloads__container">
                    <?php foreach($downloads as $download) : ?>
                        <?php 
                            $title = get_the_title($download['download']);
                            $description = get_field('description', $download['download']);
                            $file = get_field('file', $download['download']);
                        ?>
                        <a class="downloads__card" download href="<?php echo $file?>" target="_blank" rel="noopener noreferrer">
                            <div class="downloads__card-content"> 
                                <div class="downloads__card-heading">
                                    <?php echo $title; ?>
                                </div>
                                <div class="maweo-wysiwyg downloads__card-text">
                                    <?php echo $description; ?>
                                </div>
                            </div>
                            <?php if($download_icon): ?>
                                <img 
                                    src="<?php echo $download_icon['url']?>" 
                                    alt="<?php echo $download_icon['alt']?>"
                                    class="downloads__card-icon"
                                >
                            <?php endif; ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>