<?php
include_once '../../Modelo/Conexion.php';
include_once '../../Modelo/Persona.php';
class ControladorPersona{
    private $Conexion;
    function __construct(){
        $this->Conexion=new Conexion();
        $this->Conexion->getConexion()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    function Read(){
        $Resultado=[];
        try{
            $SQL="select * from persona";
            $ps=$this->Conexion->getConexion()->prepare($SQL);
            $ps->execute(NULL);
            $Resultado=[];
            while($Row=$ps->fetch(PDO::FETCH_OBJ)){
                $Persona=new Persona(
                    $Row->per_tipo_doc, 
                    $Row->per_id, 
                    $Row->per_nombres, 
                    $Row->per_apellidos, 
                    $Row->per_email,
                    $Row->per_edad, 
                    $Row->per_altura, 
                    $Row->per_peso, 
                    $Row->per_imc
                );
                array_push($Resultado,$Persona);
            }
            $this->Conexion=null;
        }catch(PDOException $E){
            echo "Fallo la conexion".$E->getMessage();
        }
        return $Resultado;
    }
    function Create($Persona){
        try{
            $SQL="insert into persona values(?,?,?,?,?,?,?,?,?)";
            $ps=$this->Conexion->getConexion()->prepare($SQL);
            $ps->execute(array(
                $Persona->getPerTipoDoc(),
                $Persona->getPerId(),
                $Persona->getPerNombres(),
                $Persona->getPerApellidos(),
                $Persona->getPerEmail(),
                $Persona->getPerEdad(),
                $Persona->getPerAltura(),
                $Persona->getPerPeso(),
                $Persona->getPerIMC(),
            )   );
            if(!$ps->rowCount()>0){
                echo"Error no se insertaron los datos";
            }else{
                echo"Se insertaron los datos correctamente";
            }         
            $this->Conexion=null;
        }catch(PDOException $E){
            echo "Fallo la conexion".$E->getMessage();
        }
    }
}
?>