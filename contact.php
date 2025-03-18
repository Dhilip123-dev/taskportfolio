<?php 
session_start();
include 'header.php'; 
?>


<main class="main-content">
    <section id="contact" class="contact">
        <div class="container">
            <h2>Contact Me !!</h2>

            <?php if (isset($_SESSION['error'])) { ?>
                <p class="error-message">
                    <?= htmlspecialchars($_SESSION['error']); ?>
                </p>
                <?php unset($_SESSION['error']); ?>
            <?php } ?>

            <?php if (isset($_SESSION['success'])) { ?>
                <p class="success-message">
                    <?= htmlspecialchars($_SESSION['success']); ?>
                </p>
                <?php unset($_SESSION['success']); ?>
            <?php } ?>

            <div class="contact-form-wrapper">
                <form id="contact-form" action="formdata.php" method="post" class="contact-form">
                    <input type="text" name="name" id="name" placeholder="Enter Your Name">
                    <input type="email" name="email" id="email" placeholder="Enter Your Email">
                    <input type="text" name="subject" id="subject" placeholder="Subject">
                    <textarea name="message" id="message" placeholder="Your Message"></textarea>
                    <button type="submit" class="btn">Send Message</button>
                </form>
            </div>
        </div>
    </section>
</main>

<?php include 'footer.php'; ?>
