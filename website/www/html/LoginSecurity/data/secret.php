<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to the login page if the user is not logged in
    header('Location: ../login.php');
    exit();
}

// If the user is logged in, show the secret content
?>

<!DOCTYPE html>
<h1>Important Data SECURE ADMIN ONLY</h1>
<h2>The most important</h2>
<li>Here's the REALLY even more secret code to get access to the system: <b>morrisdance4life</b></li>

<h2>Other passwords</h2>
<ul>
  <li><b>StickAndSecure123</b> - Accesses the inventory system for Morris dance sticks and costumes.</li>
  <li><b>JingleAllTheWay2024</b> - Unlocks the bell maintenance tracker for keeping dancers’ bells in perfect condition.</li>
  <li><b>BellsAndWhistles!</b> - Opens the sound system for organizing music and sound effects used during Morris dance performances.</li>
  <li><b>HopSkipAndHash</b> - Grants access to the choreography database, storing various hop, skip, and jump sequences from different Morris traditions.</li>
  <li><b>CaperCode!</b> - Secures entry to the caper training app, which teaches dancers how to perfect their leaps and high steps.</li>
  <li><b>HalfHitch456</b> - Accesses the knot-tying resource center, useful for learning how to tie sash cords and costume details properly.</li>
  <li><b>MorrisSteppinSecure</b> - Unlocks the step archive, storing footwork patterns and techniques for different Morris traditions.</li>
  <li><b>ClogItOut2024</b> - Accesses the clog management system for North West Morris, where dancers can log wear-and-tear on their clogs.</li>
  <li><b>SidestepSafety@</b> - Grants access to the safety protocol system, outlining the proper guidelines for preventing injuries during vigorous Morris routines.</li>
  <li><b>CrossCapers!</b> - Opens the event scheduling system, used to coordinate capers and performances at Morris dancing festivals.</li>
</ul>


</html>
