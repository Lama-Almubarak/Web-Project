# Web-Project

In this project, I implement an online book store, providing customers with a convenient means of browsing and purchasing books over the Internet. The platform offers an interface that is user-friendly, enabling customers to search and view books easily. Through the virtual shopping cart feature, customers can add books to their cart and complete the purchase with ease.
The online bookstore is designed with two distinct interfaces: one for the administrator and one for the customers. The administrative interface includes a secure login page, a dashboard to manage the store, a page to add products, and a page to view customer orders. The customer interface includes a login page, a registration page for new customers, a page to view available products, a detailed product information page, and a shopping cart page to view items selected for purchase.

The admin interface should have four web pages:
1. admin.php: contain admin login form. Admin can use the predefined username and password details but will have to change the password after the first login:
a. username: admin
b. password: admin123
2. dashboard.php: After successful login, this page will have links to two web pages
(addProduct.php and viewOrders.php)
3. addProduct.php: allows the admin to add products. The admin should enter the
name – photo – price – description - quantity and this information should be
stored in the database.
4. viewOrders.php: allows the admin to view customers’ orders in a table. The
table should have 4 columns (order date – customer email – order number –
Total price) and should be sorted in descending order.

The customer interface:
1. index.php: will contain the website name and a login form for customers
2. register.php: will contain the registration form
3. home.php: will contain the available products
4. product.php: when the user clicks on a certain product, all product information will appear on this page, and a button to add the product to the shopping cart
5. cart.php: will contain the products added to the shopping cart.
