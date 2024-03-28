<nav class="nav-desktop maweo-border-bottom--<?php echo $borderClass ?>">
    <div class="nav-desktop__wrapper container">
        <a href="<?php echo get_home_url() ?>">
            <img src="<?php echo $logo['url'] ?>" alt="<?php echo $logo['alt'] ?>" class="nav-desktop__logo" />
        </a>
        <div>
            <ul class="nav-desktop__links">
                <?php foreach($mainMenuDe['menu_item'] as $index => $menuItem): ?>
                    <?php $menuType = $menuItem['menu_type']; ?>

                    <!-- MenuType Link -->
                    <?php if($menuType === "link"): ?>
                        <li>
                            <?php echo maweo_get_link($menuItem['link'], ''); ?>
                        </li>
                    <?php endif; ?>

                    <!-- MenuType Dropdown -->
                    <?php if($menuType === "dropdown"): ?>
                        <?php $subLinks = $menuItem['dropdown'][0]['sub_links']; ?>
                        <li>
                            <?php echo maweo_get_link($menuItem['dropdown'][0]['link'], ''); ?>
                            <ul class="nav-desktop__dropdown">
                                <?php foreach($subLinks as $subLink): ?>
                                    <?php echo maweo_get_link($subLink['sub_link'], 'nav-desktop__dropdown--link'); ?>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    <?php endif; ?>

                    <!-- MenuType MegaMenu -->
                    <?php if($menuType === "mega"): ?>
                        <?php $subMenus = $menuItem['mega_menu']['submenu']; ?>
                        <li>
                            <a>
                                <?php echo $menuItem['mega_menu']['title'] ?>
                            </a>
                            <div class="nav-desktop__mega-box">
                                <div class="nav-desktop__mega-box__content">
                                    <?php foreach($subMenus as $subMenu): ?>
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
                                                <?php foreach($subLinks as $subLink): ?>
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
            <?php if($show_language_switcher): ?>
                <label htmlFor="language-btn" class="nav-desktop__menu-button language-btn">
                    <i class="bi bi-translate"></i>
                </label>
            <?php endif; ?>
        </div>
    </div>
</nav>