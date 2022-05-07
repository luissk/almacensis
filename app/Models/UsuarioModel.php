<?php 
namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model{
    

    public function validaUsuario($usuario){
        $query = "select * from usuario where usuario='".$usuario."' and status=1";
        $st = $this->db->query($query);

        return $st->getRowArray();
    }

    public function tiposDeUsuario(){
        $query = "select * from tipousuario where status=1";
        $st = $this->db->query($query);

        return $st->getResultArray();
    }

    public function listarUsuarios(){
        $query = "select usu.idusuario,usu.usuario,usu.nombres,usu.dni,usu.status,usu.idtipousu,tus.tipo
        from usuario usu 
        inner join tipousuario tus on usu.idtipousu=tus.idtipousu";
        $st = $this->db->query($query);

        return $st->getResultArray();
    }

    public function updateStatusUsuario($idusuario, $estado){
        $query = "update usuario set status=$estado where idusuario=$idusuario and idtipousu != 1";
        $st = $this->db->query($query);

        return $st;
    }

    public function getUsuario($idusuario){
        $query = "select usu.idusuario,usu.usuario,usu.password,usu.nombres,usu.dni,usu.status,usu.idtipousu,tus.tipo
        from usuario usu 
        inner join tipousuario tus on usu.idtipousu=tus.idtipousu 
        where usu.idusuario=$idusuario";
        $st = $this->db->query($query);

        return $st->getRowArray();
    }

    public function existeUsuarioUsu($usuario){
        $query = "select count(idusuario) total from usuario where usuario='".$usuario."'";
        $st = $this->db->query($query);

        return $st->getRowArray();
    }

    public function insertUsuario($usuario,$password,$nombres,$dni,$tusuario){
        $query = "insert into usuario(usuario,password,nombres,dni,status,idtipousu) values('".$usuario."','".$password."','".$nombres."','".$dni."',1,$tusuario)";
        $st = $this->db->query($query);

        return $this->db->insertID();
    }

    public function updateUsuario($usuario,$password,$nombres,$dni,$idusuario,$tusuario){
        $query = "update usuario set usuario='".$usuario."', password='".$password."', nombres='".$nombres."', dni='".$dni."',idtipousu=$tusuario where idusuario=$idusuario";
        $st = $this->db->query($query);

        return $st;
    }
}