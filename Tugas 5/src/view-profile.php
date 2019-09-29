<?php
    include ('conn.php'); 

    $nama = $roles = $description = $elementary = $junior 
        = $senior = $university = $showSkills = $showPortofolio = $phone = $email = "-";

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['no'])) {
            $no = $_GET['no'];
            $query = "SELECT * FROM profile WHERE no = '$no'"; 
            $result = mysqli_query(connection(), $query);

            $data = mysqli_fetch_array($result);
            $nama = isset($data['nama']) ? $data['nama'] : "-";
            $roles = isset($data['roles']) ? $data['roles'] : "-";
            $description = isset($data['description']) ? $data['description'] : "-";
            $arr_educations[] = explode(",", $data['educations'], 4);
            $elementary = isset($arr_educations[0][0]) ? $arr_educations[0][0] : "-";
            $junior = isset($arr_educations[0][1]) ? $arr_educations[0][1] : "-";
            $senior = isset($arr_educations[0][2]) ? $arr_educations[0][2] : "-";
            $university = isset($arr_educations[0][3]) ? $arr_educations[0][3] : "-";
            $showSkills = isset($data['skills']) ? $data['skills'] : "-";
            $showPortofolio = isset($data['portofolio']) ? $data['portofolio'] : "-";
            $phone = isset($data['phone']) ? $data['phone'] : "-";
            $email = isset($data['email']) ? $data['email'] : "-";
        }
    }

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
    <link rel="stylesheet" href="css/view-profile.css">
    <link rel="stylesheet" href="css/960_16_col.css">
</head>
<body class="container_16">
    <nav class="grid_16">
        <a href="index.php" class="button grid_2"><span>Back</span></a>
        <a href="#header" class="button grid_2"><span>Header</span></a>
        <a href="#about" class="button grid_2"><span>About</span></a>
        <a href="#skills" class="button grid_2"><span>Skills</span></a>
        <a href="#portofolio" class="button grid_2"><span>Portofolio</span></a>
        <a href="#contact" class="button grid_2"><span>Contact</span></a>
    </nav>

    <header class="grid_16">
        <div id="header-content">
            <div id="header-photo" class="grid_16 alpha omega">
                <img src="img/photo-profile.png" alt="My photo profile" class="grid_4 push_6">
            </div>
            <div id="header-info" class="grid_16 alpha omega">
                <div id="header-name" class="grid_6 push_5">
                <?php 
                    if ($nama != "-")
                        echo "<p>$nama</p>";
                    else
                        echo "<p>-</p>";
                ?>
                </div>
                <div id="header-roles" class="grid_10 push_3">
                <?php  
                    if ($roles != "-")
                        echo "<p>$roles</p>";
                    else
                        echo "<p>-</p>";
                ?>
                </div>
            </div>
        </div>
    </header>

    <section id="about" class="grid_16" class="grid_16">
        <p id="about-title" class="grid_16 alpha omega">ABOUT</p>
        <div id="about-content" class="grid_16 alpha omega">
            <div id="description" class="grid_6 push_2">
                <p id="description-title">Deskripsi</p>
                <?php  
                    if ($description != "-")
                        echo "<p id=\"description-text\">$description</p>";
                    else
                        echo "<p>-</p>";
                ?>
            </div>
            <div id="education" class="grid_6 push_2">
                <p id="education-title">Riwayat pendidikan</p>
                <div id="education-text">
                    <ul>
                    <?php
                        if ($elementary != "-")
                            echo "<li>$elementary</li>";
                        else
                            echo "<li>-</li>";

                        if ($junior != "-")
                            echo "<li>$junior</li>";
                        else
                            echo "<li>-</li>";
                        
                        if ($senior != "-")
                            echo "<li>$senior</li>";
                        else
                            echo "<li>-</li>";

                        if ($university != "-")
                            echo "<li>$university</li>";
                        else
                            echo "<li>-</li>";
                    ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="skills" class="grid_16">
        <p id="skills-title">SKILLS</p>
        <div id="skills-content" class="grid_16 alpha omega">
        <?php 
            if ($showSkills != "-" && $showSkills == "SHOW") { ?>
                <img src="img/html5.png" alt="HTML5" class="grid_3">
                <img src="img/css3.png" alt="CSS3" class="grid_3">
                <img src="img/javascript.png" alt="JS" class="grid_3">
                <img src="img/android.png" alt="Adroid" class="grid_3">
                <img src="img/python.png" alt="Python" class="grid_3">
        <?php
            } else {
                echo "<p>-</p>";
            }
        ?>
        </div>
    </section>

    <section id="portofolio" class="grid_16">
        <p id="portofolio-title">PORTOFOLIO</p>
        <div id="portofolio-content" class="grid_16 alpha omega">
        <?php 
            if ($showPortofolio != "-" && $showPortofolio == "SHOW") { ?>
                <div class="grid_3 push_2">
                    <p>Github</p>
                    <a href="#x">
                        <img src="img/github.svg" alt="Github account">
                    </a>
                </div>
                <div class="grid_3 push_3">
                    <p>Dicoding</p>
                    <a href="#x">
                        <img src="img/dicoding.png" alt="Dicoding account">
                    </a>
                </div>
                <div class="grid_3 push_4">
                    <p>Website</p>
                    <a href="#x">
                        <img src="img/lab-it.png" alt="Website">
                    </a>
                </div>
        <?php
            } else {
                echo "<p>-</p>";
            }
        ?>
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
                <?php
                    if ($phone != "-")
                        echo "<p>$phone</p>";
                    else
                        echo "<p>-</p>";
                ?>
            </div>
            <div id="mail" class="grid_4">
                <img src="img/gmail.svg" alt="Gmail">
                <?php 
                    if ($email != "-")
                        echo "<p>$email</p>";
                    else
                        echo "<p>-</p>";
                ?>
            </div>
        </div>
    </section>

    <footer class="grid_16">
        <p>Made with &#10084; by @mramirid</p>
    </footer>
</body>
</html>