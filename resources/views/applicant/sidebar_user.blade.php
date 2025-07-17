<!DOCTYPE html>
<html>
<head>
<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    background-color: #f0f2f5; /* Light grey background similar to the image */
}

.sidebar {
    height: 100%;
    width: 300px; /* Adjust width as needed */
    position: fixed;
    top: 60px;
    left: 0;
    background-color: #ffffff; /* White background for the sidebar */
    overflow-x: hidden;
    padding-top: 20px;
    box-shadow: 2px 0 5px rgba(0,0,0,0.1); /* Subtle shadow for depth */
}

.profile-section {
    text-align: center;
    padding: 40px;
    border-bottom: 1px solid #eee; /* Separator for profile section */
    margin-bottom: 20px;
}

.profile-avatar {
    width: 100px;
    height: 100px;
    background-color: #e0e0e0; /* Grey background for the avatar placeholder */
    border-radius: 50%;
    margin: 0 auto 10px auto;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #666; /* Color for any placeholder icon if added */
    font-size: 50px; /* Adjust if using a default icon */
}

.profile-name {
    font-size: 20px;
    font-weight: bold;
    color: #333;
}

.sidebar-menu a {
    padding: 20px 25px;
    text-decoration: none;
    font-size: 16px;
    color: #555;
    display: flex;
    align-items: center;
    transition: background-color 0.3s;
    border-left: 5px solid transparent; /* For the active indicator */
    margin-bottom: 5px;
    
}

.sidebar-menu a:hover:not(.active) {
    background-color: #f1f1f1;
}

.sidebar-menu a.active {
    background-color: #e6f2ff; /* Light blue background for active item */
    color: #DA251C; /* Blue text for active item */
    border-left: 5px solid #DA251C; /* Blue left border for active item */
    font-weight: bold;
}

.sidebar-menu i {
    margin-right: 15px;
    font-size: 20px;
    color: #888; /* Icon color */
}

.sidebar-menu a.active i {
    color: #DA251C; /* Active icon color */
}

/* Optional: Add font-awesome for icons if you want to use actual icons */
/* Make sure to link to Font Awesome CDN in a real project */
/* For this example, we'll just simulate with text or simple shapes if no actual icon library is linked */
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>

<div class="sidebar">
    <div class="profile-section">
        <div class="profile-avatar">
             <i class="fas fa-user"></i>
        </div>
        <div class="profile-name">Haikal</div>
    </div>

    <div class="sidebar-menu">
        <a href="#" class="active">
            <i class="fas fa-user"></i> Profil Saya
        </a>
        <a href="#">
            <i class="fas fa-briefcase"></i> Lamaran Saya
        </a>
        <a href="#">
            <i class="fas fa-search"></i> Lowongan
        </a>
        <a href="#">
            <i class="fas fa-map-marker-alt"></i> Bursa Kerja
        </a>
        <a href="#">
            <i class="fas fa-question-circle"></i> Tanya Jawab
        </a>
    </div>
</div>

<script>
    // Simple script to change active state (for demonstration purposes)
    const menuItems = document.querySelectorAll('.sidebar-menu a');

    menuItems.forEach(item => {
        item.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default link behavior
            menuItems.forEach(i => i.classList.remove('active'));
            this.classList.add('active');
        });
    });
</script>

</body>
</html>