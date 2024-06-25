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