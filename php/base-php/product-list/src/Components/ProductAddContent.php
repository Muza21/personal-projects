<?php 
    $pageTitle = 'Product Add';
    $buttons = __DIR__ . '/ProductAddButtons.php';
    include(__DIR__ . '/Header.php');
?>
<main id="main-content" class="page-content">
    <section class="add-product-section">
        <form method="POST" action="/src/Validation/FormSubmission.php" id="product_form">
          <fieldset>
            <div class="input-group">
              <label for="sku" class="input-group__label">SKU:</label>
              <input type="text" name="sku" id="sku" />
              <span class="error-message" id="sku-error"></span>
            </div>
            <div class="input-group">
              <label for="name" class="input-group__label">Name:</label>
              <input type="text" name="name" id="name" />
              <span class="error-message" id="name-error"></span>
            </div>
            <div class="input-group">
              <label for="price" class="input-group__label">Price ($):</label>
              <input type="text" name="price" id="price" />
              <span class="error-message" id="price-error"></span>
            </div>
            <div class="input-group">
              <label for="productType" class="input-group__label">Type Switcher:</label>
              <select name="productType" id="productType">
                <option value="" disabled selected>Type Switcher</option>
                <option value="DVD">DVD</option>
                <option value="Book">Book</option>
                <option value="Furniture">Furniture</option>
              </select>
              <span class="error-message" id="productType-error"></span>
            </div>
          </fieldset>
          <fieldset class="specific-fields">
            <div class="input-group dvd-fields">
              <label for="size" class="input-group__label">Size (MB):</label>
              <input type="text" name="size" id="size" />
              <span class="error-message" id="size-error"></span>
            </div>
            <div class="input-group dvd-fields">
              <p>Please, provide size</p>
            </div>
            <div class="input-group book-fields">
              <label for="weight" class="input-group__label">Weight (KG):</label>
              <input type="text" name="weight" id="weight" />
              <span class="error-message" id="weight-error"></span>
            </div>
            <div class="input-group book-fields">
              <p>Please, provide weight</p>
            </div>
            <div class="input-group furniture-fields">
              <label for="height" class="input-group__label">Height (CM):</label>
              <input type="text" name="height" id="height" />
              <span class="error-message" id="height-error"></span>
            </div>
            <div class="input-group furniture-fields">
              <label for="width" class="input-group__label">Width (CM):</label>
              <input type="text" name="width" id="width" />
              <span class="error-message" id="width-error"></span>
            </div>
            <div
              class="input-group furniture-fields"
              data-product-type="Furniture"
            >
              <label for="length" class="input-group__label">Length (CM):</label>
              <input type="text" name="length" id="length" />
              <span class="error-message" id="length-error"></span>
            </div>
            <div
              class="input-group furniture-fields"
              data-product-type="Furniture"
            >
              <p>Please, provide dimensions</p>
            </div>
          </fieldset>
        </form>
      </section>
</main>

<?php
    include(__DIR__ . '/Footer.php');
?>
