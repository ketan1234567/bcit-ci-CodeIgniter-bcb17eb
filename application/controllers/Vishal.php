<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Vishal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(["url", "form"]);
        $this->load->library("session"); // Session library
        $this->load->model("Regmodel"); // Load model
    }

    // Login page
    public function index()
    {
        $this->load->view("login");
    }

    // Login authentication
    public function auth()
    {
        $username = $this->input->post("username");
        $password = $this->input->post("password");

        $user = $this->Regmodel->getUserWithRole($username);

        if ($user && $password === $user->password) {
            // Use password_verify() if hashed
            $this->session->set_userdata([
                "user_id" => $user->id,
                "username" => $user->username,
                "role" => $user->role,
                "isLoggedIn" => true,
            ]);

            redirect("vishal/dashboard");
        } else {
            $this->session->set_flashdata("error", "Invalid login");
            redirect("vishal");
        }
    }

    // Signup page
    public function signup()
    {
        $this->load->view("signup");
        $this->load->view("footer");
    }

    public function registration()
    {
        // Upload configuration
        $config = [
            "upload_path" => "./assets/upload/",
            "allowed_types" => "jpg|gif|png|jpeg",
            "max_size" => 100000,
        ];

        $this->load->library("upload", $config);
        $this->upload->initialize($config);

        // Collect form data
        $postData = [
            "fname" => $this->input->post("fname"),
            "lname" => $this->input->post("lname"),
            "contact" => $this->input->post("contact"),
            "address" => $this->input->post("address"),
            "state" => $this->input->post("state"),
            "gender" => $this->input->post("gender"),
            "email" => $this->input->post("email"),
            "username" => $this->input->post("username"),
            "password" => bin2hex($this->input->post("password")), // you can change to password_hash()
        ];

        // Check duplicate mobile number
        $chk_mob = $this->Regmodel->check_mob_no($this->input->post("contact"));

        if ($chk_mob) {
            $this->session->set_flashdata(
                "warning",
                "User already exists. Please check details!"
            );
            redirect("signup");
            return;
        }

        // ✅ Insert user and get last inserted ID
        $reg_id = $this->Regmodel->reg_data($postData);

        if (!$reg_id) {
            $this->session->set_flashdata("warning", "Failed to Register");
            redirect(base_url(), "refresh");
            return;
        }

        // ✅ Upload images if present
        if (!empty($_FILES["cust_image"]["name"][0])) {
            $filesCount = count($_FILES["cust_image"]["name"]);

            for ($i = 0; $i < $filesCount; $i++) {
                $_FILES["file"]["name"] = $_FILES["cust_image"]["name"][$i];
                $_FILES["file"]["type"] = $_FILES["cust_image"]["type"][$i];
                $_FILES["file"]["tmp_name"] =
                    $_FILES["cust_image"]["tmp_name"][$i];
                $_FILES["file"]["error"] = $_FILES["cust_image"]["error"][$i];
                $_FILES["file"]["size"] = $_FILES["cust_image"]["size"][$i];

                if ($this->upload->do_upload("file")) {
                    $fileData = $this->upload->data();

                    // Save image data to DB
                    $imgData = [
                        "cust_img_path" => $fileData["file_name"],
                        "id" => $reg_id,
                    ];

                    $this->Regmodel->store_image($imgData);
                }
            }
        }

        // ✅ Success message
        $this->session->set_flashdata("success", "Successfully Registered");
        redirect(base_url(), "refresh");
    }

    // Dashboard page
    public function dashboard()
    {
        if (!$this->session->userdata("isLoggedIn")) {
            redirect("vishal"); // Not logged in
        }

        $data = [
            "username" => $this->session->userdata("username"),
            "role" => $this->session->userdata("role"),
            "user_id" => $this->session->userdata("user_id"),
        ];

        $this->load->view("header", $data);
        $this->load->view("dashboard", $data);
        $this->load->view("footer");
    }

    public function frontEnd()
    {
        $data["posts"] = $this->Regmodel->get_posts();
        $this->load->view("frontEnd", $data);
        $this->load->view("footer");
    }


    public function logout()
    {
        $this->session->sess_destroy();
        redirect("frontEnd");
    }

    public function Add_post()
    {
        $data["posts"] = $this->db
            ->order_by("id", "DESC")
            ->get("posts")
            ->result();

        $this->load->view("header");
        $this->load->view("save_post", $data);
        $this->load->view("footer");
    }

public function save_post()
{
    if (!is_dir("./uploads")) {
        mkdir("./uploads", 0777, true);
    }

    $config = [
        "upload_path"   => "./uploads/",
        "allowed_types" => "jpg|jpeg|png|gif",
        "max_size"      => 2048
    ];

    $this->load->library("upload", $config);

    if (!$this->upload->do_upload("image")) {
        $this->session->set_flashdata("error", $this->upload->display_errors());
        redirect("Vishal/add_post");
        return;
    }

    $fileData = $this->upload->data();

    $title = $this->input->post("title", true);
    $slug  = url_title($title, "-", true);

    $this->load->model("Regmodel");
    if ($this->Regmodel->slug_exists($slug)) {
        $slug .= "-" . time();
    }

    $data = [
        "title"       => $title,
        "slug"        => $slug,
        "image"       => $fileData["file_name"],
        "description" => $this->input->post("description", true),
        "created_at"  => date("Y-m-d H:i:s"),
    ];

    $this->db->insert("posts", $data);

    $this->session->set_flashdata("success", "Post added successfully!");
    redirect("Vishal/frontEnd");
}


    public function delete_post($id)
    {
        $this->db->where("id", $id)->delete("posts");
        $this->session->set_flashdata("success", "Post deleted successfully");
        redirect("Vishal/frontEnd");
    }

    public function post_view($slug = null, $id = null)
    {
        if ($slug == null || $id == null) {
            show_404();
        }

        $data["post"] = $this->Regmodel->get_post_by_slug($slug);

        // Fetch comments using post_id (ID from URL)
        $data["comments"] = $this->Regmodel->get_comments($id);

        $this->load->view("post_view", $data);
    }


    public function save_comment()
    {
        $data = [
            "post_id" => $this->input->post("post_id"),
            "name" => $this->input->post("name", true),
            "comment" => $this->input->post("comment", true),
            "created_at" => date("Y-m-d H:i:s"),
        ];

        $this->db->insert("comments", $data);
        $this->session->set_flashdata("success", "Comment added successfully!");

        redirect($_SERVER["HTTP_REFERER"]);
    }
}
