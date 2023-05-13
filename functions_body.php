<?php

namespace main;

use \PDO;
class body_element
{
    private string $hostname = "localhost";
    private int $port = 3306;
    private string $username = "root";
    private string $password = "";
    private string $dbName = "sj-2023";

    private $connection;

    public function __construct(string $host = "", int $port = 3306, string $user = "", string $pass = "", string $dbName = "")
    {
        if (!empty($host)) {
            $this->hostname = $host;
        }

        if (!empty($port)) {
            $this->port = $port;
        }

        if (!empty($user)) {
            $this->username = $user;
        }

        if (!empty($pass)) {
            $this->password = $pass;
        }

        if (!empty($dbName)) {
            $this->dbName = $dbName;
        }

        try{
            $this->connection = new PDO("mysql:host=".$this->hostname.";dbname=".$this->dbName.
                ";charset=utf8mb4;port=".$this->port,$this->username,$this->password);
        } catch(\Exception $exception) {
            echo $exception->getMessage();
            die();
        }

    }

    public function getTeam() : array
    {
        try{
            $sql = "SELECT * FROM team";
            $query = $this->connection->query($sql);
            $teamItems = $query->fetchAll(PDO::FETCH_ASSOC);

        } catch(\Exception $exception) {
            $teamItems = [0=>['id'=>1,'meno'=>'Lukáš','priezvisko'=>'Horváth','pozicia'=>'Digitálny Marketér'],
                          1=>['id'=>2,'meno'=>'Mária','priezvisko'=>'Kováčová','pozicia'=>'Analytička'],
                          2=>['id'=>2,'meno'=>'Ján','priezvisko'=>'Varga','pozicia'=>'Digitálny Influencer']
                        ];
        }
        return $teamItems;
    }

    public function printTeam(array $teamItems)
    {
        foreach($teamItems as $key => $item){
            echo '<div class="item author-item">
                   <div class="member-thumb">
                    <img class="img-thumbnail" src="assets/images/member-item-0'.$item['id'].'.jpg" alt="">
                   </div>
                   <h4>'.$item['meno']." ".$item['priezvisko'].'</h4>
                   <span>'.$item['pozicia'].'</span>
                  </div>'
                ;
        }
    }

    public function insertTeamMember(int $id,string $meno, string $priezvisko, string $pozicia) : bool
    {
        $insert = false;
        $sql = "INSERT INTO team(id,meno,priezvisko,pozicia) VALUES ('".$id."','".$meno."','".$priezvisko."','".$pozicia."')";

        try {
            $statement = $this->connection->prepare($sql);
            $insert = $statement->execute();
        } catch (\Exception $exception) {
            echo "Nebolo možné vložiť dáta. Error: " . $exception->getMessage();
        }

        return $insert;
    }

    public function deleteTeamMember(int $id): bool
    {
        $delete = false;
        $sql = "DELETE FROM team WHERE id = ". $id;

        try {
            $statment = $this->connection->prepare($sql);
            $delete = $statment->execute();
        } catch(\Exception $exception) {
            echo "Nepodarilo sa vymazať dáta. Error: " . $exception->getMessage();
        }

        return $delete;
    }

    public function getTeamMember(int $id): array
    {
        try {
            $sql = "SELECT * FROM team WHERE id = " . $id;
            $query = $this->connection->query($sql);
            $data = $query->fetch(\PDO::FETCH_ASSOC);

        } catch (\Exception $exception){
            echo "Error: " . $exception->getMessage();
        }

        return $data;
    }

    public function updateTeamMember(int $id, string $meno, string $priezvisko, string $pozicia): bool
    {
        try {
            $sql = "UPDATE team SET meno = :meno, priezvisko = :priezvisko, pozicia = :pozicia WHERE id = :id";
            $statement = $this->connection->prepare($sql);
            $update = $statement->execute([
                'meno' => $meno,
                'priezvisko' => $priezvisko,
                'pozicia' => $pozicia,
                'id' => $id,
            ]);
        } catch (\Exception $exception) {
            $update = false;
        }

        return $update;
    }

    public function getProjects(): array
    {
        try{
            $sql = "SELECT * FROM projects";
            $query = $this->connection->query($sql);
            $projects = $query->fetchAll(PDO::FETCH_ASSOC);

        } catch(\Exception $exception) {
            $projects = [0=>['id'=>1,'partner'=>'Exploria','popis'=>'Pre spoločnosť Exploria sme vytvorili praktický web navrhnutý na mieru, postavený na CMS WordPress. Dôraz sme kládli najmä na rýchlosť webu, jeho optimalizáciu a jednoduchosť navigácie pre čítateľa z pohľadu UX.','sluzba'=>'seo'],
                1=>['id'=>2,'partner'=>'Ata Green','popis'=>'Pre spoločnosť ATA Green sme vytvorili praktický web navrhnutý na mieru, postavený na CMS WordPress. Súčasťou webu je interaktívna kalkulačka návratnosti vstupnej investície, ktorú sme pripravili na mieru podľa dát od klienta.','sluzba'=>'seo'],
                2=>['id'=>3,'partner'=>'Sunland','popis'=>'Náš klient SunLand Group sa už niekoľko rokov venuje montáži solárnych systémov u nás aj v zahraničí. Postarali sme sa o nastavenie platenej PPC reklamy v prostredí Google, ktorá zabezpečuje relevantnú návštevnosť a získavanie dopytov.','sluzba'=>'ppc']
            ];
        }
        return $projects;
    }

    public function printProjects(array $projects)
    {
        foreach($projects as $key => $item){
            echo '<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 all '.$item['sluzba'].'">
                          <div class="item">
                            <div class="overflow-wrap: text-break">
                              <p>'.$item['popis'].'</p>
                            </div>
                            <h6 class="mt-2">'.$item['partner'].'</h6>
                          </div>
                        </div>'
            ;
        }
    }

