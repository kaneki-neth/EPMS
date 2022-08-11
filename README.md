## Build Setup

```bash
# Install dependencies.
npm install

# To watch your JavaScript for changes.
npm run watch

# Build the client application for development.
npm run dev

# Build the client application for production with minification.
npm run production
```

## Quick Installation
- Clone this repo
- `cd EPMS`
- Copy __.env.example__ file to __.env__ and edit database credentials there
- Run __composer install__
- Run __php artisan key:generate__
- Run __php artisan migrate --seed__ to create and populate tables
- Run __npm install__ 
- Run __php artisan serve__
