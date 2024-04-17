<?php

class UserManager{

    
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo= $pdo;
    }

    public function suscribe(string $email,string $nom, string $prenom, string $departement, string $motdepasse){
        $statement= $this->pdo->prepare('INSERT INTO clients (id, email, nom, prenom, departement, motdepasse) VALUES (UUID(), :email, :nom, :prenom, :departement, :motdepasse)');
        $statement->bindValue(':email', $email, PDO::PARAM_STR);
        $statement->bindValue(':nom', $nom, PDO::PARAM_STR);
        $statement->bindValue(':prenom', $prenom, PDO::PARAM_STR);
        $statement->bindValue(':departement', $departement, PDO::PARAM_STR);
        if(strlen($motdepasse) > 7){
            $statement->bindValue(':motdepasse', password_hash($motdepasse, PASSWORD_BCRYPT),PDO::PARAM_STR);
        }else{
            echo "Votre mot de passe n\'est pas assez long";
        }
        
        return $statement->execute();

    }
    
    public function connect(string $email, string $motdepasse): Clients{
        require_once "clients.php";
        
        $statement = $this->pdo->prepare('SELECT * FROM clients WHERE email = :email');
        $statement->setFetchMode(PDO::FETCH_CLASS, 'Clients');
        $statement->bindValue(':email', $email);
        if($statement->execute()){
            $clients = $statement->fetch();
                if($clients !== false && password_verify($motdepasse, $clients->getMotDePasse())){
                    if (in_array($user->getDepartment(), ['75', '94', '92', '93'])) {
                    $user->addRole('ROLE_DELIVERABLE');
                }
                    return $clients;
                }
        }

        throw new Exception('Identifiants invalides');

    }

}

