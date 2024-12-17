(function () {
    "use strict";

    /**
     * Apply .scrolled class to the body as the page is scrolled down
     */
    function toggleScrolled() {
        const selectBody = document.querySelector("body");
        const selectHeader = document.querySelector("#header");
        if (
            !selectHeader.classList.contains("scroll-up-sticky") &&
            !selectHeader.classList.contains("sticky-top") &&
            !selectHeader.classList.contains("fixed-top")
        )
            return;
        window.scrollY > 100
            ? selectBody.classList.add("scrolled")
            : selectBody.classList.remove("scrolled");
    }

    document.addEventListener("scroll", toggleScrolled);
    window.addEventListener("load", toggleScrolled);

    /**
     * Mobile nav toggle
     */
    const mobileNavToggleBtn = document.querySelector(".mobile-nav-toggle");

    function mobileNavToogle() {
        document.querySelector("body").classList.toggle("mobile-nav-active");
        mobileNavToggleBtn.classList.toggle("bi-list");
        mobileNavToggleBtn.classList.toggle("bi-x");
    }
    mobileNavToggleBtn.addEventListener("click", mobileNavToogle);

    /**
     * Hide mobile nav on same-page/hash links
     */
    document.querySelectorAll("#navmenu a").forEach((navmenu) => {
        navmenu.addEventListener("click", () => {
            if (document.querySelector(".mobile-nav-active")) {
                mobileNavToogle();
            }
        });
    });

    /**
     * Toggle mobile nav dropdowns
     */
    document
        .querySelectorAll(".navmenu .toggle-dropdown")
        .forEach((navmenu) => {
            navmenu.addEventListener("click", function (e) {
                e.preventDefault();
                this.parentNode.classList.toggle("active");
                this.parentNode.nextElementSibling.classList.toggle(
                    "dropdown-active"
                );
                e.stopImmediatePropagation();
            });
        });

    /**
     * Preloader
     */
    const preloader = document.querySelector("#preloader");
    if (preloader) {
        window.addEventListener("load", () => {
            preloader.remove();
        });
    }

    /**
     * Scroll top button
     */
    let scrollTop = document.querySelector(".scroll-top");

    function toggleScrollTop() {
        if (scrollTop) {
            window.scrollY > 100
                ? scrollTop.classList.add("active")
                : scrollTop.classList.remove("active");
        }
    }
    scrollTop.addEventListener("click", (e) => {
        e.preventDefault();
        window.scrollTo({
            top: 0,
            behavior: "smooth",
        });
    });

    window.addEventListener("load", toggleScrollTop);
    document.addEventListener("scroll", toggleScrollTop);

    /**
     * Animation on scroll function and init
     */
    function aosInit() {
        AOS.init({
            duration: 600,
            easing: "ease-in-out",
            once: true,
            mirror: false,
        });
    }
    window.addEventListener("load", aosInit);

    /**
     * Initiate glightbox
     */
    const glightbox = GLightbox({
        selector: ".glightbox",
    });

    /**
     * Init swiper sliders
     */
    function initSwiper() {
        document
            .querySelectorAll(".init-swiper")
            .forEach(function (swiperElement) {
                let config = JSON.parse(
                    swiperElement
                        .querySelector(".swiper-config")
                        .innerHTML.trim()
                );

                if (swiperElement.classList.contains("swiper-tab")) {
                    initSwiperWithCustomPagination(swiperElement, config);
                } else {
                    new Swiper(swiperElement, config);
                }
            });
    }

    window.addEventListener("load", initSwiper);

    /**
     * Frequently Asked Questions Toggle
     */
    document
        .querySelectorAll(".faq-item h3, .faq-item .faq-toggle")
        .forEach((faqItem) => {
            faqItem.addEventListener("click", () => {
                faqItem.parentNode.classList.toggle("faq-active");
            });
        });

    /**
     * Animate the skills items on reveal
     */
    let skillsAnimation = document.querySelectorAll(".skills-animation");
    skillsAnimation.forEach((item) => {
        new Waypoint({
            element: item,
            offset: "80%",
            handler: function (direction) {
                let progress = item.querySelectorAll(".progress .progress-bar");
                progress.forEach((el) => {
                    el.style.width = el.getAttribute("aria-valuenow") + "%";
                });
            },
        });
    });

    /**
     * Init isotope layout and filters
     */
    document
        .querySelectorAll(".isotope-layout")
        .forEach(function (isotopeItem) {
            let layout = isotopeItem.getAttribute("data-layout") ?? "masonry";
            let filter = isotopeItem.getAttribute("data-default-filter") ?? "*";
            let sort =
                isotopeItem.getAttribute("data-sort") ?? "original-order";

            let initIsotope;
            imagesLoaded(
                isotopeItem.querySelector(".isotope-container"),
                function () {
                    initIsotope = new Isotope(
                        isotopeItem.querySelector(".isotope-container"),
                        {
                            itemSelector: ".isotope-item",
                            layoutMode: layout,
                            filter: filter,
                            sortBy: sort,
                        }
                    );
                }
            );

            isotopeItem
                .querySelectorAll(".isotope-filters li")
                .forEach(function (filters) {
                    filters.addEventListener(
                        "click",
                        function () {
                            isotopeItem
                                .querySelector(
                                    ".isotope-filters .filter-active"
                                )
                                .classList.remove("filter-active");
                            this.classList.add("filter-active");
                            initIsotope.arrange({
                                filter: this.getAttribute("data-filter"),
                            });
                            if (typeof aosInit === "function") {
                                aosInit();
                            }
                        },
                        false
                    );
                });
        });

    /**
     * Correct scrolling position upon page load for URLs containing hash links.
     */
    window.addEventListener("load", function (e) {
        if (window.location.hash) {
            if (document.querySelector(window.location.hash)) {
                setTimeout(() => {
                    let section = document.querySelector(window.location.hash);
                    let scrollMarginTop =
                        getComputedStyle(section).scrollMarginTop;
                    window.scrollTo({
                        top: section.offsetTop - parseInt(scrollMarginTop),
                        behavior: "smooth",
                    });
                }, 100);
            }
        }
    });

    /**
     * Navmenu Scrollspy
     */
    let navmenulinks = document.querySelectorAll(".navmenu a");

    function navmenuScrollspy() {
        navmenulinks.forEach((navmenulink) => {
            if (!navmenulink.hash) return;
            let section = document.querySelector(navmenulink.hash);
            if (!section) return;
            let position = window.scrollY + 200;
            if (
                position >= section.offsetTop &&
                position <= section.offsetTop + section.offsetHeight
            ) {
                document
                    .querySelectorAll(".navmenu a.active")
                    .forEach((link) => link.classList.remove("active"));
                navmenulink.classList.add("active");
            } else {
                navmenulink.classList.remove("active");
            }
        });
    }
    window.addEventListener("load", navmenuScrollspy);
    document.addEventListener("scroll", navmenuScrollspy);
})();