    public function insertProject(string $partner, string $popis, string $sluzba) : bool
    {
        $insert = false;
        $sql = "INSERT INTO projects(partner,popis,sluzba) VALUES ('".$partner."','".$popis."','".$sluzba."')";

        try {
            $statement = $this->connection->prepare($sql);
            $insert = $statement->execute();
        } catch (\Exception $exception) {
            echo "Nebolo možné vložiť dáta. Error: " . $exception->getMessage();
        }

        return $insert;
    }

    public function deleteProject(int $id): bool
    {
        $delete = false;
        $sql = "DELETE FROM projects WHERE id = ". $id;

        try {
            $statment = $this->connection->prepare($sql);
            $delete = $statment->execute();
        } catch(\Exception $exception) {
            echo "Nepodarilo sa vymazať dáta. Error: " . $exception->getMessage();
        }

        return $delete;
    }

    public function getProject(int $id): array
    {
        try {
            $sql = "SELECT * FROM projects WHERE id = " . $id;
            $query = $this->connection->query($sql);
            $data = $query->fetch(\PDO::FETCH_ASSOC);

        } catch (\Exception $exception){
            echo "Error: " . $exception->getMessage();
        }

        return $data;
    }

    public function updateProject(int $id, string $partner, string $popis, string $sluzba): bool
    {
        try {
            $sql = "UPDATE projects SET partner = :partner, popis = :popis, sluzba = :sluzba WHERE id = :id";
            $statement = $this->connection->prepare($sql);
            $update = $statement->execute([
                'partner' => $partner,
                'popis' => $popis,
                'sluzba' => $sluzba,
                'id' => $id,
            ]);
        } catch (\Exception $exception) {
            $update = false;
        }

        return $update;
    }

    public function getBanner(): array
    {
        try{
            $sql = "SELECT * FROM banner";
            $query = $this->connection->query($sql);
            $banner = $query->fetchAll(PDO::FETCH_ASSOC);

        } catch(\Exception $exception) {
            $banner = [0=>['id'=>1,'popis1'=>'Vitajte na našej stránke','popis2'=>'Efektívny digitálny marketing'],
                1=>['id'=>2,'popis1'=>'Komplexný a analytický','popis2'=>'Najlepší Digitálny Marketing']
            ];
        }
        return $banner;
    }

    public function printBanner(array $banner)
    {
        foreach($banner as $key => $item){
            echo '<div class="item">
            <div class="img-fill">
                <img src="assets/images/slide-0'.$item['id'].'.jpg" alt="">
                <div class="text-content">
                    <h3>'.$item['popis1'].'</h3>
                    <h5>'.$item['popis2'].'</h5>
                    <a href="#features" class="main-stroked-button">Prečítajte si viac</a>
                    <a href="#contact-us" class="main-filled-button">Kontaktujte nás</a>
                </div>
            </div>
        </div>'
            ;
        }
    }

    public function insertBannerItem(int $id, string $popis1, string $popis2) : bool
    {
        $insert = false;
        $sql = "INSERT INTO banner(id,popis1,popis2) VALUES ('".$id."','".$popis1."','".$popis2."')";

        try {
            $statement = $this->connection->prepare($sql);
            $insert = $statement->execute();
        } catch (\Exception $exception) {
            echo "Nebolo možné vložiť dáta. Error: " . $exception->getMessage();
        }

        return $insert;
    }

    public function deleteBannerItem(int $id): bool
    {
        $delete = false;
        $sql = "DELETE FROM banner WHERE id = ". $id;

        try {
            $statment = $this->connection->prepare($sql);
            $delete = $statment->execute();
        } catch(\Exception $exception) {
            echo "Nepodarilo sa vymazať dáta. Error: " . $exception->getMessage();
        }

        return $delete;
    }

    public function getBannerItem(int $id): array
    {
        try {
            $sql = "SELECT * FROM banner WHERE id = " . $id;
            $query = $this->connection->query($sql);
            $data = $query->fetch(\PDO::FETCH_ASSOC);

        } catch (\Exception $exception){
            echo "Error: " . $exception->getMessage();
        }

        return $data;
    }

    public function updateBannerItem(int $id, string $popis1, string $popis2): bool
    {
        try {
            $sql = "UPDATE banner SET popis1 = :popis1, popis2 = :popis2 WHERE id = :id";
            $statement = $this->connection->prepare($sql);
            $update = $statement->execute([
                'popis1' => $popis1,
                'popis2' => $popis2,
                'id' => $id,
            ]);
        } catch (\Exception $exception) {
            $update = false;
        }

        return $update;
    }

    public function insertMail(string $mail) : bool
    {
        $insert = false;
        $sql = "INSERT INTO newsletter(mail) VALUES ('".$mail."')";

        try {
            $statement = $this->connection->prepare($sql);
            $insert = $statement->execute();
        } catch (\Exception $exception) {
            echo "Nebolo možné vložiť dáta. Error: " . $exception->getMessage();
        }

        return $insert;
    }

    public function insertContact(string $meno, string $telefon, string $email, string $predmet, string $sprava) : bool
    {
        $insert = false;
        $sql = "INSERT INTO contact(meno, telefon, email, predmet, sprava) VALUES ('".$meno."','".$telefon."','".$email."','".$predmet."','".$sprava."')";

        try {
            $statement = $this->connection->prepare($sql);
            $insert = $statement->execute();
        } catch (\Exception $exception) {
            echo "Nebolo možné vložiť dáta. Error: " . $exception->getMessage();
        }

        return $insert;
    }
}