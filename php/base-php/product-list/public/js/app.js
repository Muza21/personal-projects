"use strict";

const productType = document.getElementById("productType");
const saveButton = document.getElementById("save-btn");
const deleteCheckboxButton = document.getElementById("delete-product-btn");

if (deleteCheckboxButton) {
  deleteCheckboxButton.addEventListener("click", deleteSelectedProducts);
}

if (productType) {
  productType.addEventListener("change", displaySpecialInputs);
}

if (saveButton) {
  saveButton.addEventListener("click", formSubmission);
}

function deleteSelectedProducts() {
  const checkboxes = document.querySelectorAll(".delete-checkbox");
  const selectedProductIds = Array.from(checkboxes)
    .filter((checkbox) => checkbox.checked)
    .map((checkbox) => checkbox.dataset.productId);

  fetch("src/Validation/DeleteProducts.php", {
    method: "DELETE",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({ productIds: selectedProductIds }),
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error("Network response was not ok");
      }
      return response.json();
    })
    .then((data) => {
      populateProductList(data.products);
    })
    .catch((error) => {
      console.error("Fetch error:", error);
    });
}

function displaySpecialInputs() {
  const selectedOption = this.value.toLowerCase();
  document
    .querySelectorAll(".specific-fields .input-group")
    .forEach(function (inputGroup) {
      inputGroup.classList.remove("visible");
    });
  document
    .querySelectorAll(".specific-fields ." + selectedOption + "-fields")
    .forEach(function (inputGroup) {
      inputGroup.classList.add("visible");
    });
}

function formSubmission() {
  const sku = document.getElementById("sku").value.trim();
  const name = document.getElementById("name").value.trim();
  const price = document.getElementById("price").value.trim();
  const type = productType.value.trim();

  if (!validation(sku, name, price, type)) {
    return;
  }

  const specialAttributes = {
    DVD: () => ({ size: document.getElementById("size").value.trim() }),
    Book: () => ({ weight: document.getElementById("weight").value.trim() }),
    Furniture: () => ({
      height: document.getElementById("height").value.trim(),
      width: document.getElementById("width").value.trim(),
      length: document.getElementById("length").value.trim(),
    }),
  };

  const getSpecialAttribute = specialAttributes[type];
  const specialAttribute =
    typeof getSpecialAttribute === "function" ? getSpecialAttribute() : "";

  const formData = {
    sku: sku,
    name: name,
    price: price,
    productType: type,
    specialAttribute: specialAttribute,
  };

  fetch("src/Validation/FormSubmission.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(formData),
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error("Network response was not ok");
      }
      return response.json();
    })
    .then((data) => {
      if (data.redirectTo) {
        window.location.href = data.redirectTo;
      }
      if (data.errors) {
        displayErrors(data.errors);
      }
    })
    .catch((error) => {
      console.error("Fetch error:", error);
    });
}

function validation(sku, name, price, type) {
  let validated = true;
  if (!validateProductAttributes(sku, name, price, type)) {
    validated = false;
  }

  if (!validateSpecificAttributes(type)) {
    validated = false;
  }

  return validated;
}

function validateProductAttributes(sku, name, price, type) {
  let validated = true;
  if (!sku) {
    validated = false;
    document.getElementById("sku-error").textContent =
      "Please, submit required data";
  } else if (!/^[a-zA-Z0-9_.,!@#$%^&*()-]*$/.test(sku)) {
    validated = false;
    document.getElementById("sku-error").textContent =
      "Please, provide the data of indicated type";
  } else {
    document.getElementById("sku-error").textContent = "";
  }
  if (!name) {
    validated = false;
    document.getElementById("name-error").textContent =
      "Please, submit required data";
  } else if (!/^[a-zA-Z0-9_.,!@#$%^&*()-]*$/.test(name)) {
    validated = false;
    document.getElementById("name-error").textContent =
      "Please, provide the data of indicated type";
  } else {
    document.getElementById("name-error").textContent = "";
  }
  if (!price) {
    validated = false;
    document.getElementById("price-error").textContent =
      "Please, submit required data";
  } else if (!/^\d*\.?\d+$/.test(price)) {
    validated = false;
    document.getElementById("price-error").textContent =
      "Please, provide the data of indicated type";
  } else {
    document.getElementById("price-error").textContent = "";
  }
  if (!type) {
    validated = false;
    document.getElementById("productType-error").textContent =
      "Please, submit required data";
  } else {
    document.getElementById("productType-error").textContent = "";
  }
  return validated;
}

function validateNumericValue(value) {
  return /^\d+$/.test(value);
}

function validateSpecificAttributes(type) {
  let validated = true;
  const typeAttributes = {
    DVD: ["size"],
    Book: ["weight"],
    Furniture: ["height", "width", "length"],
  };

  const attributeNames = typeAttributes[type];
  if (attributeNames) {
    attributeNames.forEach((attributeName) => {
      const attributeValue = document.getElementById(attributeName).value;
      if (!attributeValue) {
        validated = false;
        document.getElementById(`${attributeName}-error`).textContent =
          "Please, submit required data";
      } else if (!validateNumericValue(attributeValue)) {
        validated = false;
        document.getElementById(`${attributeName}-error`).textContent =
          "Please, provide the data of indicated type";
      } else {
        document.getElementById(`${attributeName}-error`).textContent = "";
      }
    });
  }
  return validated;
}

document.addEventListener("DOMContentLoaded", function () {
  fetch("src/Validation/GetData.php")
    .then((response) => {
      return response.json();
    })
    .then((data) => {
      populateProductList(data.products);
    })
    .catch((error) => console.error("Fetch error:", error));
});

function capitalizeFirstLetter(string) {
  return string.charAt(0).toUpperCase() + string.slice(1);
}

function populateProductList(products) {
  const productListSection = document.querySelector(".product-list");
  if (productListSection) {
    productListSection.innerHTML = "";
    products.forEach(function (product) {
      const productCard = document.createElement("div");
      let specialAttributesHtml = "";
      if (product.special_attribute) {
        const specialAttributes = JSON.parse(product.special_attribute);
        const attributeValues = Object.values(specialAttributes);
        specialAttributesHtml = attributeValues.join("x");

        if (attributeValues.length === 1) {
          specialAttributesHtml = `${capitalizeFirstLetter(
            Object.keys(specialAttributes)[0]
          )}: ${specialAttributesHtml}`;
        } else {
          specialAttributesHtml = `Dimensions: ${specialAttributesHtml}`;
        }
      }
      productCard.classList.add("product-card", "product-list__item");
      productCard.innerHTML = `
          <input type="checkbox" class="delete-checkbox" data-product-id="${product.id}">
          <div class="product-card__content">
              <p>${product.type}</p>
              <p>${product.name}</p>
              <p>${product.price} &#36;</p>
              <p>${specialAttributesHtml}</p>
          </div>
      `;
      productListSection.appendChild(productCard);
    });
  }
}

function displayErrors(errors) {
  for (const [key, value] of Object.entries(errors)) {
    document.getElementById(`${key}-error`).textContent = value;
  }
}
