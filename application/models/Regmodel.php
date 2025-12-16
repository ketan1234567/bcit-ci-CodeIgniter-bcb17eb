<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Regmodel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    // Get user with role
    public function getUserWithRole($username)
    {
        $this->db->select("users.*, roles.name as role");
        $this->db->from("users");
        $this->db->join("roles", "roles.id = users.role_id", "left");
        $this->db->where("users.username", $username);

        $query = $this->db->get();
        return $query->row(); // Returns single user object
    }

    // Optional: Create user for signup
    public function createUser($data)
    {
        return $this->db->insert("users", $data);
    }

    public function reg_data($data)
    {
        $this->db->insert("tbl_reg", $data);
        return $this->db->insert_id(); // ✅ return last inserted ID
    }

    public function store_image($data)
    {
        return $this->db->insert("tbl_image", $data);
    }

    public function check_mob_no($mob)
    {
        $query = $this->db
            ->select("*")
            ->where("contact", $mob)
            ->get("tbl_reg");
        return $query->row();
    }
    public function get_posts()
    {
        return $this->db->get("posts")->result_array();
    }

    public function get_post_by_slug($slug)
    {
        return $this->db
            ->where("slug", $slug)
            ->get("posts")
            ->row_array();
    }

    public function slug_exists($slug)
    {
        return $this->db->where("slug", $slug)->count_all_results("posts") > 0;
    }
    public function get_comments($post_id)
    {
        return $this->db
            ->where("post_id", $post_id)
            ->order_by("created_at", "DESC")
            ->get("comments")
            ->result_array();
    }
}
