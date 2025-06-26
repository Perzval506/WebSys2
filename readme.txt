ALUMNI TRACKER SYSTEM

GROUP MEMBERS:
- Jed Isaac Mearns
- Brian Miguel Estanislao
- Xander Montero
- Dwyane Clark Pimentel
- Eduardo Dominguito
- Prinz Ilanga

ABOUT THE SYSTEM:
The Alumni Tracker System is a simple web-based application built using PHP and MySQL. 
It is designed to record, manage, and track alumni information such as names, 
graduation details, employment, and current job status.

This system allows administrators to:
- Add new alumni
- Edit alumni details
- Delete alumni records
- View all alumni in a searchable and organized list

The system also records the date when each alumni entry was added to the database.

TECHNOLOGIES USED:
- PHP (for server-side logic)
- MySQL (for the database)
- HTML & Bootstrap (for the frontend UI)
- XAMPP (as the local development environment)

HOW TO INSTALL & RUN:
1. Copy the entire project folder into `C:\xampp\htdocs\` (or your preferred local server directory).
2. Open XAMPP and start **Apache** and **MySQL**.
3. Go to **phpMyAdmin** and:
   - Create a new database (e.g., `backup`)
   - Import the `backup.sql` file to populate the database
4. Open `config.php` and check if your database credentials are correct (host, username, password, database name).
5. Open your browser and navigate to: http://localhost/alumni_tracker/index.php
6. Use the UI to add, edit, or delete alumni data.

SYSTEM FUNCTIONALITIES:
- **Add Alumni**: Fill out the form with details like name, course, graduation year, job, and employer.
- **View Alumni List**: View all entries in a table, sorted by newest first.
- **Edit Alumni**: Click the "Edit" button to modify an alumni's details.
- **Delete Alumni**: Click "Delete" to remove an entry from the database.

NOTE:
For security and compatibility on other computers, it's best to:
- Replace absolute `include()` paths like `C:/xampp/htdocs/...` with relative paths using `__DIR__`.
- Keep folder names consistent.
- Always run on a local server (e.g., XAMPP) — PHP will not work if you just double-click the file in a browser.

