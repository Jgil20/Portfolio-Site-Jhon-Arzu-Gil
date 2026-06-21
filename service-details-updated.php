Integrate PayPal Checkout
Before beginning your integration, you need to set up your development environment. You can refer to this flow diagram.

Start your integration by grabbing the sample code from PayPal’s GitHub repo, or visiting the PayPal GitHub Codespace. Read the Codespaces guide for more information. You can also use Postman to explore and test PayPal APIs. Read the Postman Guide for more information.


Download sample code

Open in Codespaces

Run in Postman

1. Integrate front end CLIENT
Set up your front end to integrate checkout payments.

Front-end process
Your app shows the PayPal checkout buttons.
Your app calls server endpoints to create the order and capture payment.

Front-end code
This example uses a index.html file to show how to set up the front end to integrate payments.

The /src/index.html and /src/app.js files handle the client-side logic and define how the PayPal front-end components connect with the back end. Use these files to set up the PayPal checkout using the JavaScript SDK and handle the payer's interactions with the PayPal checkout button.

You'll need to:

Save the index.html file in a folder named /src.
Save the app.js file in a folder named /src.
Step 1. Add the script tag
Include the <script> tag on any page that shows the PayPal buttons. This script will fetch all the necessary JavaScript to access the buttons on the window object.


Step 2. Configure your script parameters
The snippet in Step 1. Add the script tag shows that you need to pass a client-id and specify which components you want to use. The SDK offers Buttons, Marks, Card Fields, and other components. This sample focuses on the buttons component.

In addition to passing the client-id and specifying which components you want to use, you can also pass the currency you want to use for pricing. For this exercise, we'll use USD.

Buyer Country and Currency are only for use in sandbox testing. These are not to be used in production.

Country and currency:
The Buyer Country field is intended solely for sandbox testing purposes and should not be utilized in production environments.

United States Of America
United States Of AmericaBuyer Country

USD
USDCurrency
Payment Methods
PayPal is the default payment method. Enable and disable other payment methods as needed.





Step 3. Render the PayPal buttons
After setting up the SDK for your website, you need to render the buttons.

The paypal namespace has a Buttons function that initiates the callbacks needed to set up a payment.

The createOrder callback launches when the customer clicks the payment button. The callback starts the order and returns an order ID. After the customer checks out using the PayPal pop-up, this order ID helps you to confirm when the payment is completed.

Completing the payment launches an onApprove callback. Use the onApprove response to update business logic, show a celebration page, or handle error responses.

If your website handles shipping physical items, this documentation includes details about our shipping callbacks.

Canadian merchants typically need to render a site in both English and French. To support this requirement, see Pay Later (CA).
 


Step 4. Configure the layout of the Buttons component OPTIONAL
Depending on where you want these buttons to show up on your website, you can lay out the buttons in a horizontal or vertical stack. You can also customize the buttons with different colors and shapes.

To override the default style settings for your page, use a style object inside the Buttons component. Read more about how to customize your payment buttons in the style section of the JavaScript SDK reference page.

Button Shape


Rectangle
Pill
Button Color


Gold
GoldButton Color
Button Layout


Vertical
Horizontal
Button Label Text


PayPal
PayPalButton Label
Button Message


Enable
Disable

Shipping Callbacks

Client Side Shipping Callback

Server Side Shipping Callback

Step 5. Support multiple shipping options OPTIONAL
The client-side shipping address and options callback process involves the following steps:

The onShippingAddressChange callback is triggered when the buyer selects a new shipping address. Use the data in this callback to tell the buyer if you support the new shipping address, update shipping costs, and update the line items in the cart.
The onShippingOptionsChange callback is triggered when the buyer selects a new shipping option. Use the data in this callback to tell the buyer if you support the new shipping method, update shipping costs, and update the line items in the cart.
Visit the JavaScript SDK reference page for more details about the onShippingAddressChange and onShippingOptionsChange callbacks.



