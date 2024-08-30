<?php if (function_exists('pll_the_languages')): ?>
    <div class="language-switch">
        <div class="dropdown">
            <button class="btn dropdown-toggle" type="button" id="languageDropdown" data-bs-toggle="dropdown"
                aria-expanded="false">
                <?php
                $current_locale = pll_current_language('locale');
                $current_lang_code = substr($current_locale, 0, 2);
                echo strtolower(esc_html($current_lang_code));
                ?>
            </button>
            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="languageDropdown">
                <?php
                $languages = pll_the_languages(array('dropdown' => 0, 'raw' => 1));

                // Separate English from the rest of the languages
                $english = null;
                foreach ($languages as $key => $lang) {
                    if ($lang['slug'] === 'en') {
                        $english = $lang;
                        unset($languages[$key]);
                        break;
                    }
                }

                // Render all other languages first
                foreach ($languages as $lang): ?>
                    <li>
                        <a class="dropdown-item" href="<?php echo esc_url($lang['url']); ?>">
                            <?php echo esc_html($lang['name']); ?>
                        </a>
                    </li>
                <?php endforeach; ?>

                <?php if ($english): ?>
                    <li>
                        <a class="dropdown-item" href="<?php echo esc_url($english['url']); ?>">
                            <?php echo esc_html($english['name']); ?>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
<?php endif; ?>