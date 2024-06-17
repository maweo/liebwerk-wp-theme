<nav class="nav-desktop maweo-border-bottom--<?php echo $borderClass ?>">
    <div class="nav-desktop__wrapper container">
        <div class="nav-desktop__links-wrapper">
            <a href="<?php echo get_home_url() ?>">
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
        </div>
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
                <?php if (function_exists('pll_the_languages')): ?>
                    <div class="language-switch">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="languageDropdown" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <?php
                                $current_locale = pll_current_language('locale');
                                $current_lang_code = substr($current_locale, 0, 2); // Extract the first two characters
                                echo strtolower(esc_html($current_lang_code)); // Convert to lowercase for display
                                ?>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="languageDropdown">
                                <?php
                                $languages = pll_the_languages(array('dropdown' => 0, 'raw' => 1));
                                foreach ($languages as $lang): ?>
                                    <li>
                                        <a class="dropdown-item" href="<?php echo esc_url($lang['url']); ?>">
                                            <?php echo esc_html($lang['name']); ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

        </div>
    </div>
</nav>