let districts = [];
let upazilas = [];

fetch("/jsons/districts.json")
    .then((res) => res.json())
    .then((data) => {
        data.sort((a, b) => a.name.localeCompare(b.name));
        districts = data;
        set_district();
    });

fetch("/jsons/upazilas.json")
    .then((res) => res.json())
    .then((data) => {
        data.sort((a, b) => a.name.localeCompare(b.name));
        upazilas = data;
        set_upazila();
    });

function set_district(district_id = 47) {
    let district_el = document.getElementById("district_el");
    if (!district_el) return;

    districts.forEach((district) => {
        const option = document.createElement("option");
        option.value = district.id;
        option.textContent = district.bn_name;
        district_el.appendChild(option);
    });

    district_el.value = district_id;
}

function set_upazila(district_id = 47) {
    let upazila_el = document.getElementById("upazila_el");
    if (!upazila_el) return;

    upazila_el.innerHTML = "";
    let filtered = upazilas.filter(
        (upazila) => upazila.district_id == district_id
    );

    let district = districts.find((d) => d.id == district_id);
    document.querySelector('input[name="zila_name"]').value =
        district.bn_name ?? "";

    filtered.forEach((district) => {
        const option = document.createElement("option");
        option.value = district.id;
        option.textContent = district.bn_name;
        upazila_el.appendChild(option);
    });

    upazila_el.value = filtered[0].id;
    set_upazila_name(filtered[0].id);
}

