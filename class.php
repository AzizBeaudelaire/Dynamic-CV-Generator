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
            <div class='banner'>
                <div class='left'>
                    <div class='image'>
                        <img src='images/{$this->picture}' alt='Photo'>
                    </div>
                </div>
                <div class='right'>
                    <div>
                        <h1>{$this->fullname}</h1>
                        <h3>({$this->profession})</h3>
                        <p>Bonjour</p>
                    </div>
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
    private $banner;
    private $sidebar;
    private $footer;

    public function __construct(Banner $banner, Sidebar $sidebar, Footer $footer) {
        $this->banner = $banner;
        $this->sidebar = $sidebar;
        $this->footer = $footer;
    }

    public function getHTML() {
        return "
            <div class='page'>
                {$this->banner->getHTML()}
                <div class='section'>
                    {$this->sidebar->getHTML()}
                    {$this->footer->getHTML()}
                </div>
            </div>";
    }
}
?>
