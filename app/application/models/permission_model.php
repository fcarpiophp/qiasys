<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of permission_model
 *
 * @author Francisco
 */
class permission_model extends CI_Model {

    /**
     *
     * @var string
     */
    private $permission;

    /**
     *
     * @var string
     */
    private $permission_name;

    /**
     *
     * @var bool
     */
    private $ironMan;

    /**
     *
     * @var bool
     */
    private $admin;

    /**
     *
     * @var bool
     */
    private $inventory;

    /**
     *
     * @var bool
     */
    private $proposal;

    /**
     *
     * @var bool
     */
    private $purchase;

    /**
     *
     * @var bool
     */
    private $receive;

    /**
     *
     * @var bool
     */
    private $search;

    /**
     *
     * @var bool
     */
    private $user;

    /**
     *
     * @var bool 
     */
    private $report;

    /**
     *
     * @var bool
     */
    private $sell;

    /**
     * 
     * @return bool
     */
    public function getSell() {
        return $this->sell;
    }

    /**
     * 
     * @param bool $sell
     */
    public function setSell($sell) {
        $this->sell = $sell;
    }

    /**
     * 
     * @return string
     */
    public function get_permission() {
        return $this->permission;
    }

    /**
     * 
     * @param string $permission
     */
    public function set_permission($permission) {
        $this->permission = $permission;
    }

    /**
     *
     * @var string
     */
    public function get_permission_name() {
        return $this->permission_name;
    }

    /**
     * 
     * @param string $permission_name
     */
    public function set_permission_name($permission_name) {
        $this->permission_name = $permission_name;
    }

    /**
     * 
     * @return bool
     */
    public function getIronMan() {
        return $this->ironMan;
    }

    /**
     *
     * @var bool
     */
    public function getAdmin() {
        return $this->admin;
    }

    /**
     *
     * @var bool
     */
    public function getInventory() {
        return $this->inventory;
    }

    /**
     *
     * @var bool
     */
    public function getProposal() {
        return $this->proposal;
    }

    /**
     *
     * @var bool
     */
    public function getPurchase() {
        return $this->purchase;
    }

    /**
     *
     * @var bool
     */
    public function getReceive() {
        return $this->receive;
    }

    /**
     *
     * @var bool
     */
    public function getSearch() {
        return $this->search;
    }

    /**
     *
     * @var bool
     */
    public function getUser() {
        return $this->user;
    }

    /**
     *
     * @var bool
     */
    public function getReport() {
        return $this->report;
    }

    /**
     * 
     * @param bool $ironMan
     */
    public function setIronMan($ironMan) {
        $this->ironMan = $ironMan;
    }

    /**
     * 
     * @param bool $admin
     */
    public function setAdmin($admin) {
        $this->admin = $admin;
    }

    /**
     * 
     * @param bool $inventory
     */
    public function setInventory($inventory) {
        $this->inventory = $inventory;
    }

    /**
     * 
     * @param bool $proposal
     */
    public function setProposal($proposal) {
        $this->proposal = $proposal;
    }

    /**
     * 
     * @param bool $purchase
     */
    public function setPurchase($purchase) {
        $this->purchase = $purchase;
    }

    /**
     * 
     * @param bool $receive
     */
    public function setReceive($receive) {
        $this->receive = $receive;
    }

    /**
     * 
     * @param bool $search
     */
    public function setSearch($search) {
        $this->search = $search;
    }

    /**
     * 
     * @param bool $users
     */
    public function setUser($user) {
        $this->user = $user;
    }

    /**
     * 
     * @param bool $report
     */
    public function setReport($report) {
        $this->report = $report;
    }

    /**
     * 
     * @return array
     * @throws Exception
     */
    public function get_all_permissions() {

        $query = "
            SELECT permission, permission_name
            FROM permissions
            WHERE user_id = 0
            AND user_client_id = 0
            ORDER BY permission_name ASC
        ";

        $result = $this->db->query($query);
        $permission_list = array();

        if (!$result) {
            // if query returns null
            $message = "Query failed in permission_model/get_all_permissions";
            throw new Exception($message);
        } else {

            foreach ($result->result() as $row) {

                $permission = new permission_model();

                $permission->set_permission($row->permission);
                $permission->set_permission_name($row->permission_name);

                $permission_list[] = $permission;
            }
        }

        return $permission_list;
    }

    /**
     * 
     * @return \permission_model
     * @throws Exception
     */
    public function getUserPermissions() {

        $query = "
            SELECT permission
            FROM permissions
            WHERE user_id = ?
            AND user_client_id = ?
        ";

        $result = $this->db->query(
            $query, array(
            $this->session->userdata('user_name'),
            $this->session->userdata('user_client_id')
            )
        );

        if (!$result) {
            // if query returns null
            $message = "Query failed in permission_model/getUserPermissions()";
            throw new Exception($message);
        } else {

            $permission = new permission_model();

            foreach ($result->result() as $row) {

                if ($row->permission == 'ironMan')
                    $permission->setIronMan(true);
                if ($row->permission == 'admin')
                    $permission->setAdmin(true);
                if ($row->permission == 'inventory')
                    $permission->setInventory(true);
                if ($row->permission == 'proposal')
                    $permission->setProposal(true);
                if ($row->permission == 'purchase')
                    $permission->setPurchase(true);
                if ($row->permission == 'receive')
                    $permission->setReceive(true);
                if ($row->permission == 'search')
                    $permission->setSearch(true);
                if ($row->permission == 'user')
                    $permission->setUser(true);
                if ($row->permission == 'report')
                    $permission->setReport(true);
                if ($row->permission == 'sell')
                    $permission->setSell(true);
            }
        }

        return $permission;
    }
    
    public function checkPermissions(array $rights) {
        
        $permissions = '(';
        
        foreach ($rights as $permission) {
            $permissions .= "'".$permission."',";
        }
        
        $permissions .= ")";
        $permissions = str_replace(",)", ")", $permissions);
        
        $query = "
            SELECT count(permission) as permissions
            FROM permissions
            WHERE user_id = ?
            AND user_client_id = ?
            AND permission in $permissions
        ";

        $result = $this->db->query(
            $query, array(
                $this->session->userdata('user_name'),
                $this->session->userdata('user_client_id')
            )
        );

        if (!$result) {
            // if query returns null
            $message = "Query failed in permission_model/checkPermissions()";
            throw new Exception($message);
        } 
        
        foreach ($result->result() as $row) {
            $count = $row->permissions;
        }
        
        return $count;
    }

}

?>
