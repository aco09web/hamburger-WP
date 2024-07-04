                <?php
                if (is_search()) $search_query = esc_html(get_search_query());
                ?>
                <form class="p-search--form" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                    <label class="p-search__label" for="header-search">検索</label>
                    <p class="p-search--box c-bg-color--white">
                        <input id="header-search" type="text" placeholder="" name="s" id="s" value="<?php
                                                                                                    if (isset($search_query)) {
                                                                                                        echo $search_query;
                                                                                                    } ?>">
                    </p>
                    <p><button class="p-search--submit c-text--bold c-text--gray--primary" type="submit">検索</button></p>
                </form>