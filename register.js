
import { initializeApp } from "https://www.gstatic.com/firebasejs/11.4.0/firebase-app.js";
import { getAnalytics } from "https://www.gstatic.com/firebasejs/11.4.0/firebase-analytics.js";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyC98lyqFk43xJ4BkPUsXqUV5S-yk-jFqE8",
  authDomain: "universe-de035.firebaseapp.com",
  projectId: "universe-de035",
  storageBucket: "universe-de035.firebasestorage.app",
  messagingSenderId: "473422479925",
  appId: "1:473422479925:web:6f039c1fdb7d809033677c",
  measurementId: "G-DQMC6WDF26"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const auth = firebaseConfig.auth();

document.getElementById('showSignUpForm').addEventListener('click', function() {
  document.getElementById('loginForm').style.display = 'none';
  document.getElementById('signupForm').style.display = 'block';
});

document.getElementById('showLoginForm').addEventListener('click', function() {
  document.getElementById('signupForm').style.display = 'none';
  document.getElementById('loginForm').style.display = 'block';
});

document.getElementById('loginForm').addEventListener('submit', function(event) {
  event.preventDefault(); // Prevents the form from submitting normally

  const email = document.getElementById('loginEmail').value;
  const password = document.getElementById('loginPassword').value;

  auth.signInWithEmailAndPassword(email, password)
      .then((userCredential) => {
          alert('Login successful!');
          window.location.href = "dashboard.html"; // Redirect to a dashboard or other page
      })
      .catch((error) => {
          alert('Error: ' + error.message);
      });
});


document.getElementById('signupButton').addEventListener('click', function(event) {
  event.preventDefault(); // Prevents the form from submitting normally

  const email = document.getElementById('signupEmail').value;
  const password = document.getElementById('signupPassword').value;
  const confirmPassword = document.getElementById('signupConfirmPassword').value;

  if (password !== confirmPassword) {
      alert('Passwords do not match!');
      return;
  }


  auth.createUserWithEmailAndPassword(email, password)
      .then((userCredential) => {
          alert('Sign-up successful!');
          window.location.href = "dashboard.html"; // Redirect to dashboard or other page
      })
      .catch((error) => {
          alert('Error: ' + error.message);
      });
});
