<nav class="nav-mobile maweo-border-bottom--<?php echo $borderClass ?>">
    <div class="nav-mobile__wrapper container">
        <a href="<?php echo get_home_url() ?>">
            <img src="<?php echo $logo['url'] ?>" alt="<?php echo $logo['alt'] ?>" class="nav-mobile__logo" />
        </a>

        <div class="nav-mobile__content">
            <input type="radio" name="slider" id="menu-btn" class="nav-mobile__input" />
            <input type="radio" name="slider" id="close-btn" class="nav-mobile__input" />

            <ul class="nav-mobile__links nav-mobile__links--from-<?php echo $slide_in_direction_mobile ?>">
                <div class="accordion" id="nav-accordion">

                    <?php foreach ($mainMenuDe['menu_item'] as $index => $menuItem): ?>
                        <?php $menuType = $menuItem['menu_type']; ?>

                        <?php if ($menuType === "link"): ?>
                            <div class="nav-mobile__accordion-link-button">
                                <?php echo maweo_get_link($menuItem['link'], 'nav-mobile__accordion-link'); ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($menuType === "dropdown"): ?>
                            <?php
                            $subLinks = $menuItem['dropdown'][0]['sub_links'] ?? [];
                            ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#nav-item-<?php echo $index ?>" aria-expanded="false">
                                        <?php echo $menuItem['dropdown'][0]['link']['title'] ?>
                                    </button>
                                </h2>
                                <div id="nav-item-<?php echo $index ?>" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <ul>
                                            <?php foreach ($subLinks as $subLink): ?>
                                                <li>
                                                    <?php echo maweo_get_link($subLink['sub_link'], 'nav-mobile__accordion-link'); ?>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if ($menuType === "mega"): ?>
                            <?php
                            $subMenus = $menuItem['mega_menu']['submenu'];
                            ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#nav-item-<?php echo $index ?>">
                                        <?php echo $menuItem['mega_menu']['title'] ?>
                                    </button>
                                </h2>
                                <div id="nav-item-<?php echo $index ?>" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <div class="accordion" id="submenu-accordion-<?php echo $index ?>">
                                            <?php foreach ($subMenus as $subMenuIndex => $subMenu): ?>
                                                <?php
                                                $title = $subMenu['link']['title'];
                                                $url = $subMenu['link']['url'];
                                                $subLinks = $subMenu['sub_links'];
                                                $collapseId = "collapse-$index-$subMenuIndex";
                                                ?>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#<?php echo $collapseId ?>">
                                                            <?php echo $title; ?>
                                                        </button>
                                                    </h2>
                                                    <div id="<?php echo $collapseId ?>" class="accordion-collapse collapse">
                                                        <div class="accordion-body">
                                                            <ul>
                                                                <li>
                                                                    <strong>
                                                                        <a href="<?php echo $url; ?>">
                                                                            Alle anzeigen
                                                                        </a>
                                                                    </strong>
                                                                </li>
                                                                <?php foreach ($subLinks as $subLink): ?>
                                                                    <?php
                                                                    $subLinkTitle = $subLink['sub_link']['title'];
                                                                    $subLinkUrl = $subLink['sub_link']['url'];
                                                                    ?>
                                                                    <li>
                                                                        <?php echo maweo_get_link($subLink['sub_link'], ''); ?>
                                                                    </li>
                                                                <?php endforeach; ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </ul>

            <?php if ($show_language_switcher): ?>
                <label for="language-btn" class="nav-mobile__menu-button language-btn">
                    <i class="bi bi-translate"></i>
                </label>
            <?php endif; ?>

            <label for="menu-btn" class="nav-mobile__menu-button menu-btn">
                <i class="bi bi-list"></i>
            </label>

            <label for="close-btn" class="nav-mobile__menu-button close-btn">
                <i class="bi bi-x-lg"></i>
            </label>
        </div>
    </div>
</nav>