<!-- CHECKOUT TAB -->
<div id="checkout-tab" class="tab-content">

<?php if ($cart_items): ?>

<form method="post" id="checkout-form">

    <h3>Delivery Information</h3>

    <!-- ADDRESS -->
    <textarea name="delivery_address"
              required
              placeholder="Enter your delivery address"
              style="width:100%;
                     padding:15px;
                     border-radius:8px;
                     margin-bottom:15px;"></textarea>

    <!-- PHONE -->
    <input type="text"
           name="phone_number"
           required
           placeholder="Phone number (11 digits)"
           pattern="[0-9]{11}"
           style="width:100%;
                  padding:12px;
                  border-radius:8px;
                  margin-bottom:10px;">

    <small style="color:gray;">
        📦 Delivery within 2-3 days
    </small>

    <h3 style="margin-top:25px;">Payment Method</h3>

    <!-- bKash -->
    <label class="payment-option" style="display:block;margin-bottom:10px;">

        <input type="radio"
               name="payment_method"
               value="bkash"
               required
               onclick="showPaymentNumber(this.value)">

        <b>bKash</b>

    </label>

    <!-- Nagad -->
    <label class="payment-option" style="display:block;margin-bottom:10px;">

        <input type="radio"
               name="payment_method"
               value="nagad"
               onclick="showPaymentNumber(this.value)">

        <b>Nagad</b>

    </label>

    <!-- Rocket -->
    <label class="payment-option" style="display:block;margin-bottom:10px;">

        <input type="radio"
               name="payment_method"
               value="rocket"
               onclick="showPaymentNumber(this.value)">

        <b>Rocket</b>

    </label>

    <!-- CASH ON DELIVERY -->
    <label class="payment-option" style="display:block;margin-bottom:10px;">

        <input type="radio"
               name="payment_method"
               value="cod"
               onclick="showPaymentNumber(this.value)">

        <b>Cash on Delivery</b>

    </label>

    <!-- PAYMENT MESSAGE -->
    <div id="payment-number"
         style="text-align:center;
                margin-top:15px;
                margin-bottom:15px;">
    </div>

    <!-- TRX ID -->
    <input type="text"
           name="trx_id"
           id="trxField"
           placeholder="Enter Transaction ID"
           style="width:100%;
                  padding:12px;
                  border-radius:8px;
                  margin-top:10px;">

    <!-- HIDDEN PRODUCTS -->
    <?php foreach($cart_items as $item): ?>

        <input type="hidden"
               name="product_ids[]"
               value="<?php echo $item['product_id']; ?>">

        <input type="hidden"
               name="quantity[<?php echo $item['product_id']; ?>]"
               value="<?php echo $item['quantity']; ?>">

    <?php endforeach; ?>

    <!-- BUTTON -->
    <button type="submit"
            name="confirm_order"
            id="orderBtn"
            style="margin-top:20px;
                   background:green;
                   color:white;
                   border:none;
                   padding:14px 25px;
                   border-radius:8px;
                   cursor:pointer;
                   font-size:16px;">

        Confirm Order

    </button>

</form>

<?php else: ?>

<p style="text-align:center;">
    Add items to your cart first.
</p>

<?php endif; ?>

</div>

<script>

function showPaymentNumber(method){

    let text = "";

    let trx = document.getElementById("trxField");

    /* bKash */

    if(method === "bkash"){

        text = `
            <div style="
                background:#f5fff5;
                padding:15px;
                border-radius:10px;
                border:1px solid #0a8f2e;
                color:#111;
            ">

                <h3 style="color:#0a8f2e;">
                    📱 bKash Payment
                </h3>

                <p>
                    Send money to this bKash number:
                </p>

                <div style="
                    font-size:24px;
                    font-weight:bold;
                    color:#0a8f2e;
                    margin:10px 0;
                ">
                    01745985077
                </div>

                <p>
                    After payment, enter your Transaction ID below
                    and click <b>Confirm Order</b>.
                </p>

            </div>
        `;

        trx.style.display = "block";
        trx.required = true;
    }

    /* Nagad */

    if(method === "nagad"){

        text = `
            <div style="
                background:#fff8f2;
                padding:15px;
                border-radius:10px;
                border:1px solid orange;
            ">

                <h3 style="color:orange;">
                    📱 Nagad Payment
                </h3>

                <p>
                    Send money to this Nagad number:
                </p>

                <div style="
                    font-size:24px;
                    font-weight:bold;
                    color:orange;
                    margin:10px 0;
                ">
                    01313731493
                </div>

                <p>
                    After payment, enter your Transaction ID below
                    and click <b>Confirm Order</b>.
                </p>

            </div>
        `;

        trx.style.display = "block";
        trx.required = true;
    }

    /* Rocket */

    if(method === "rocket"){

        text = `
            <div style="
                background:#faf5ff;
                padding:15px;
                border-radius:10px;
                border:1px solid purple;
            ">

                <h3 style="color:purple;">
                    🚀 Rocket Payment
                </h3>

                <p>
                    Send money to this Rocket number:
                </p>

                <div style="
                    font-size:24px;
                    font-weight:bold;
                    color:purple;
                    margin:10px 0;
                ">
                    01745985077
                </div>

                <p>
                    After payment, enter your Transaction ID below
                    and click <b>Confirm Order</b>.
                </p>

            </div>
        `;

        trx.style.display = "block";
        trx.required = true;
    }

    /* CASH ON DELIVERY */

    if(method === "cod"){

        text = `
            <div style="
                background:#f0f8ff;
                padding:15px;
                border-radius:10px;
                border:1px solid #007bff;
            ">

                <h3 style="color:#007bff;">
                    💵 Cash on Delivery
                </h3>

                <p>
                    Pay cash when your product is delivered.
                </p>

            </div>
        `;

        trx.style.display = "none";
        trx.required = false;
        trx.value = "";
    }

    document.getElementById("payment-number").innerHTML = text;
}

/* BUTTON LOADING */

document.getElementById("checkout-form")
.addEventListener("submit", function(){

    let btn = document.getElementById("orderBtn");

    btn.innerHTML = "Processing Order...";

    btn.style.opacity = "0.7";

    btn.disabled = true;

});

</script>