
## Umotif Case Study

The task is to create a basic, web-based subject screening tool for a clinical trail.

## Installation
To install with Docker, run following commands:

```
git clone git@github.com:pranayBaddam/umotif.git
cd umotif
cp .env.example .env
```
Change following database credentials in .env file
```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=umotif
DB_USERNAME=sail
DB_PASSWORD=password
```

Installing Composer Dependencies For Existing Applications
```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```
Configuring A Bash Alias
``` 
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'

``` 
To start all of the Docker containers in the background, you may start Sail in "detached" mode:
``` 
sail up -d
``` 

Generate a new application key and database migration, data seeding
``` 
sail php artisan key:generate
sail php artisan migrate:fresh --seed
```

Execute Node/NPM commonds
```
sail npm install
sail npm run dev 
```
You can access the server at [http://localhost](http://localhost).

## Routes
In ```routes/web.php``` file, contain task related routes.
``` 
Route::controller(ScreeningController::class)->group(function () {
    Route::get('/screenings/create', 'create')->name('screenings.create');
    Route::post('/screenings', 'store')->name('screenings.store');
    Route::get('/screenings/{id}', 'show')->name('screenings.show');
    Route::get('/screenings', 'index')->name('screenings.index');
});
```
## Folders

- `app/Http/Controllers/ScreeningController` - Contains all the controller methods
- `app/Http/Requests/CreateScreeningFormRequest` - Contains validation logic and error messages details in it.
- `app/Action/CreateScreeningData` - Contains logic to store the screening form data.
- `app/Models/Screening` - It is to interact with table `screenings`, like perform CRUD operation on table.
- `app/Enum` - Contains enum classes for `Headache Frequency Type` values.
- `databases/migrations/2022_05_08_225334_create_screenings_table` - Contains the table schema
- `databases/factories/ScreeningFactory` - It is to create fake data for testing.

## Database
- I have created only one table( used 1st Normalization ) for this task to store screening form data. 
- It can be improvable, like storing unique data for subjects into single table(individual details - first_name, dob) and remaining data in results table then create relationship using foreign key.
- I have used PHP Enums for dropdown values instead of storing them in table.
