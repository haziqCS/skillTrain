<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>skillTrain</title>

    <?php include('../header.html'); ?>
</head>

<style>

/* Main content */
/* main {
    padding: 50px 20px;
    background-color: #fff;
} */

/* .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
} */

/* h1, h2 {
    color: #4CAF50;
    margin-bottom: 20px;
}

h1 {
    font-size: 36px;
    text-align: center;
    margin-bottom: 40px;
} */

section p {
    line-height: 1.6;
    font-size: 18px;
    margin-bottom: 20px;
}

.vision, .mission {
    margin-bottom: 40px;
}

/* Team Section */
.team {
    background-color: #f9f9f9;
    padding: 40px 20px;
    border-radius: 8px;
}

.team-members {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
}

.team-member {
    background-color: #fff;
    border-radius: 8px;
    width: 280px;
    padding: 20px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    margin-bottom: 30px;
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.team-member img {
    border-radius: 50%;
    width: 120px;
    height: 120px;
    margin-bottom: 15px;
    object-fit: cover;
}

.team-member h3 {
    font-size: 20px;
    font-weight: bold;
    color: #333;
    margin-bottom: 10px;
}

.team-member p {
    font-size: 14px;
    color: #777;
    margin-bottom: 10px;
}

.team-member:hover {
    transform: translateY(-10px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
}

nt-size: 14px;
}

</style>
<body>
    <!-- Main content -->
    <main>
        <section class="about-us">
            <div class="container p-5">
                <h1 class="fw-bold text-body-emphasis">About Us</h1>
                <p>Welcome to skillTrain an online learning platform! Our objective is to provide accessible, high-quality education to learners all around the world.</p>

                <div class="vision">
                    <h2 class="fw-bold text-body-emphasis">Our Vision</h2>
                    <p>Our vision is to create a global community of learners, equipped with the skills they need to succeed in their personal and professional lives. We aim to transform how the world learns by offering affordable, world-class education to anyone, anywhere.</p>
                </div>

                <div class="mission">
                    <h2 class="fw-bold text-body-emphasis">Our Mission</h2>
                    <p>Our mission is to empower learners of all ages to achieve their goals by providing a diverse range of online courses and certifications taught by industry experts. We are committed to making learning accessible, engaging, and flexible, so that anyone, regardless of their background, can unlock their full potential.</p>
                </div>

                <div class="team">
                    <h2>Meet Our Team</h2>
                    <p>Our team consists of dedicated professionals with a passion for education and technology.</p>

                    <div class="team-members">
                        <div class="team-member">
                            <img src="images/team-member1.jpg" alt="Wan">
                            <h3>Wan Muhammad Zulhaziq Bin Wan Husni</h3>
                            <p>Project Manager</p>
                            <p>Wan act as our group leader distributing tasks among us.</p>
                        </div>

                        <div class="team-member">
                            <img src="images/team-member2.jpg" alt="Firdaus">
                            <h3>Mohammad Firdaus Bin Nasir</h3>
                            <p>Technical Writer</p>
                            <p>Firdaus act as the writer for our report regarding the project.</p>
                        </div>

                        <div class="team-member">
                            <img src="images/team-member3.jpg" alt="Aiman">
                            <h3>Aiman Hafizuddin Bin Mohd Marman</h3>
                            <p>Programmer</p>
                            <p>Aiman act as the one that write and test code for our website.</p>
                        </div>

                        <div class="team-member">
                            <img src="images/team-member4.jpg" alt="Shahmi">
                            <h3>Mohamad Amirul Shahmifitri Bin Muda</h3>
                            <p>Programmer</p>
                            <p>Shahmi act as the one that write and test code for our website.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php include('../footer.html');?>
</body>
</html>