<?php if (!defined('ROOT')) exit('No direct script access allowed');

class m_ampu extends C_Model
{
    function gets($idDosen = 0)
    {
        $sql = "SELECT mm.*, dt.id_dosen_teachs,
            case 
                when dt.id_dosen_teachs is not null then true
                else false 
            end status
            from ms_matkul mm 
            left join dosen_teachs dt on dt.id_matkul = mm.id_matkul and id_dosen = $idDosen";

        $res = $this->db->query($sql);
        return $this->db_results($res);
    }

    function get($idTeach = 0)
    {
        $sql = "SELECT * FROM v_ampu WHERE id_dosen_teachs = $idTeach";
        return $this->db->query($sql)->fetch_object();
    }

    function add($data)
    {
        return $this->db_insert('dosen_teachs', $data);
    }

    function update($data, $where)
    {
        return $this->db_update('dosen_teachs', $data, $where);
    }

    function delete($id)
    {
        $sql = "DELETE FROM dosen_teachs WHERE id_dosen_teachs = $id";
        return $this->db->query($sql);
    }

    function getMyAmpu($id_dosen)
    {
        $sql = "SELECT * FROM v_ampu WHERE id_dosen = $id_dosen";
        $res = $this->db->query($sql);
        return $this->db_results($res);
    }

    function getMaxID(){
        $sql = "SELECT max(id_dosen_teachs) c_id FROM dosen_teachs";
        return $this->db->query($sql)->fetch_object()->c_id;
    }
}
