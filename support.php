<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>skillTrain</title>

    <!--Bootstap CSS CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!--Bootstap icon CDN-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Load Alpine.js (Defer Loading) -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <?php include('header.html');?>

</head>

<style>





/* .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

h1, h2 {
    color: black;
    margin-bottom: 20px;
}

h1 {
    font-size: 36px;
    text-align: left;
    margin-bottom: 40px;
}

section p {
    line-height: 1.6;
    font-size: 18px;
    margin-bottom: 20px;
}

/* Contact Information */
.contact-info {
    margin-bottom: 40px;
}

.contact-info ul {
    list-style: none;
    padding-left: 0;
}

.contact-info li {
    font-size: 18px;
    margin: 10px 0;
}

/* FAQ Section */
.faq {
    background-color: #f9f9f9;
    padding: 40px 20px;
    border-radius: 8px;
}

.faq-item {
    margin-bottom: 25px;
}

.faq-item h3 {
    font-size: 20px;
    font-weight: bold;
    color: black;
}

.faq-item p {
    font-size: 16px;
    color: #555;
    line-height: 1.6;
} */



/* Responsive Design */
@media screen and (max-width: 768px) {
    .contact-info ul li {
        font-size: 16px;
    }

    .faq-item h3 {
        font-size: 18px;
    }

    .faq-item p {
        font-size: 14px;
    }
}



</style>
<body>

  

    <!-- Main content -->
    <main> 
    <section class="support">
            <div class="container">
                <h1>Support</h1>

                <div class="contact-info">
                    <h2>Contact Information</h2>
                    <p>If you need assistance, feel free to reach out to our support team. We're here to help!</p>

                    <ul>
                        <li><strong>Phone:</strong> +1 (800) 123-4567</li>
                        <li><strong>Email:</strong> support@skillTrain.com</li>
                    </ul>
                </div>

                <div class="faq" id="faq">
                    <h2>Frequently Asked Questions (FAQ)</h2>

                    <div class="faq-item">
                        <h3>How do I enroll in a course?</h3>
                        <p>To enroll in a course, simply browse our course catalog, select the course you are interested in, and click the "Enroll" button. You'll need to create an account or log in if you haven't already.</p>
                    </div>

                    <div class="faq-item">
                        <h3>Can I access the course materials after completion?</h3>
                        <p>Yes! Once you complete a course, you'll have lifetime access to the materials, including lectures, quizzes, and assignments. You can revisit the content anytime to review or refresh your knowledge.</p>
                    </div>


                    <div class="faq-item">
                        <h3>Are the courses accredited?</h3>
                        <p>While our courses are not formally accredited by any institution, many of our courses provide valuable knowledge and skills that can help boost your career. We also offer certificates upon completion that are recognized by employers.</p>
                    </div>

                    <!-- Add more FAQs as needed -->
                </div>
            </div>
        </section>
    </main>

    <?php include('footer.html');?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>