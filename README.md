# stripe-cashier-app
Laravel application integrating Stripe using Cashier for product payments.
This app lists products, allows users to view product details, and securely pay via Stripe.

# Features
- Product listing with Name, price, and description
- Product detail page with Stripe payment form
- Secure checkout via Stripe using Laravel Cashier.
- Clean, responsive UI with Bootstrap 5
  
# Requirements
- PHP >= 8.0
- Laravel >= 12.x
- Composer
- MySQL
- Stripe account

# Installation
git clone https://github.com/NilimaChinchwalkar/stripe-cashier-app.git
cd stripe-cashier-app
composer install
cp .env.example .env
php artisan key:generate

# Update .env
STRIPE_KEY=stripe_publishable_key
STRIPE_SECRET=stripe_secret_key
