
<?php 
include_once('guest_header.php');
?>
<div id="fullimage-container" onmouseover="displayhidebutton()" onmouseleave="hidehidebutton()">
    <img src="" id="fullimage">
    <button id="zoomout" onclick="back()">-</button>
</div>
<div class="container pt-5" id="main">
<h4 class="card-title">Academia Visit to Adani Group</h4>
<h6>Posted on January 3rd, 2024 @ 08:51am</h6>
<hr><br><br>
<p class="card-text">School of Management, RK University organised an industry-academia visit to Adani Group, Mundra for MBA students. Students visited Adani Wind Power Plant, Adani Solar Plant, Adani Power Plant Limited, Adani Ports & SEZ Limited and Adani Wilmar Limited where they got a chance to learn about import-export and production processes along with diverse business operations.</p>
<?php 

?>
<div class="row">
    <div class="col">
        <div class="image-container" onmouseover="displaybutton()" onmouseleave="hidebutton()">
<img src="images/event/adani1.jpg">
<button id="zoomin" onclick="displayfullimage('images/event/adani1.jpg')">+</button>
</div>
    </div>  
    <div class="col">
        <div class="image-container" onmouseover="displaybutton2()" onmouseleave="hidebutton2()">
<img src="images/event/adani2.jpg">
<button id="zoomin2" onclick="displayfullimage('images/event/adani2.jpg')">+</button>
</div>
    </div>
    <div class="col">
        <div class="image-container" onmouseover="displaybutton3()" onmouseleave="hidebutton3()">
<img src="images/event/adani3.jpg">
<button id="zoomin3" onclick="displayfullimage('images/event/adani3.jpg')">+</button>
</div>
    </div>
</div>
<!-- <img src="images/event/adani2.jpg" height="400px" widht="300px">
<img src="images/event/adani3.jpg" height="400px" widht="300px"> -->
</div>
