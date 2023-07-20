# Laravel web application for task management
This application allows a user to create projects and tasks. Each task belongs to a project, and all tasks can be reordered via dragging and dropping as per the preferred priority.

### Features

1. Create, edit and delete a project.
2. Create, edit and delete a task.
3. Assign a task to a project.
4. Filter tasks by a specific project.
5. Reorder tasks with drag and drop in the browser. Priority should automatically be updated based on this. #1 priority goes at top, #2 next down and so on.
6. Responsive design for mobile.

### Technology
1. The application runs on Laravel 8 and MySQL database
2. I have used jQuery, Sortablejs and Tailwind CSS for the frontend.
3. npm manages the packages and dependencies in the project.
4. I used Laravel Mix together with Webpack for asset compilation and bundling.

### Installation
1. To make it easy to run this application, I have created a [Github repository](https://github.com/mkahara/coalition-laravel-test) whereby one can clone the project.
   ```bash
   git clone https://github.com/mkahara/coalition-laravel-test.git
   ```
2. Navigate the project directory.
    ```bash
    cd your-laravel-project
    ```
3. Install all dependencies.
   ```bash
   npm install
   ```
4. Run migrations.
   ```bash
   php artisan migrate
   ```
5. Seed the database with the sample data (there is a schema inside the dumps directory in the seeders directory).
   ```bash
   php artisan db:seed
   ```
6. Compile the assets.
   ```bash
   npm run dev
   ```
7. Run the project to generate a url accessible on the browser.
   ```bash
   php artisan serve
   ```

### Usage
This application contains a simple and easy to use navigation. You should see a list with draggable tasks. Try dragging and reordering the items to see the sorting in action. Also try to add, edit and delete projects and tasks.

### License
The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

### Author
Samuel Kahara - Github: [mkahara](https://github.com/mkahara)

