<?php

class Banner {
    private $fullname;
    private $profession;
    private $picture;

    public function __construct($fullname, $profession, $picture) {
        $this->fullname = $fullname;
        $this->profession = $profession;
        $this->picture = $picture;
    }

    public function getHTML() {
        return "
            <div class='container'>
                <div class='competences'>
                    <h2>Compétences</h2>
                    <p>{$this->competences}</p>
                </div>
                <div class='formation'>
                    <h2>Formation</h2>
                    <p>{$this->formation}</p>
                </div>
                <div class='experience'>
                    <h2>Expérience</h2>
                    <p>{$this->experience}</p>
                </div>
                <div class='hobbies'>
                    <h2>Hobbies</h2>
                    <p>{$this->hobbies}</p>
                </div>
                <div class='certificates'>
                    <h2>Certificats</h2>
                    <ul>
                        <li>{$this->certificate1}</li>
                        <li>{$this->certificate2}</li>
                        <li>{$this->certificate3}</li>
                    </ul>
                </div>
            </div>";
    }
}

class Sidebar {
    private $objective;

    public function __construct($objective) {
        $this->objective = $objective;
    }

    public function getHTML() {
        return "
            <div class='sidebar'>
                <div class='section1'>
                    <h2>Objectif</h2>
                    <p>{$this->objective}</p>
                </div>
            </div>";
    }
}

class Footer {
    private $mobile;
    private $email;

    public function __construct($mobile, $email) {
        $this->mobile = $mobile;
        $this->email = $email;
    }

    public function getHTML() {
        return "
            <div class='footer'>
                Mobile: {$this->mobile} / Email: {$this->email}
            </div>";
    }
}

class Container {
    private $competences;
    private $formation;
    private $experience;
    private $hobbies;
    private $certificate1;
    private $certificate2;
    private $certificate3;

    public function __construct($competences, $formation, $experience, $hobbies, $certificate1, $certificate2, $certificate3) {
        $this->competences = $competences;
        $this->formation = $formation;
        $this->experience = $experience;
        $this->hobbies = $hobbies;
        $this->certificate1 = $certificate1;
        $this->certificate2 = $certificate2;
        $this->certificate3 = $certificate3;
    }

    public function getHTML() {
        return "
            <div class='container'>
                <div class='competences'>
                    <h2>Compétences</h2>
                    <p>{$this->competences}</p>
                </div>
                <div class='formation'>
                    <h2>Formation</h2>
                    <p>{$this->formation}</p>
                </div>
                <div class='experience'>
                    <h2>Expérience</h2>
                    <p>{$this->experience}</p>
                </div>
                <div class='hobbies'>
                    <h2>Hobbies</h2>
                    <p>{$this->hobbies}</p>
                </div>
                <div class='certificates'>
                    <h2>Certificats</h2>
                    <ul>
                        <li>{$this->certificate1}</li>
                        <li>{$this->certificate2}</li>
                        <li>{$this->certificate3}</li>
                    </ul>
                </div>
            </div>";
    }
}

?>
