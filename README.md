# Restaurant order management system

## Description of the system (RBAC)
- System has three user roles i.e super admin, admin and employee
- All users can view orders

#### Super Admin
- System has only one super admin
- Super admin manages items i.e Create, Edit and Delete items
- Super admin manages users i.e Registers, Edit and Delete users
- Super admin does not create or serve orders

#### Admin
- System can have more than one admin, registered to the system by super admin
- Admins create orders

#### Super Admin
- System can have more than one employee, registered to the system by super admin
- Employees serve orders


## How to run

create .env file

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