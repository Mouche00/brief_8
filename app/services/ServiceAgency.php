<?php

class ServiceAgency implements IServiceAgency
{
    private $db;

	public function __construct(Database $db){
		$this->db = $db;
	}

    public function create(Agency $agency)
    {
        // Implement the method here
        $adrId = $agency->address->adrId;
        $ville = $agency->address->ville;
        $quartier = $agency->address->quartier;
        $rue = $agency->address->rue;
        $codePostal = $agency->address->codePostal;
        $email = $agency->address->email;
        $phone = $agency->address->phone;

        try{
            $this->db->query("INSERT INTO address VALUES (:adrId, :city, :district, :street, :postal_code, :email, :telephone)");
            $this->db->bind(":id", $adrId);
            $this->db->bind(":city", $ville);
            $this->db->bind(":district", $quartier);
            $this->db->bind(":street", $rue);
            $this->db->bind(":postal_code", $codePostal);
            $this->db->bind(":email", $email);
            $this->db->bind(":telephone", $phone);
            $this->db->execute();

            $this->db->query("  INSERT INTO agency (agencyId, longitude, latitude, bankId, adrId) VALUES (:agencyId, :longitude,:latitude,:bankId,:adrId);");
            $this->db->bind(":agencyId", $agency->agencyId);
            $this->db->bind(":longitude", $agency->longitude);
            $this->db->bind(":latitude", $agency->latitude);
            $this->db->bind(":bankId", $agency->bankId);
            $this->db->bind(":adrId", $adrId);
            $this->db->execute();

        } catch(Exception $e){
            die("Error" . $e->getMessage());
        }
    }

    public function update(Agency $agency)
    {
        // Implement the method here
        $adrId = $agency->address->adrId;
        $ville = $agency->address->ville;
        $quartier = $agency->address->quartier;
        $rue = $agency->address->rue;
        $codePostal = $agency->address->codePostal;
        $email = $agency->address->email;
        $phone = $agency->address->phone;

        
        try{
            $this->db->query("UPDATE address SET ville = :ville, quartier = :quartier, rue = :rue, codePostal = :codePostal, email = :email, phone = :phone WHERE adrId = :adrId");
            $this->db->bind(":id", $adrId);
            $this->db->bind(":city", $ville);
            $this->db->bind(":district", $quartier);
            $this->db->bind(":street", $rue);
            $this->db->bind(":postal_code", $codePostal);
            $this->db->bind(":email", $email);
            $this->db->bind(":telephone", $phone);
            $this->db->execute();
    
            $this->db->query("UPDATE agency SET longitude = :longitude, latitude = :latitude, bankId = :bankId, adrId = :adrId WHERE agencyId = :agencyId;");
            $this->db->bind(":agencyId", $agency->agencyId);
            $this->db->bind(":longitude", $agency->longitude);
            $this->db->bind(":latitude", $agency->latitude);
            $this->db->bind(":bankId", $agency->bankId);
            $this->db->bind(":adrId", $adrId);
            $this->db->execute();

        } catch(Exception $e){
            die("Error: " . $e->getMessage());
        }
    }

    public function read()
    {
        // Implement the method here
        try{
            $this->db->query('SELECT 
            agency.agencyId,
            agency.longitude,
            agency.latitude,
            bank.name
            FROM agency
            JOIN bank ON agency.bankId = bank.bankId;');
            // $data_agence=$query->fetchAll(PDO::FETCH_OBJ);
            $data = $this->db->resultSet();
        } catch(Exception $e){
            die("Error: " . $e->getMessage());
        }

    }

    public function delete($agencyId)
    {
        // Implement the method here
        try{
            $this->db->query("DELETE FROM agency WHERE agencyId = :agencyId ");
            $this->db->bind(":agencyId",$agencyId);
            $this->db->execute();
        } catch(Exception $e){
            die("Error: " . $e->getMessage());
        }
    }
}

?>