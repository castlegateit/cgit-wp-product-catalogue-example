<div class="<?= CGIT_PRODUCT_POST_TYPE ?>-search-form">

    <form action="/" method="get">

        <input type="hidden" name="post_type" value="<?= CGIT_PRODUCT_POST_TYPE ?>" />

        <p>
            <label for="product_keyword">Keywords</label>
            <input type="text" name="s" id="product_keyword" value="<?= get_query_var('s') ?>" />
        </p>

        <p>
            <label for="product_min_price">Minimum price</label>
            <?= CGIT_PRODUCT_CURRENCY ?> <input type="text" name="min_price" id="product_min_price" value="<?= get_query_var('min_price') ?>" />
        </p>

        <p>
            <label for="product_max_price">Maximum price</label>
            <?= CGIT_PRODUCT_CURRENCY ?> <input type="text" name="max_price" id="product_max_price" value="<?= get_query_var('max_price') ?>" />
        </p>

        <p>
            <label for="product_manufacturer">Manufacturer</label>
            <select name="manufacturer" id="product_manufacturer">
                <option value="nintendo"<?= get_query_var('manufacturer') == 'nintendo' ? ' selected' : '' ?>>Nintendo</option>
                <option value="sega"<?= get_query_var('manufacturer') == 'sega' ? ' selected' : '' ?>>Sega</option>
                <option value="sony"<?= get_query_var('manufacturer') == 'sony' ? ' selected' : '' ?>>Sony</option>
            </select>
        </p>

        <button>Search</button>

    </form>

</div>
