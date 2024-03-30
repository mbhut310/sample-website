 function displaybutton()
 {
    var button=document.getElementById('zoomin');
    button.style.display='block';
 }
 function hidebutton()
 {
    var button=document.getElementById('zoomin');
    button.style.display='none';
 }
 function displaybutton2()
 {
    var button=document.getElementById('zoomin2');
    button.style.display='block';
 }
 function hidebutton2()
 {
    var button=document.getElementById('zoomin2');
    button.style.display='none';
 }
 function displaybutton3()
 {
    var button=document.getElementById('zoomin3');
    button.style.display='block';
 }
 function hidebutton3()
 {
    var button=document.getElementById('zoomin3');
    button.style.display='none';
 }
 function displayfullimage($imagepath)
 {
    var container=document.getElementById('fullimage-container');
    var image=document.getElementById('fullimage');
    container.style.display='block';
    image.src=$imagepath;
    var container2=document.getElementById('main');
    container2.style.display='none';
 }
 function displayhidebutton()
 {   
    var button=document.getElementById('zoomout');
    button.style.display='block';
 }
 function hidehidebutton()
 {
    var button=document.getElementById('zoomout');
    button.style.display='none';
 }
 function back()
 {
   var container=document.getElementById('fullimage-container');
   container.style.display='none';
   var container=document.getElementById('main');
   container.style.display='block';
 }
 function showcontent(contentNumber) {
   // Hide all content divs
   var contents = document.getElementsByClassName('about_container');
   alert(contents);
   for (var i = 0; i < contents.length; i++) {
       contents[i].classList.remove('active');
   }

   // Display the selected content div
   var selectedContent = document.getElementById('about_container' + contentNumber);
   selectedContent.classList.add('active');

   // Remove 'active' class from all nav items
   var navItems = document.querySelectorAll('about_side_nav li');
   navItems.forEach(function(item) {
       item.classList.remove('active');
   });

   // Add 'active' class to the clicked nav item
   var clickedNavItem = document.querySelector('about_side_nav li:nth-child(' + contentNumber + ')');
   clickedNavItem.classList.add('active');
}
$(document).ready(function () {
   $.validator
});