Contact Module  OPTIONAL
Contact Module helps buyers view and modify the email and phone number shared with merchants for a given order. It offers flexibility to buyers, particularly for gift orders where buyers need to specify alternative contact details.

Merchant can pass an explicit indicator contact preference in payment_source.paypal.experience_context object in a Create order request to determine if they want buyers to see and edit contact information on the PayPal checkout during the order review phase. PayPal supports three contact preferences:

NO_CONTACT_INFO [Default] : Contact info module is hidden from the buyers and they cannot see or edit any contact information.
UPDATE_CONTACT_INFO - Buyers will see the contact module and can add or update their contact details on the PayPal side.Once buyer updates their details, merchants will see the latest contact information as part of shipping email & phone.
RETAIN_CONTACT_INFO - Buyers will see the contact module but they cannot edit their details on the PayPal side. Merchant is expected to collect buyer’s contact details on their website and pass it in the create order call using shipping.email_address and shipping.phone_number.


2. Integrate back end SERVER
This section explains how to set up your backend to integrate PayPal checkout payments.

The PayPal Server SDK provides integration access to the PayPal REST APIs. The API endpoints are divided into distinct controllers:

Orders Controller: Orders API v2
Payments Controller: Payments API v2
Backend process
Your app creates an order on the backend by calling to the ordersCreate method in the Orders Controller. See Create Orders V2 API endpoint.
Your app calls the ordersCapture method in the Orders Controller on the backend to move the money when the payer confirms the order. See Capture Payment for Order V2 API endpoint .

Backend Code
The sample integration uses the PayPal Server SDK to connect to the PayPal REST APIs. Use the server folder to setup the backend to integrate with the payments flow.

The server side code runs on port 8080
Declare the PAYPAL_CLIENT_ID and PAYPAL_CLIENT_SECRET as environment variables. The server side code is configured to fetch these values from the environment to authorize the calls to the PayPal REST APIs.
By default the server SDK clients are configured to connect to the PayPal's sandbox API.

Step 1. Generate access token
Initialize the Server SDK client using OAuth 2.0 Client Credentials (PAYPAL_CLIENT_ID and PAYPAL_CLIENT_SECRET). The SDK will automatically retrieve the OAuth token when any endpoint that require OAuth 2.0 Client Credentials is invoked.


Step 2. Create Order
You need a createOrder function to start a payment between a payer and a merchant

Set up the createOrder function to make a request to the ordersCreate method in the Orders Controller and pass data from the cart object to calculate the purchase units for the order.

See the Create order endpoint of the PayPal Orders v2 API for sample responses and other details.

Intent


CAPTURE
CAPTUREIntent
Currency Code


USD
USDCurrency Code
Amount

100
Amount
If you process payments that require Strong Customer Authentication, you need to provide additional context with payment indicators.


Step 3: Capture Payment
You need a captureOrder function to to move money from the payer to the merchant

Set up the captureOrder function to make a request to the ordersCapture method in the Orders Controller and pass the orderID generated from the Create Order step.

See the Capture Payment for Order V2 API endpoint for sample responses and other details.

Step 4. Handle responses
You need a handleResponse function to set up a listener that returns an HTTP status code from the API response.

Set up handleResponse to make a POST call to the /api/orders endpoint and return an HTTP status code response.
Declare an errorMessage object to show an error message when handleResponse returns an error code.

Enable App Switch

Note: To test the App Switch URL post-integration, open this URL in a mobile browser or other platform with an active installation of the PayPal mobile app.


Client Side:

Enable App Switch on the client side using the PayPal JavaScript SDK. You'll need to make 2 changes to integrate client-side:

Add the App Switch flag to the PayPal Buttons component setup.
Determine whether the buyer is returning from App Switch. If so, run buttons.resume() before rendering the button.
When you run the client-side Buttons component for App Switch, include the following declaration: appSwitchWhenAvailable: true.

See the Integrate client-side section of the App Switch page for more information.

