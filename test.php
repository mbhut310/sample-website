<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Slide Navigation</title>
<style>
    /* Styling for navigation */
    nav {
        background-color: #333;
        color: white;
        padding: 10px;
    }
    nav ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
    }
    nav ul li {
        display: inline-block;
        margin-right: 10px;
        cursor: pointer;
    }
    nav ul li.active {
        color: red; /* Change color of active nav item */
    }

    /* Styling for content div */
    .content {
        display: none;
        padding: 20px;
    }
    .content.active {
        display: block; /* Display active content */
    }
</style>
</head>
<body>

<nav>
    <ul>
        <li onclick="showContent(1)">Option 1</li>
        <li onclick="showContent(2)">Option 2</li>
        <li onclick="showContent(3)">Option 3</li>
    </ul>
</nav>

<div class="content" id="content1">Content for Option 1</div>
<div class="content" id="content2">Content for Option 2</div>
<div class="content" id="content3">Content for Option 3</div>

<script>
    function showContent(contentNumber) {
        // Hide all content divs
        var contents = document.getElementsByClassName('content');
        for (var i = 0; i < contents.length; i++) {
            contents[i].classList.remove('active');
        }

        // Display the selected content div
        var selectedContent = document.getElementById('content' + contentNumber);
        selectedContent.classList.add('active');

        // Remove 'active' class from all nav items
        var navItems = document.querySelectorAll('nav ul li');
        navItems.forEach(function(item) {
            item.classList.remove('active');
        });

        // Add 'active' class to the clicked nav item
        var clickedNavItem = document.querySelector('nav ul li:nth-child(' + contentNumber + ')');
        clickedNavItem.classList.add('active');
    }
</script>

</body>
</html>
