<footer class="footer">
    <p>&copy; 2025 <b>Dhilip</b>. All rights reserved.</p>
</footer>

<script>

document.addEventListener("DOMContentLoaded", function () {
    const menuToggle = document.getElementById("menu-toggle");
    const navList = document.getElementById("nav-list");

    menuToggle.addEventListener("click", function () {
        navList.classList.toggle("show");
    });

    document.querySelectorAll(".nav-list a").forEach(link => {
        link.addEventListener("click", function () {
            navList.classList.remove("show");
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    let darkBtn = document.getElementById("t-btn");
    let btnText = document.getElementById("btn-text");
    let btnIcon = document.getElementById("btn-Icon");

    if (localStorage.getItem("darkMode") === "enabled") {
        document.body.classList.add("dark-mode");
        btnIcon.src = "img/sun.png";
        btnText.innerHTML = "Light Mode";
    } else {
        btnIcon.src = "img/moon.png";
        btnText.innerHTML = "Dark Mode";
    }

    darkBtn.addEventListener("click", function () {
        document.body.classList.toggle("dark-mode");

        if (document.body.classList.contains("dark-mode")) {
            localStorage.setItem("darkMode", "enabled");
            btnIcon.src = "img/sun.png";
            btnText.innerHTML = "Light Mode";
        } else {
            localStorage.setItem("darkMode", "disabled");
            btnIcon.src = "img/moon.png";
            btnText.innerHTML = "Dark Mode";
        }
    });
});


</script>
</body>
</html>
