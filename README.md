# small e-commerce

Small e-commerce of Shopping cart using Symfony 6 on hexagonal architecture & CQRS in back-end 
and Vue 3 with daisyui(library for Tailwind CSS) on frontend.

## use

```
# Install dependencies
composer install
Configure your env & env.test(For test unit)
Run the migration (php bin/console doctrine:migrations:migrate)
Run symfony server
Run test unit : php bin/phpunit 

# Frontend Install dependencies
$ cd frontend && npm install

#Env config
In frontend folder (frontend/src/env.ts), add the Backend API URL (example : 'http://localhost:8000')

# Compiles and hot-reloads for development
$ npm run dev
```

## Structure ( Hexagonal architecture & CQRS)
src/
├── Controller (Presentation layer) 
├── Adapter (Infrastructure layer)
│   ├── Framework
│   └── Service
│
core/
├── BusinessModel (Domain layer)
├── UseCase (Application layer)
│   ├── Commands
│   └── Query
└── Port (I/O)
