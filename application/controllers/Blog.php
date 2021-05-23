<?php
    Class Blog extends CI_Controller
    {
        function __construct(){
            parent::__construct();
            $this->load->database();
            $this->load->helper('url');
            $this->load->model('Blog_model');
            $this->load->helper('form');
            $this->load->library('session');
        }

        public function index($offset=0)
        {
            $this->load->library('pagination');
            $config['base_url']     = site_url('blog/index');
            $config['total_rows']   = $this->Blog_model->getTotalBlog();
            $config['per_page']     = 3;
            $this->pagination->initialize($config);
            $data['blogs']=$this->Blog_model->getBlogs($config['per_page'],$offset);
            $this->load->view('partial/header.php'); 
            $this->load->view('blog',$data);
                  
        }
        public function listdata()
        {
            $this->load->view('list_data');
        }
        public function detail($url)
        {           
            $this->load->database();
            $this->db->where('url',$url); //select where berdasarkan url
            $query = $this->db->get('blog');    
            $data['blogs']=$query->row_array();

            $this->load->view('detail',$data);
        }
        public function add()
        {   
            
            $this->load->model('Blog_model');
            
            if($this->input->post())
            {
                $this->form_validation->set_rules('title', 'Judul', 'required');
                $this->form_validation->set_rules('url', 'URL', 'required|alpha_dash');
                $this->form_validation->set_rules('content', 'Konten', 'required');
                if($this->form_validation->run()===TRUE){
                    
                    $data['title']=$this->input->post('title');
                    $data['url']=$this->input->post('url');
                    $data['content']=$this->input->post('content');
                    // print_r($data);
                    $config['upload_path']         = './uploads/';
                    $config['allowed_types']        = 'gif|jpg|png';
                    $config['max_size']             = 1000;
                    $config['max_width']            = 2000;
                    $config['max_height']           = 1600;
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('cover'))
                    {
                        echo $this->upload->display_errors();
                    }
                    else
                    {
                        $data['cover'] = $this->upload->data('file_name');
                    }
                    $id=$this->Blog_model->insertBlog($data);
                    if($id){
                        $this->session->set_flashdata('message', '<div class="alert alert-success">Data berhasil disimpan</div>');
                        // echo "Data berhasil disimpan";
                        redirect('/');
                    }    
                    else{
                        $this->session->set_flashdata('message', '<div class="alert alert-success">Data Gagal disimpan</div>');
                        // echo "Data gagal disimpan";
                        redirect('/');
                    }    
                }
            }
            $this->load->view('form_add');
        }

        public function edit($id)
        {
            // $this->load->database();
            $this->load->model('Blog_model');
            $data['blog']=$this->Blog_model->getSingleBlog('id',$id);
            if($this->input->post())
            {
                $this->form_validation->set_rules('title', 'Judul', 'required');
                $this->form_validation->set_rules('url', 'URL', 'required|alpha_dash');
                $this->form_validation->set_rules('content', 'Konten', 'required');
                if($this->form_validation->run()===TRUE){
                    $post['title']  =$this->input->post('title');
                    $post['content']=$this->input->post('content');
                    $post['url'] =$this->input->post('url');  
                    $config['upload_path']         = './uploads/';
                    $config['allowed_types']        = 'gif|jpg|png';
                    $config['max_size']             = 1000;
                    $config['max_width']            = 2000;
                    $config['max_height']           = 1600;
                    $this->load->library('upload', $config);   
                    if (!$this->upload->do_upload('cover'))
                    {
                        echo $this->upload->display_errors();
                    }
                    else
                    {
                        $post['cover'] = $this->upload->data('file_name');
                    }           
                    $id=$this->Blog_model->updateBlog($id,$post);
                    if($id){
                        $this->session->set_flashdata('message', '<div class="alert alert-success">Data berhasil disimpan</div>');
                        // echo "Data berhasil disimpan";
                        redirect('/');
                    }
                    else{
                        $this->session->set_flashdata('message', '<div class="alert alert-success">Data berhasil disimpan</div>');
                        // echo "Data gagal disimpan";
                    }
                }
            }
            $this->load->view('form_edit',$data);
        }
        public function delete($id)
        {
            $result = $this->Blog_model->deleteBlog($id); 
            if($result)
            {
            $this->session->set_flashdata('message', '<div class="alert alert-success">Data berhasil dihapus</div>');
            }
            else
            {
            $this->session->set_flashdata('message', '<div class="alert alert-warning">Data gagal dihapus</div>');
            }
            redirect('/');
        }
        public function login()
        {
            if ($this->input->post()) 
            {
                $username= $this->input->post('username');
                $password= $this->input->post('password');
                if ($username=='admin' && $password=='admin') {
                    $_SESSION['username']='admin';
                    redirect('/');
                }
                else{
                    $this->session->set_flashdata('message', '<div class="alert alert-warning">Username atau Password salah</div>');
                    redirect('blog/login');
                }
            }
            $this->load->view('login'); 
        }
    }
?>