import { initializeApp } from "https://www.gstatic.com/firebasejs/9.6.1/firebase-app.js";
import { getAuth, signInWithEmailAndPassword, createUserWithEmailAndPassword } from "https://www.gstatic.com/firebasejs/9.6.1/firebase-auth.js";

// Your Firebase configuration
const firebaseConfig = {
  apiKey: "AIzaSyC98lyqFk43xJ4BkPUsXqUV5S-yk-jFqE8",
  authDomain: "universe-de035.firebaseapp.com",
  projectId: "universe-de035",
  storageBucket: "universe-de035.firebasestorage.app",
  messagingSenderId: "473422479925",
  appId: "1:473422479925:web:6f039c1fdb7d809033677c",
  measurementId: "G-DQMC6WDF26"
};


const app = initializeApp(firebaseConfig);
const auth = getAuth(app); 


document.getElementById('showSignUpForm').addEventListener('click', function() {
  document.getElementById('loginForm').style.display = 'none';
  document.getElementById('signupForm').style.display = 'block';
});

document.getElementById('showLoginForm').addEventListener('click', function() {
  document.getElementById('signupForm').style.display = 'none';
  document.getElementById('loginForm').style.display = 'block';
});


document.getElementById('loginForm').addEventListener('submit', function(event) {
  event.preventDefault(); 

  const email = document.getElementById('loginEmail').value;
  const password = document.getElementById('loginPassword').value;

  signInWithEmailAndPassword(auth, email, password)
    .then((userCredential) => {
      alert('Login successful!');
      window.location.href = "general-posts.html"; 
    })
    .catch((error) => {
      alert('Error: ' + error.message);
    });
});


document.getElementById('signupButton').addEventListener('click', function(event) {
  event.preventDefault(); 

  const email = document.getElementById('signupEmail').value;
  const password = document.getElementById('signupPassword').value;
  const confirmPassword = document.getElementById('signupConfirmPassword').value;

  if (password !== confirmPassword) {
    alert('Passwords do not match!');
    return;
  }

  createUserWithEmailAndPassword(auth, email, password)
    .then((userCredential) => {
      alert('Sign-up successful!');
      window.location.href = "general-posts.html"; 
    })
    .catch((error) => {
      alert('Error: ' + error.message);
    });
});

