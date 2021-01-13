<?php



class Couriers
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllCouriers(){
        $this->db->query('Select * from couriers');
        return $this->db->resultSet();
    }
    public function addCourier($name,$phone,$status){
        $this->db->query('Insert into couriers (CourierName, Phone, CourierStatus) value (:nume,:phone,:status)');
        $this->db->bind('nume',$name);
        $this->db->bind('phone',$phone);
        $this->db->bind('status',$status);
        $this->db->execute();
    }
    public function deleteCourier($id){
        $this->db->query('delete from couriers where CourierID=:id');
        $this->db->bind('id',$id);
        $this->db->execute();
    }
    public function changeCourierData($cid,$nume,$phone,$status){
        $this->db->query('update couriers set CourierName=:nume,Phone=:phone,CourierStatus=:status where CourierID=:cid');
        $this->db->bind('cid',$cid);
        $this->db->bind('nume', $nume);
        $this->db->bind('phone', $phone);
        $this->db->bind('status', $status);
        $this->db->execute();
    }

}
