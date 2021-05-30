<?php
session_start();

// Flash message helper
// EXAMPLE - flash('register_sucess', 'You are now registered', 'alert alert-danger');
// DISPLAY IN VIEW echo flash('register_sucess');
function flash($name = '', $message = '', $class = 'alert alert-success')
{
  // Checks if $name variable is not empty
  if (!empty($name)) {
    // Sets message if $_SESSION['$name'] is empty
    if (!empty($message) && empty($_SESSION[$name])) {
      // Unsets previous $_SESSION
      if (!empty($_SESSION[$name])) {
        unset($_SESSION[$name]);
      }

      if (!empty($_SESSION[$name . '_class'])) {
        unset($_SESSION[$name . '_class']);
      }

      // Sets current $_SESSION
      $_SESSION[$name] = $message;
      $_SESSION[$name . '_class'] = $class;
    }

    // Calls for message flashing
    else if (empty($message) && !empty($_SESSION[$name])) {
      if (!empty($_SESSION[$name . '_class'])) {
        $class = $_SESSION[$name . '_class'];
      } else {
        $class = '';
      }

      // $class = !empty($_SESSIO[$name . '_class']) ? $_SESSION[$name . '_class'] : '';

      // Message flashing
      echo '<div class="' . $class . '" id="msg-flash">' . $_SESSION[$name] . '</div>';

      // Unsets current $_SESSION after message flashing
      unset($_SESSION[$name]);
      unset($_SESSION[$name . '_class']);
    }
  }
}
// Login helper
// Check if user is logged in
function isLoggedIn()
{
  if (isset($_SESSION['user_id'])) {
    return true;
  } else {
    return false;
  }
}
