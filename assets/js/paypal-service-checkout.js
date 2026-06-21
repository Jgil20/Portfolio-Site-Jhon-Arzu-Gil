document.addEventListener("DOMContentLoaded", function () {
    const paypalServiceSelect = document.getElementById("paypalServiceSelect");
    const paypalSelectedPrice = document.getElementById("paypalSelectedPrice");
    const paymentMessage = document.getElementById("payment-message");
    const paypalButtonContainer = document.getElementById("paypal-button-container");

    if (!paypalServiceSelect || !paypalSelectedPrice || !paymentMessage || !paypalButtonContainer) {
        console.error("PayPal checkout elements are missing from the page.");
        return;
    }

    if (typeof paypal === "undefined") {
        paymentMessage.textContent = "PayPal could not load. Please refresh the page or try again later.";
        paymentMessage.className = "error-message";
        console.error("PayPal SDK is not loaded. Add the PayPal SDK script before paypal-service-checkout.js.");
        return;
    }

    function getSelectedPayPalService() {
        const option = paypalServiceSelect.options[paypalServiceSelect.selectedIndex];

        return {
            service_name: option.value,
            amount: option.dataset.price
        };
    }

    function updatePayPalSummary() {
        const service = getSelectedPayPalService();
        paypalSelectedPrice.textContent = Number(service.amount).toFixed(2);
        paymentMessage.textContent = "";
        paymentMessage.className = "";
    }

    paypalServiceSelect.addEventListener("change", updatePayPalSummary);

    paypal.Buttons({
        style: {
            layout: "vertical",
            color: "gold",
            shape: "rect",
            label: "paypal"
        },

        createOrder: async function () {
            const service = getSelectedPayPalService();

            paymentMessage.textContent = "Creating PayPal order...";
            paymentMessage.className = "info-message";

            const response = await fetch("api/paypal-create-order.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(service)
            });

            const data = await response.json();

            if (!response.ok || !data.success) {
                paymentMessage.textContent = data.error || "Could not create PayPal order.";
                paymentMessage.className = "error-message";
                throw new Error(data.error || "PayPal create order failed.");
            }

            return data.id;
        },

        onApprove: async function (data) {
            paymentMessage.textContent = "Capturing payment...";
            paymentMessage.className = "info-message";

            const response = await fetch("api/paypal-capture-order.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    orderID: data.orderID
                })
            });

            const result = await response.json();

            if (!response.ok || !result.success) {
                paymentMessage.textContent = result.error || "Could not capture payment.";
                paymentMessage.className = "error-message";
                throw new Error(result.error || "PayPal capture failed.");
            }

            paymentMessage.textContent = "Payment successful. Thank you!";
            paymentMessage.className = "success-message";

            setTimeout(() => {
                window.location.href = "success.php?order_id=" + encodeURIComponent(data.orderID);
            }, 1200);
        },

        onCancel: function () {
            paymentMessage.textContent = "Payment was cancelled.";
            paymentMessage.className = "error-message";
        },

        onError: function (err) {
            console.error("PayPal error:", err);
            paymentMessage.textContent = "Something went wrong with PayPal checkout.";
            paymentMessage.className = "error-message";
        }
    }).render("#paypal-button-container");
});