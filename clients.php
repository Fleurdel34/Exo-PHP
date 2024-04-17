<?php
class Clients{
    private string $id;
    private string $email;
    private string $nom;
    private string $prenom;
    private string $departement;
    private string $motdepasse;
    private array $roles= [];

    public function getId():string{
        return $this->id;
    }

    public function getMotDePasse():string{
        return $this->motdepasse;
    }

    public function getDepartement():string{
        return $this->departement;
    }

    public function sayHello(): string{
        return "Bonjour ". $this->prenom. ' '.$this->nom.PHP_EOL;
    }

    public function addRole(string $role) : void{
        $this->roles[] = $role;
    } 

    public function getRoles():array{
        return $this->roles;
    }

}