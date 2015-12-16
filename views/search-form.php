<div class="<?= CGIT_PRODUCT_POST_TYPE ?>-search-form">

    <form action="/" method="get">

        <input type="hidden" name="post_type" value="<?= CGIT_PRODUCT_POST_TYPE ?>" />

        <p>
            <label for="product_keyword">Keywords</label>
            <input type="text" name="s" id="product_keyword" />
        </p>

        <p>
            <label for="product_min_price">Minimum price</label>
            <?= CGIT_PRODUCT_CURRENCY ?> <input type="text" name="min_price" id="product_min_price" />
        </p>

        <p>
            <label for="product_max_price">Maximum price</label>
            <?= CGIT_PRODUCT_CURRENCY ?> <input type="text" name="max_price" id="product_max_price" />
        </p>

        <p>
            <label for="product_size">Size</label>
            <select name="size" id="product_size">
                <option value="small">Small</option>
                <option value="medium">Medium</option>
                <option value="large">Large</option>
            </select>
        </p>

        <button>Search</button>

    </form>

</div>