function set_upazila_name(upazila_id) {
    let upazila = upazilas.find((upazila) => upazila.id == upazila_id);
    document.querySelector('input[name="upazila_name"]').value =
        upazila.bn_name;
    renderCartTable();
}

/** */

let carts = [];
let couponCode = "";
let couponDiscount = 0;
const validCoupons = {
    SAVE10: 0, // 10% discount
    SAVE20: 0, // 20% discount
};

function setItem(action, buttonElement) {
    const parentDiv = buttonElement.parentElement;
    const inputElement = parentDiv.querySelector("input");
    const cart_item_total_el =
        parentDiv.parentElement.querySelector(".cart-item-total");

    let value = inputElement.value;
    let price = +(inputElement.dataset.price || 0);

    // console.log(cart_item_total_el, inputElement, price);

    let currentValue = parseInt(value) || 1;
    if (action === "increment") {
        currentValue++;
    } else if (action === "decrement") {
        currentValue--;
    } else if (action === "set") {
        currentValue = value;
    }
    if (currentValue < 1) {
        currentValue = 1;
    }

    cart_item_total_el.innerHTML = Number(price * currentValue).toFixed(2);

    inputElement.value = currentValue;

    // Update cart quantity if the item exists
    const productId = parseInt(inputElement.dataset.id);
    const checkbox = document.getElementById(`p${productId}`);
    const cartItem = carts.find((item) => item.id === productId);
    if (cartItem) {
        cartItem.quantity = currentValue;
    } else {
        checkbox.checked = true;
        add_to_cart(productId);
    }

    // console.log(JSON.stringify(carts, null, 2));

    renderCartTable();
}

function removeItem(productId) {
    const checkbox = document.getElementById(`p${productId}`);
    carts = carts.filter((item) => item.id !== productId);
    checkbox.checked = false;
    renderCartTable();
}

function calcShipping(quantity, location) {
    // Validate location
    if (!["inside", "outside"].includes(location)) {
        throw new Error("Invalid location. Choose 'inside' or 'outside'.");
    }

    // Constants
    const costPerUnit = location === "inside" ? 70 : 110;
    const firstKgCost = location === "inside" ? 50 : 90;
    const additionalKgCost = 20;

    // Total weight calculation (each quantity = 2 kg)
    const totalWeight = quantity * 2;

    // Calculate the shipping cost
    let shippingCost = firstKgCost; // First kg cost
    if (totalWeight > 1) {
        shippingCost += (totalWeight - 1) * additionalKgCost; // Additional weight cost
    }

    return shippingCost;
}

function add_to_cart(productId) {
    event.preventDefault();
    const checkbox = document.getElementById(`p${productId}`);
    const qtyInput = checkbox
        .closest(".product_item_parent")
        .querySelector('input[type="number"]');
    const quantity = parseInt(qtyInput.value) || 1;

    let product = site_product_items.find((item) => item.id === productId);

    if (checkbox.checked) {
        const cartItem = carts.find((item) => item.id === productId);
        if (!cartItem) {
            carts.push({
                id: productId,
                quantity: quantity,
                name: product.name,
                price: product.price,
            });
        } else {
            cartItem.quantity = quantity;
        }
    } else {
        carts = carts.filter((item) => item.id !== productId);
    }

    renderCartTable();
}

function applyCoupon() {
    const input = document.getElementById("couponCode");
    const enteredCode = input.value.trim();

    if (validCoupons.hasOwnProperty(enteredCode)) {
        couponCode = enteredCode;
        alert(`Coupon "${enteredCode}" applied successfully!`);
    } else {
        couponCode = "";
        alert("Invalid coupon code!");
    }

    renderCartTable();
}

