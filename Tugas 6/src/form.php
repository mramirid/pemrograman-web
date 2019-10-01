<?php 
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nama = isset($_POST['header-name']) ? $_POST['header-name'] : "-";
        $roles = isset($_POST['header-roles']) ? $_POST['header-roles'] : "-";
        $description = isset($_POST['about-description']) ? $_POST['about-description'] : "-";
        
        $elementary = isset($_POST['elementary-school']) ? $_POST['elementary-school'] : "-";
        $junior = isset($_POST['jh-school']) ? $_POST['jh-school'] : "-";
        $senior = isset($_POST['sh-school']) ? $_POST['sh-school'] : "-";
        $university = isset($_POST['university']) ? $_POST['university'] : "-";
        $educations = "$elementary,$junior,$senior,$university";
        
        $showSkills = isset($_POST['show-skills']) ? $_POST['show-skills'] : "-";
        $showPortofolio = isset($_POST['show-portofolio']) ? $_POST['show-portofolio'] : "-";

        $phone = isset($_POST['phone-number']) ? $_POST['phone-number'] : "-";
        $email = isset($_POST['email']) ? $_POST['email'] : "-";

        $query = "INSERT INTO `profile` (`nama`, `roles`, `description`, `educations`, `skills`, `portofolio`, `phone`, `email`) 
                  VALUES ('$nama', '$roles', '$description', '$educations', '$showSkills','$showPortofolio', '$phone', '$email');";
        mysqli_query(connection(),$query);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Input Form</title>
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/960_16_col.css">
</head>
<body class="container_16">
    <nav class="grid_16">
        <a href="index.php" class="button grid_2"><span>Back</span></a>
        <a href="#" class="button grid_2"><span>Header</span></a>
        <a href="#about" class="button grid_2"><span>About</span></a>
        <a href="#skills" class="button grid_2"><span>Skills</span></a>
        <a href="#portofolio" class="button grid_2"><span>Portofolio</span></a>
        <a href="#contact" class="button grid_2"><span>Contact</span></a>
    </nav>

    <form action="view-profile.php" method="post">
        <header class="grid_16">
            <div id="header-content">
                <div id="header-photo" class="grid_16 alpha omega">
                    <img src="img/photo-profile.png" alt="My photo profile" class="grid_4 push_6">
                </div>
                <div id="header-info" class="grid_16 alpha omega">
                    <input type="text" placeholder="Your Name" name="header-name" class="grid_6 push_5" style="text-align: center">
                    <input type="text" placeholder="Your roles" name="header-roles" id="header-roles" class="grid_10 push_3" style="text-align: center">
                </div>
            </div>
        </header>
        
        <section id="about" class="grid_16" class="grid_16">
            <p id="about-title" class="grid_16 alpha omega">ABOUT</p>
            <div id="about-content" class="grid_16 alpha omega">
                <div id="description" class="grid_6 push_2">
                    <p id="description-title">Deskripsi</p>
                    <textarea name="about-description" placeholder="Describe yourself" style="resize: none" cols="35" rows="15"></textarea>
                </div>
                <div id="education" class="grid_6 push_2">
                    <p id="education-title">Riwayat pendidikan</p>
                    <div id="education-text">
                        <ul>
                            <li><input type="text" name="elementary-school" placeholder="Elementary school"></li>
                            <li><input type="text" name="jh-school" placeholder="Junior high school"></li>
                            <li><input type="text" name="sh-school" placeholder="Senior high school"></li>
                            <li><input type="text" name="university" placeholder="University"></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    
        <section id="skills" class="grid_16">
            <p id="skills-title">SKILLS</p>
            <div id="skills-content">
                <p class="grid_16 alpha omega" style="text-align: center">Show skills?</p>
                <div id="decision-answer" class="grid_4 push_6 alpha omega">
                    <div class="answer-option grid_2 alpa omega">
                        <input type="radio" name="show-skills" value="SHOW" checked>
                        <p> Show</p>
                    </div>
                    <div class="answer-option grid_2 alpa omega">
                        <input type="radio" name="show-skills" value="HIDE">
                        <p> Hide</p>
                    </div>
                </div>
            </div>
        </section>
    
        <section id="portofolio" class="grid_16">
            <p id="portofolio-title">PORTOFOLIO</p>
            <div id="portofolio-content">
                <p class="grid_16 alpha omega" style="text-align: center">Show portofolio?</p>
                <div id="decision-answer" class="grid_4 push_6 alpha omega">
                    <div class="answer-option grid_2 alpa omega">
                        <input type="radio" name="show-portofolio" value="SHOW" checked>
                        <p> Show</p>
                    </div>
                    <div class="answer-option grid_2 alpa omega">
                        <input type="radio" name="show-portofolio" value="HIDE">
                        <p> Hide</p>
                    </div>
                </div>
            </div>
        </section>
    
        <section id="contact" class="grid_16">
            <p id="contact-title">CONTACT</p>
            <div id="contact-content" class="prefix_2">
                <div id="social-media" class="grid_4">
                    <a href="#x">
                        <img src="img/facebook.png" alt="Facebook Account">
                    </a>
                    <a href="#x">
                        <img src="img/instagram.png" alt="Instagram Account">
                    </a>
                    <a href="#x">
                        <img src="img/linkedIn.png" alt="LinkedIn Account">
                    </a>
                    <p>Social Media</p>
                </div>
                <div id="phone-number" class="grid_4">
                    <img src="img/whatsapp.png" alt="WhatsApp">
                    <input type="text" name="phone-number" placeholder="Phone number" id="input-phone-number" style="text-align: center">
                </div>
                <div id="mail" class="grid_4">
                    <img src="img/gmail.svg" alt="Gmail">
                    <input type="email" name="email" placeholder="Email" id="input-email" style="text-align: center">
                </div>
            </div>
        </section>
    
        <footer class="grid_16">
            <button type="submit" class="grid_3">Submit</button>
        </footer>
    </form>
</body>
</html>