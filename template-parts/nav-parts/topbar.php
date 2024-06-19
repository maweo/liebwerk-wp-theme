<?php
$topbar_left = get_field('topbar_left', 'option');
$topbar_center = get_field('topbar_center', 'option');
$topbar_right = get_field('topbar_right', 'option');
?>

<div class="topbar">
    <div class="container">
        <div class="topbar__content">
            <?php if ($topbar_left): ?>
                <div class="topbar__text topbar__text--left"><?php echo $topbar_left; ?></div>
            <?php endif; ?>
            <?php if ($topbar_center): ?>
                <div class="topbar__text topbar__text--center"><?php echo $topbar_center; ?></div>
            <?php endif; ?>
            <?php if ($topbar_right): ?>
                <div class="topbar__text topbar__text--right"><?php echo $topbar_right; ?></div>
            <?php endif; ?>
        </div>
    </div>
</div>