function renderCartTable() {
    const container = document.getElementById("cart-table-container");
    const total_in_submit = document.getElementById("total_in_submit");
    const upazila_el = document.getElementById("upazila_el");

    let shipping_area = "inside";
    let shipping_charge = 50;
    let total_qty = 0;

    if (upazila_el.value == 365471) {
        shipping_area = "inside";
        shipping_charge = shipping_cost["inside"];
    } else {
        shipping_area = "outside";
        shipping_charge = shipping_cost["outside"];
    }

    if (carts.length === 0) {
        container.innerHTML = "<p>Your cart is empty!</p>";
        return;
    }

    // Calculate subtotal
    let subtotal = 0;
    carts.forEach((item) => {
        subtotal += item.quantity * item.price;
        total_qty += item.quantity;
    });

    // Calculate coupon discount
    couponDiscount = ((validCoupons[couponCode] || 0) / 100) * subtotal;

    // Calculate final total
    let total_shipping_charge = calcShipping(total_qty, shipping_area);

    const discount = (global_discount * subtotal) / 100;
    const total = subtotal - discount - couponDiscount + total_shipping_charge;

    // Render table
    let tableHTML = `
        <table class="table bn cart_table text-nowrap table-bordered">
            <thead>
                <tr>
                    <th>প্রোডাক্ট</th>
                    <th>পরিমাণ</th>
                    <th>দাম</th>
                </tr>
            </thead>
            <tbody>
    `;

    carts.forEach((item, index) => {
        tableHTML += `
            <tr>
                <td>
                    <input type="hidden" name="cart[${index}][id]" value="${
            item.id
        }"/>
                    <input type="hidden" name="cart[${index}][name]" value="${
            item.name
        }"/>
                    <input type="hidden" name="cart[${index}][qty]" value="${
            item.quantity
        }"/>
                    <i class="bi bi-trash text-danger me-2" onclick="removeItem(${
                        item.id
                    })"></i>
                    ${item.name}
                </td>
                <td>${item.quantity.toLocaleString("bn-BD")}</td>
                <td>${(item.quantity * item.price).toLocaleString("bn-BD", {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2,
                })} ৳</td>
            </tr>
        `;
    });

    tableHTML += `
        </tbody>
            <tfoot>
                <tr>
                    <td colspan="2" class="text-end">
                        সাবটোটাল
                    </td>
                    <td>${subtotal.toLocaleString("bn-BD", {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2,
                    })} ৳</td>
                </tr>
                <tr>
                    <td colspan="2" class="text-end">
                        ${
                            global_discount > 0
                                ? `(${global_discount.toLocaleString(
                                      "bn-BD"
                                  )}%) ডিসকাউন্ট`
                                : "ডিসকাউন্ট"
                        }
                    </td>
                    <td>- ${discount.toLocaleString("bn-BD", {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2,
                    })} ৳</td>
                </tr>
                <tr class="d-none">
                    <td colspan="2" class="text-end">
                        কুপন ডিসকাউন্ট
                    </td>
                    <td>- ${couponDiscount.toLocaleString("bn-BD", {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2,
                    })}৳</td>
                </tr>
                <tr>
                    <td colspan="2" class="text-end shipping_area_td">
                        <input type="hidden" name="shipping_area" value="${shipping_area}" />
                        <div class="text-nowrap">
                            শিপিং চার্জ (${shipping_area} ঢাকা ${shipping_charge.toLocaleString(
        "bn-BD"
    )}৳ কেজি)
                        </div>
                    </td>
                    <td>+ ${total_shipping_charge.toLocaleString("bn-BD", {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2,
                    })} ৳</td>
                </tr>
                <tr>
                    <td colspan="2" class="text-end">
                        <b> গ্র্যান্ড টোটাল </b>
                    </td>
                    <td><b>${total.toLocaleString("bn-BD", {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2,
                    })} ৳</b></td>
                </tr>
            </tfoot>
        </table>
    `;

    container.innerHTML = tableHTML;
    // total_in_submit.innerHTML = total.toFixed(2);
    total_in_submit.innerHTML = total.toLocaleString("bn-BD");
}
