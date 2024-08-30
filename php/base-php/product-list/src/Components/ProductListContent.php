<?php 
    $pageTitle = 'Product List';
    $buttons = __DIR__ . '/ProductListButtons.php';
    include(__DIR__ . '/Header.php');
?>
<main id="main-content" class="page-content">
    <section class="product-list page-section">
        <div class="product-card product-list__item">
            <input type="checkbox" class="delete-checkbox" >
            <div class="product-card__content">
                <p>type</p>
                <p>name</p>
                <p>price</p>
                <p>special attribute</p>
            </div>
        </div>
    </section>
</main>
<?php
    include(__DIR__ . '/Footer.php');
?>