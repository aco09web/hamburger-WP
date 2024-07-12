<?php
if (is_search()) $search_query = esc_html(get_search_query());
?>
<form class="p-search--form" method="get" action="<?php echo esc_url(home_url('/')); ?>">
    <label class="p-search__label screen-reader-text" for="s"><?php echo esc_attr_e('search', 'hamburger'); ?></label>
    <p class="p-search--box c-bg-color--white">
        <input id="s" type="text" placeholder="" name="s" id="s" value="<?php
                                                                        if (isset($search_query)) {
                                                                            echo $search_query;
                                                                        } ?>">
    </p>
    <p><button class="p-search--submit c-text--bold c-text--gray--primary" type="submit"><?php echo esc_attr_e('search', 'hamburger'); ?></button></p>
</form>