Resume flow

When your app detects that the buyer is returning from App Switch, run buttons.resume() before rendering the button.

Note: You can set up a resume flow to a help a buyer resume a transaction completed in a different window or browser tab.

See the Resume flow section of the App Switch page for more information.


Server Side:

Configure App Switch on the server side by making a POST call to the Create order endpoint of the Orders v2 API. You’ll need to include the following 2 parameters in the payment_source.paypal.experience_context.
app_switch_preference object:

return_url: This URL tells App Switch where to send the buyer after completing checkout on the PayPal app. Set the URL to the page where the buyer selected the PayPal button.
cancel_url: This URL tells App Switch where to send the buyer when the buyer cancels or doesn't complete the transaction on the PayPal app. Set the URL to the page where the buyer selected the PayPal button.
The return_url and cancel_url must:

Be the same.
Match the URL of the page where the buyer selected the PayPal button.
Contain a unique identifier for the buyer's session to identify the buyer when they return from App Switch.
Not contain any hash value at the end.
See the Integrate server-side section of the App Switch page for more information.


3. Custom Integration OPTIONAL

Handle buyer checkout errors
Use onError callbacks and alternate checkout pages to handle buyer checkout errors.

If an error prevents buyer checkout, alert the user that an error has occurred with the buttons using the onError callback. This error handler is a catch-all. Errors at this point are not expected to be handled beyond showing a generic error message or page.

If a null pointer error prevents the script from loading, provide a different checkout experience.



Handle funding failures
If your payer's funding source fails, the Orders API returns an INSTRUMENT_DECLINED error. A funding source might fail because the billing address associated with the payment method is incorrect, the transaction exceeds the card limit, or the card issuer denies the transaction. To handle this error, restart the payment so the payer can select a different payment option.


Show cancellation page
Show a page to your payers to confirm that the payment was cancelled.



Refund a captured payment
Refund a captured payment from a seller back to a buyer.



4. Test integration
Before going live, test your integration in the sandbox environment. Learn more about card testing, simulating successful payments using test card numbers and generating card error scenarios using rejection triggers.

Note: Use the credit card generator to generate test credit cards for sandbox testing.


Test the following use cases before going live:

PayPal Payment
Test a purchase as a payer:

Select the PayPal button on your checkout page.
Log in using one of your personal sandbox accounts. This ensures the payments will be sent to the correct account. Make sure that you use the sandbox business account that corresponds to the REST app you are using.
Note the purchase amount in the PayPal checkout window.
Approve the purchase with the Pay Now button. The PayPal window closes and redirects you to your page, indicating that the transaction was completed.
Confirm the money reached the business account:

Log in to the PayPal sandbox using the sandbox business account that received the payment. Remember that the SDK source now uses a sandbox client ID from one of your REST apps, and not the default test ID.
In Recent Activity, confirm that the sandbox business account received the money, subtracting any fees.
Log out of the account.

Card payment
Go to the checkout page for your integration.
Generate a test card using the credit card generator.
Enter the card details in the hosted field, including the name on the card, billing address, and 2-character country code. Then, submit the order.
Confirm that the order was processed.
Log in to your merchant sandbox account and navigate to the activity page to ensure the payment amount shows up in the account.

5. Go live
Follow this checklist to take your application live.

Log into the PayPal Developer Dashboard with your PayPal business account.
Obtain your live credentials.
Include the new credentials in your integration and Update your PayPal endpoint.
See Move your app to production for more details.

Preview
Code


Test Panel
Customize

Add more payment methods or customize your integration.


Pay Later

Payers buy now and pay in installments.


Pay with Venmo

Add the Venmo button to your checkout integration.


Alternative payment methods

Support local payment methods across the globe.


JavaScript SDK

Customize your integration with script config parameters.


Capture payment

Captures payment for an order.


Refund a captured payment

Refund all or part of a captured payment.

Reference
PayPal.com
Privacy
Cookies
Support
Legal
