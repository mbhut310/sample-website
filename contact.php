<?php 
include_once('guest_header.php');
?>
<div class="container mt-3">
  <h2>Contact Us</h2><hr><br><br>
  <form action="#" method="post" id="form_validation">
  <div class="mb-3 mt-3">
      <label for="full_name">Full Name:</label>
      <input type="text" class="form-control" id="full_name" placeholder="Enter Full Name" name="full_name">
      <br>
      <span id="full_name_error"></span>
    </div>
    <div class="mb-3 mt-3">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="row">
      <div class="col">
        <input type="text" class="form-control" placeholder="Subject" name="subject">
      </div>
      <div class="col">
        <input type="password" class="form-control" placeholder="Phone" name="phone">
      </div>
    </div>
    <br>
    <textarea class="form-control" rows="5" id="message" name="message" placeholder="message"></textarea>
    <div class="row">
      <div class="col-3">
      <button type="submit" class="contact_btn" id="submit" name="submit">SEND YOUR MESSAGE</button>
      </div>
      <div class="col-9">
      <button type="submit" class="contact_btn ">RESET</button>
      </div>
    </div>
  </form>
  <br><br>
</div>