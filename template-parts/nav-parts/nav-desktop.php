<nav class="nav-desktop maweo-border-bottom--<?php echo $borderClass ?>">
    <div class="nav-desktop__wrapper container">
        <div class="nav-desktop__links-wrapper">
            <a href="<?php echo get_home_url() ?>" class="nav-desktop__links-logo">
                <img src="<?php echo $logo['url'] ?>" alt="<?php echo $logo['alt'] ?>" class="nav-desktop__logo" />
            </a>
            <ul class="nav-desktop__links">
                <?php foreach ($mainMenuDe['menu_item'] as $index => $menuItem): ?>
                    <?php $menuType = $menuItem['menu_type']; ?>

                    <!-- MenuType Link -->
                    <?php if ($menuType === "link"): ?>
                        <li>
                            <?php echo maweo_get_link($menuItem['link'], ''); ?>
                        </li>
                    <?php endif; ?>

                    <!-- MenuType Dropdown -->
                    <?php if ($menuType === "dropdown"): ?>
                        <?php $subLinks = $menuItem['dropdown'][0]['sub_links']; ?>
                        <li>
                            <?php echo maweo_get_link($menuItem['dropdown'][0]['link'], ''); ?>
                            <ul class="nav-desktop__dropdown">
                                <?php foreach ($subLinks as $subLink): ?>
                                    <?php echo maweo_get_link($subLink['sub_link'], 'nav-desktop__dropdown--link'); ?>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    <?php endif; ?>

                    <!-- MenuType MegaMenu -->
                    <?php if ($menuType === "mega"): ?>
                        <?php $subMenus = $menuItem['mega_menu']['submenu']; ?>
                        <li>
                            <a>
                                <?php echo $menuItem['mega_menu']['title'] ?>
                            </a>
                            <div class="nav-desktop__mega-box">
                                <div class="nav-desktop__mega-box__content">
                                    <?php foreach ($subMenus as $subMenu): ?>
                                        <?php
                                        $title = $subMenu['link']['title'];
                                        $url = $subMenu['link']['url'];
                                        $subLinks = $subMenu['sub_links'];
                                        ?>
                                        <div class="nav-desktop__mega-box__sub-menu">
                                            <div>
                                                <?php echo maweo_get_link($subMenu['link'], 'nav-desktop__mega-box__sub-menu-title'); ?>
                                            </div>
                                            <div class="nav-desktop__mega-box__sub-menu-title-border"></div>
                                            <ul class="nav-desktop__mega-box__sub-menu-links">
                                                <?php foreach ($subLinks as $subLink): ?>
                                                    <?php
                                                    $subLinkTitle = $subLink['sub_link']['title'];
                                                    $subLinkUrl = $subLink['sub_link']['url'];
                                                    ?>
                                                    <li>
                                                        <?php echo maweo_get_link($subLink['sub_link'], 'nav-desktop__mega-box__sub-menu-link'); ?>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
            <div class="nav-desktop__actions">
            <a href="<?php echo wc_get_cart_url(); ?>" class="nav-desktop__cart-link">
                <img src="<?php echo get_stylesheet_directory_uri() . '/assets/icons/cart.svg' ?>" alt="Cart Icon"
                    class="nav-desktop__actions-icon" />
            </a>
            <a class="nav-desktop__cart-link" href="<?php echo wc_get_page_permalink('myaccount') ?>">
                <img src="<?php echo get_stylesheet_directory_uri() . '/assets/icons/user.svg' ?>" alt="Account Icon"
                    class="nav-desktop__actions-icon" />
            </a>

            <?php if ($show_language_switcher): ?>
                <?php include (get_stylesheet_directory() . '/template-parts/nav-parts/language-switch.php') ?>
            <?php endif; ?>
        </div>
        </div>
        
    </div>
</nav>