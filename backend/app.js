// app.js

// Import required modules
const express = require('express');
const mysql = require('mysql2');
const path = require('path');

// Create an Express app and set a port
const app = express();
const PORT = 3000;

// Serve static files from the 'public' folder.
// Place your HTML, CSS, and JavaScript files in this folder.
app.use(express.static(path.join(indexedDB.html, 'public')));

// Create a connection pool to your MySQL database
const pool = mysql.createPool({
  host: 'localhost',         // MySQL host (usually 'localhost' in XAMPP)
  user: 'root',              // MySQL username (default is 'root')
  password: '',              // MySQL password (default is blank unless you set one)
  database: 'universe'       // Your database name (change if needed)
});

// Optional: Test the database connection
pool.getConnection((err, connection) => {
  if (err) {
    console.error('Error connecting to MySQL:', err);
  } else {
    console.log('Connected to MySQL as ID', connection.threadId);
    connection.release();
  }
});

// Define a route to fetch internship data from the database
app.get('/api/internships', (req, res) => {
  // Adjust the query if your table name or fields differ
  pool.query('SELECT * FROM internships', (err, results) => {
    if (err) {
      console.error('Database query error:', err);
      return res.status(500).json({ error: 'Database error' });
    }
    res.json(results);
  });
});

// An optional test route to verify your server is working
app.get('/api/test', (req, res) => {
  res.json({ message: 'Hello from Express!' });
});

// Start the Express server
app.listen(PORT, () => {
  console.log(`Server is running at http://localhost:${PORT}`);
});
