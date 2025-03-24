const express = require('express');
const cors = require('cors');
const bodyParser = require('body-parser');
const app = express();
const PORT = 3000;

app.use(cors());
app.use(bodyParser.json());

const internships = [
  {
    title: "Software Development Intern",
    company: "Tech Innovators",
    location: "Rochester Hills, MI",
    deadline: "April 15, 2025"
  },
  {
    title: "Marketing Intern",
    company: "Creative Minds",
    location: "Detroit, MI",
    deadline: "March 30, 2025"
  }
];

app.get('/api/internships', (req, res) => {
  res.json(internships);
});

app.listen(PORT, () => {
  console.log(`Server running on http://localhost:3000`);
});
