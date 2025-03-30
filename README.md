
# CodeCraft 💻✨

**CodeCraft** is an advanced live code editor tailored for web developers to write, test, and manage HTML, CSS, and JavaScript. It also features user management and an admin section powered by a PHP backend, making it a complete solution for coding and user profile management.

## Features 🎯

### 1. **Frontend Support for HTML, CSS, and JavaScript**
   - Write and test HTML, CSS, and JavaScript code seamlessly.
   - Real-time preview to see live results as you write code.

### 2. **Backend with PHP**
   - Manage user profiles with a secure login and registration system.
   - The admin section allows administrators to view and manage user feedback and queries.

### 3. **Admin Panel**
   - Admins can log in to manage feedback, user queries, and user accounts.
   - View user data, queries, and feedback submitted via the application.

### 4. **Themes & Customization**
   - Multiple editor themes to customize your coding experience.
   - Includes dark mode for comfortable coding.

### 5. **Live Code Preview**
   - Real-time preview feature to reflect changes instantly.
   - See your HTML, CSS, and JavaScript code come to life as you type.

### 6. **Download Options**
   - Download your HTML, CSS, and JavaScript code directly.
   - Save your files with ease for future reference.

### 7. **Code Snippets**
   - Commonly used snippets of HTML, CSS, and JavaScript are available.
   - Speed up your workflow with reusable code blocks.

## Tech Stack 💻

### Frontend:
- **HTML**, **CSS**, **JavaScript**

### Backend:
- **PHP**
- **MySQL** (Database to manage user profiles and admin data)
  
### Tools:
- **XAMPP** (PHP, MySQL, Apache)

### Libraries:
- **CodeMirror** (For live code editing)
- **Bootstrap** (For UI design)

## Installation & Setup 🛠️

### Prerequisites

- **XAMPP**: Make sure you have XAMPP installed to run the PHP server and MySQL database. Download it from [here](https://www.apachefriends.org/index.html).

### Steps to Install:

1. **Clone the repository**:

   ```bash
   git clone https://github.com/YourUsername/CodeCraft.git
   ```

2. **Start XAMPP**: 
   - Open XAMPP and start **Apache** and **MySQL** modules.

3. **Database Setup**:
   - Open phpMyAdmin (`http://localhost/phpmyadmin`) and create a database named `users`.
   - Import the provided SQL file (`database.sql`) to create the necessary tables (`admininfo`, `feedback`, `userqueries`, `users`).

4. **Configure the Project**:
   - Place the project folder in the `htdocs` directory of XAMPP.
   - Open your browser and navigate to `http://localhost/CodeCraft`.

5. **User & Admin Login**:
   - You can now register new users or log in as an admin using the credentials provided in the SQL dump.

## Database Structure 📊

The MySQL database includes the following tables:
- **admininfo**: Stores admin login details.
- **users**: Maintains user profiles, including username, email, password, and profile picture.
- **feedback**: Collects user feedback with responses from the admin.
- **userqueries**: Stores user queries and responses.

## Usage 💡

- Write your **HTML**, **CSS**, or **JavaScript** code in the editor and use the **live preview** to view your changes in real-time.
- Use the **admin panel** to manage feedback and queries from users.
- Download your code or snippets as files for future use.

## Contributing 🤝

We welcome contributions! Follow these steps to contribute:

1. Fork the repository.
2. Create a new branch (`git checkout -b feature-name`).
3. Commit your changes (`git commit -m 'Add new feature'`).
4. Push to the branch (`git push origin feature-name`).
5. Open a pull request.

## License 📜

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for more details.

---

This version covers the backend, XAMPP setup, and user/admin features. Let me know if you'd like further adjustments!
