<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of client_information_model
 *
 * @author Francisco
 */
class client_model extends CI_Model {

    /**
     * @var
     */
    private $id;

    /**
     * @var
     */
    private $client_name;

    /**
     * @var
     */
    private $client_add_1;

    /**
     * @var
     */
    private $client_add_2;

    /**
     * @var
     */
    private $client_city;

    /**
     * @var
     */
    private $client_state;

    /**
     * @var
     */
    private $client_zip;

    /**
     * @var
     */
    private $client_phone;

    /**
     * @var
     */
    private $client_fax;

    /**
     * @var
     */
    private $client_email;

    /**
     * @var
     */
    private $client_contact;

    /**
     * @var
     */
    private $client_logo_image;

    /**
     * @var
     */
    private $billto_id;

    /**
     * @var
     */
    private $billto_clients_id;

    /**
     * @var
     */
    private $billto_client_name;

    /**
     * @var
     */
    private $billto_client_add_1;

    /**
     * @var
     */
    private $billto_client_add_2;

    /**
     * @var
     */
    private $billto_client_city;

    /**
     * @var
     */
    private $billto_client_state;

    /**
     * @var
     */
    private $billto_client_zip;

    /**
     * @var
     */
    private $billto_client_phone;

    /**
     * @var
     */
    private $billto_client_fax;

    /**
     * @var
     */
    private $billto_client_email;

    /**
     * @var
     */
    private $billto_client_contact;

    /**
     * @return mixed
     */
    public function get_id() {
        return $this->id;
    }

