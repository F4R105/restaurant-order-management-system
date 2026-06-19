# Restaurant order management system

## Description of the system (RBAC)
- System has three user roles i.e admin, waiter and chef cooker
- All users can view orders

#### Admin
- System has only one admin
- admin manages items i.e Create, Edit and Delete items
- admin manages users i.e Registers, Edit and Delete users
- admin does not create or serve orders

#### Waiter
- System can have more than one Waiter, registered to the system by admin
- Admins create orders

#### Chef cooker
- System can have more than one chef cooker, registered to the system by admin
- Chef cooker serves orders


## How to run

### First terminal
```bash
composer install
```

```bash
php artisan key:generate
```

```bash
php artisan migrate
```

```bash
php artisan db:seed
```

```bash
php artisan serve
```

### Second terminal

```bash
npm install
```

```bash
npm run dev
```