    /**
     * @param $id
     */
    public function set_id($id) {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function get_client_name() {
        return $this->client_name;
    }

    /**
     * @param $client_name
     */
    public function set_client_name($client_name) {
        $this->client_name = $client_name;
    }

    /**
     * @return mixed
     */
    public function get_client_add_1() {
        return $this->client_add_1;
    }

    /**
     * @param $client_add_1
     */
    public function set_client_add_1($client_add_1) {
        $this->client_add_1 = $client_add_1;
    }

    /**
     * @return mixed
     */
    public function get_client_add_2() {
        return $this->client_add_2;
    }

    /**
     * @param $client_add_2
     */
    public function set_client_add_2($client_add_2) {
        $this->client_add_2 = $client_add_2;
    }

    /**
     * @return mixed
     */
    public function get_client_city() {
        return $this->client_city;
    }

    /**
     * @param $client_city
     */
    public function set_client_city($client_city) {
        $this->client_city = $client_city;
    }

    /**
     * @return mixed
     */
    public function get_client_state() {
        return $this->client_state;
    }

    /**
     * @param $client_state
     */
    public function set_client_state($client_state) {
        $this->client_state = $client_state;
    }

    /**
     * @return mixed
     */
    public function get_client_zip() {
        return $this->client_zip;
    }

    /**
     * @param $client_zip
     */
    public function set_client_zip($client_zip) {
        $this->client_zip = $client_zip;
    }

    /**
     * @return mixed
     */
    public function get_client_phone() {
        return $this->client_phone;
    }

    /**
     * @param $client_phone
     */
    public function set_client_phone($client_phone) {
        $this->client_phone = $client_phone;
    }

    /**
     * @return mixed
     */
    public function get_client_fax() {
        return $this->client_fax;
    }

    /**
     * @param $client_fax
     */
    public function set_client_fax($client_fax) {
        $this->client_fax = $client_fax;
    }

    /**
     * @return mixed
     */
    public function get_client_email() {
        return $this->client_email;
    }

    /**
     * @param $client_email
     */
    public function set_client_email($client_email) {
        $this->client_email = $client_email;
    }

    /**
     * @return mixed
     */
    public function get_client_contact() {
        return $this->client_contact;
    }

    /**
     * @param $client_contact
     */
    public function set_client_contact($client_contact) {
        $this->client_contact = $client_contact;
    }

    /**
     * @return mixed
     */
    public function get_client_logo_image() {
        return $this->client_logo_image;
    }

    /**
     * @param $client_logo_image
     */
    public function set_client_logo_image($client_logo_image) {
        $this->client_logo_image = $client_logo_image;
    }

    /**
     * @param $billto_clients_id
     */
    public function set_billto_clients_id($billto_clients_id) {
        $this->billto_clients_id = $billto_clients_id;
    }

    /**
     * @return mixed
     */
    public function get_billto_clients_id() {
        return $this->billto_clients_id;
    }

    /**
     * @param $billto_id
     */
    public function set_billto_id($billto_id) {
        $this->billto_id = $billto_id;
    }

    /**
     * @return mixed
     */
    public function get_billto_id() {
        return $this->billto_id;
    }

    /**
     * @return mixed
     */
    public function get_billto_client_name() {
        return $this->billto_client_name;
    }

    /**
     * @param $billto_client_name
     */
    public function set_billto_client_name($billto_client_name) {
        $this->billto_client_name = $billto_client_name;
    }

    /**
     * @return mixed
     */
    public function get_billto_client_add_1() {
        return $this->billto_client_add_1;
    }

    /**
     * @param $billto_client_add_1
     */
    public function set_billto_client_add_1($billto_client_add_1) {
        $this->billto_client_add_1 = $billto_client_add_1;
    }

    /**
     * @return mixed
     */
    public function get_billto_client_add_2() {
        return $this->billto_client_add_2;
    }

    /**
     * @param $billto_client_add_2
     */
    public function set_billto_client_add_2($billto_client_add_2) {
        $this->billto_client_add_2 = $billto_client_add_2;
    }

    /**
     * @return mixed
     */
    public function get_billto_client_city() {
        return $this->billto_client_city;
    }

    /**
     * @param $billto_client_city
     */
    public function set_billto_client_city($billto_client_city) {
        $this->billto_client_city = $billto_client_city;
    }

    /**
     * @return mixed
     */
    public function get_billto_client_state() {
        return $this->billto_client_state;
    }

    /**
     * @param $billto_client_state
     */
    public function set_billto_client_state($billto_client_state) {
        $this->billto_client_state = $billto_client_state;
    }

    /**
     * @return mixed
     */
    public function get_billto_client_zip() {
        return $this->billto_client_zip;
    }

    /**
     * @param $billto_client_zip
     */
    public function set_billto_client_zip($billto_client_zip) {
        $this->billto_client_zip = $billto_client_zip;
    }

    /**
     * @return mixed
     */
    public function get_billto_client_phone() {
        return $this->billto_client_phone;
    }

    /**
     * @param $billto_client_phone
     */
    public function set_billto_client_phone($billto_client_phone) {
        $this->billto_client_phone = $billto_client_phone;
    }

    /**
     * @return mixed
     */
    public function get_billto_client_fax() {
        return $this->billto_client_fax;
    }

    /**
     * @param $billto_client_fax
     */
    public function set_billto_client_fax($billto_client_fax) {
        $this->billto_client_fax = $billto_client_fax;
    }

    /**
     * @return mixed
     */
    public function get_billto_client_email() {
        return $this->billto_client_email;
    }

    /**
     * @param $billto_client_email
     */
    public function set_billto_client_email($billto_client_email) {
        $this->billto_client_email = $billto_client_email;
    }

    /**
     * @return mixed
     */
    public function get_billto_client_contact() {
        return $this->billto_client_contact;
    }

    /**
     * @param $billto_client_contact
     */
    public function set_billto_client_contact($billto_client_contact) {
        $this->billto_client_contact = $billto_client_contact;
    }

    /**
     *
     * @return \client_model
     * @throws Exception
     */
    public function get_client_information() {
        $query = "
            SELECT 
                clients.id,
                clients.client_name,
                clients.client_add_1,
                clients.client_add_2,
                clients.client_city,
                clients.client_state,
                clients.client_zip,
                clients.client_phone,
                clients.client_fax,
                clients.client_email,
                clients.client_contact,
                clients.client_logo_image,
                clients_billto.clients_id as billto_clients_id,
                clients_billto.client_name as billto_client_name,
                clients_billto.client_add_1 as billto_client_add_1,
                clients_billto.client_add_2 as billto_client_add_2,
                clients_billto.client_city as billto_client_city,
                clients_billto.client_state as billto_client_state,
                clients_billto.client_zip as billto_client_zip,
                clients_billto.client_phone as billto_client_phone,
                clients_billto.client_fax as billto_client_fax,
                clients_billto.client_email as billto_client_email,
                clients_billto.client_contact as billto_client_contact
            FROM 
                clients
            LEFT JOIN
                clients_billto on clients.id = clients_billto.clients_id
            where clients.id = ?
        ";

        $result = $this->db->query(
            $query, array(
            $this->session->userdata('user_client_id')
            )
        );

        if (!$result) {
            // if query returns null
            $message = "Query failed in client_model/get_client_information";
            throw new Exception($message);
        } else {

            $client = new client_model();

            foreach ($result->result() as $row) {

                $client->set_id($row->id);
                $client->set_client_name($row->client_name);
                $client->set_client_add_1($row->client_add_1);
                $client->set_client_add_2($row->client_add_2);
                $client->set_client_city($row->client_city);
                $client->set_client_state($row->client_state);
                $client->set_client_zip($row->client_zip);
                $client->set_client_phone($row->client_phone);
                $client->set_client_fax($row->client_fax);
                $client->set_client_email($row->client_email);
                $client->set_client_contact($row->client_contact);
                $client->set_client_logo_image($row->client_logo_image);
                $client->set_billto_clients_id($row->billto_clients_id);
                $client->set_billto_client_name($row->billto_client_name);
                $client->set_billto_client_add_1($row->billto_client_add_1);
                $client->set_billto_client_add_2($row->billto_client_add_2);
                $client->set_billto_client_city($row->billto_client_city);
                $client->set_billto_client_state($row->billto_client_state);
                $client->set_billto_client_zip($row->billto_client_zip);
                $client->set_billto_client_phone($row->billto_client_phone);
                $client->set_billto_client_fax($row->billto_client_fax);
                $client->set_billto_client_email($row->billto_client_email);
                $client->set_billto_client_contact($row->billto_client_contact);
            }
        }

        return $client;
    }

    public function get_client(array $part = array()) {
        $query = "
            SELECT 
                clients.id,
                clients.client_name,
                clients.client_add_1,
                clients.client_add_2,
                clients.client_city,
                clients.client_state,
                clients.client_zip,
                clients.client_phone,
                clients.client_fax,
                clients.client_email,
                clients.client_contact,
                clients.client_logo_image,
		
		clients_billto.id as billto_client_id,
                clients_billto.clients_id as billto_clients_id,
                clients_billto.client_name as billto_client_name,
                clients_billto.client_add_1 as billto_client_add_1,
                clients_billto.client_add_2 as billto_client_add_2,
                clients_billto.client_city as billto_client_city,
                clients_billto.client_state as billto_client_state,
                clients_billto.client_zip as billto_client_zip,
                clients_billto.client_phone as billto_client_phone,
                clients_billto.client_fax as billto_client_fax,
                clients_billto.client_email as billto_client_email,
                clients_billto.client_contact as billto_client_contact,
		
		clients_shipto.clients_id as shipto_clients_id,
                clients_shipto.client_name as shipto_client_name,
                clients_shipto.client_add_1 as shipto_client_add_1,
                clients_shipto.client_add_2 as shipto_client_add_2,
                clients_shipto.client_city as shipto_client_city,
                clients_shipto.client_state as shipto_client_state,
                clients_shipto.client_zip as shipto_client_zip,
                clients_shipto.client_phone as shipto_client_phone,
                clients_shipto.client_fax as shipto_client_fax,
                clients_shipto.client_email as shipto_client_email,
                clients_shipto.client_contact as shipto_client_contact
            FROM 
                clients
            LEFT JOIN
                clients_billto on clients.id = clients_billto.clients_id
	    LEFT JOIN
		clients_shipto on clients.id = clients_shipto.clients_id
            where clients.id = ?
        ";

        $result = $this->db->query(
            $query, array(
            $this->session->userdata('user_client_id')
            )
        );

        if (!$result) {
            // if query returns null
            $message = "Query failed in client_model/get_client_information";
            throw new Exception($message);
        } else {

            $client = array();

            foreach ($result->result() as $row) {

                $client['id'] = ($row->id);
                $client['client_name'] = ($row->client_name);
                $client['client_add_1'] = ($row->client_add_1);
                $client['client_add_2'] = ($row->client_add_2);
                $client['client_city'] = ($row->client_city);
                $client['client_state'] = ($row->client_state);
                $client['client_zip'] = ($row->client_zip);
                $client['client_phone'] = ($row->client_phone);
                $client['client_fax'] = ($row->client_fax);
                $client['client_email'] = ($row->client_email);
                $client['client_contact'] = ($row->client_contact);
                $client['client_logo_image'] = ($row->client_logo_image);

                $client['billto_client_id'] = ($row->billto_clients_id);
                $client['billto_client_name'] = ($row->billto_client_name);
                $client['billto_client_add_1'] = ($row->billto_client_add_1);
                $client['billto_client_add_2'] = ($row->billto_client_add_2);
                $client['billto_client_city'] = ($row->billto_client_city);
                $client['billto_client_state'] = ($row->billto_client_state);
                $client['billto_client_zip'] = ($row->billto_client_zip);
                $client['billto_client_phone'] = ($row->billto_client_phone);
                $client['billto_client_fax'] = ($row->billto_client_fax);
                $client['billto_client_email'] = ($row->billto_client_email);
                $client['billto_client_contact'] = ($row->billto_client_contact);

                $client['shipto_client_id'] = ($row->shipto_clients_id);
                $client['shipto_client_name'] = ($row->shipto_client_name);
                $client['shipto_client_add_1'] = ($row->shipto_client_add_1);
                $client['shipto_client_add_2'] = ($row->shipto_client_add_2);
                $client['shipto_client_city'] = ($row->shipto_client_city);
                $client['shipto_client_state'] = ($row->shipto_client_state);
                $client['shipto_client_zip'] = ($row->shipto_client_zip);
                $client['shipto_client_phone'] = ($row->shipto_client_phone);
                $client['shipto_client_fax'] = ($row->shipto_client_fax);
                $client['shipto_client_email'] = ($row->shipto_client_email);
                $client['shipto_client_contact'] = ($row->shipto_client_contact);
            }
        }

        $part['client'] = $client;

        return $part;
    }

    public function get_sites() {

        $query = "
            SELECT id, site_name FROM sites where client_id = ?
	";

        $result = $this->db->query($query, $this->session->userdata('user_client_id'));
        $site_list = array();

        if (!$result) {
            // if query returns null
            $message = "Query failed in client_model/get_sites";
            throw new Exception($message);
        } else {

            foreach ($result->result() as $row) {
                $site_list[] = array('id' => $row->id, 'site_name' => $row->site_name);
            }
        }

        return $site_list;
    }

}

?>
