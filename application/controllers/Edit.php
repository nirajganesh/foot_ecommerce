<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends MY_Controller {

        function __construct()
        {
            parent:: __construct();
            $this->redirectIfNotLoggedIn();
            $this->load->model('GetModel','fetch');
            $this->load->model('EditModel','edit');
        }

        public function Slide($id)
        {
            $data=$this->input->post();
            if($_FILES['img']['name']!=null){
                $path ='assets/images';
                $initialize = array(
                    "upload_path" => $path,
                    "allowed_types" => "jpg|jpeg|png|bmp|webp|gif",
                    "remove_spaces" => TRUE,
                    "max_size" => 350
                );
                $this->load->library('upload', $initialize);
                if (!$this->upload->do_upload('img')) {
                    $this->session->set_flashdata('failed',strip_tags($this->upload->display_errors() ) );
                    redirect('Admin/Hero_sliders');
                } 
                else {
                    $imgdata = $this->upload->data();
                    $data['img_src'] = $imgdata['file_name'];
                    $d= $this->fetch->getInfoById($id,'hero_slider');
                    $path= 'assets/images/'.$d->img_src;
                }
            }

            $status= $this->edit->updateInfo($data, $id, 'hero_slider');
            if($status){
                unlink($path);
                $this->session->set_flashdata('success','Slide Updated !');
                redirect('Admin/Hero_sliders');
            }
            else{
                $this->session->set_flashdata('failed','Error !');
                redirect('Admin/Hero_sliderss');
            }
        }

        public function Service($id)
        {
            $data=$this->input->post();
            if($_FILES['img']['name']!=null){
                $path ='assets/images';
                $initialize = array(
                    "upload_path" => $path,
                    "allowed_types" => "*",
                    "remove_spaces" => TRUE,
                    "max_size" => 350
                );
                $this->load->library('upload', $initialize);
                if (!$this->upload->do_upload('img')) {
                    $this->session->set_flashdata('failed',strip_tags($this->upload->display_errors() ) );
                    redirect('Admin/Services');
                } 
                else {
                    $imgdata = $this->upload->data();
                    $data['img_src'] = $imgdata['file_name'];
                    $d= $this->fetch->getInfoById($id,'services');
                    $path= 'assets/images/'.$d->img_src;
                }
            }

            $status= $this->edit->updateInfo($data, $id, 'services');
            if($status){
                unlink($path);
                $this->session->set_flashdata('success','Service Updated !');
                redirect('Admin/Services');
            }
            else{
                $this->session->set_flashdata('failed','Error !');
                redirect('Admin/Services');
            }
        }

        public function Feedback($id)
        {
            $data=$this->input->post();
            $path=null;
            if($_FILES['img']['name']!=null){
                $path ='assets/clients';
                $initialize = array(
                    "upload_path" => $path,
                    "allowed_types" => "jpg|jpeg|png|bmp|webp|gif",
                    "remove_spaces" => TRUE,
                    "max_size" => 600
                );
                $this->load->library('upload', $initialize);
                if (!$this->upload->do_upload('img')) {
                    $this->session->set_flashdata('failed',strip_tags($this->upload->display_errors() ) );
                    redirect('Admin/Feedbacks');
                } 
                else {
                    $imgdata = $this->upload->data();
                    $data['img_src'] = $imgdata['file_name'];
                    $d= $this->fetch->getInfoById($id,'feedbacks');
                    $path= 'assets/clients/'.$d->img_src;
                }
            }
            $status= $this->edit->updateInfo($data, $id, 'feedbacks');
            if($status){
                if($path){
                    unlink($path);
                }
                $this->session->set_flashdata('success','Feedback Updated !');
                redirect('Admin/Feedbacks');
            }
            else{
                $this->session->set_flashdata('failed','Error !');
                redirect('Admin/Feedbacks');
            }
        }

        public function Products($id)
        {
            // var_dump($id);exit;
            $data=$this->fetch->getInfoById($id,'products');
            $cat=$this->fetch->getInfo('categories');
            $this->load->view('admin/adminheader',['title'=>'Edit products','data'=>$data,'cat'=>$cat]); 
            $this->load->view('admin/adminaside'); 
            $this->load->view('admin/product-form'); 
            $this->load->view('admin/adminfooter');  
        }
        public function updateProducts($id)
        {  
            $this->form_validation->set_rules('pname', 'Training name', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');
            
            if($this->form_validation->run() == true){
                $data=$this->input->post();

                if( $_FILES['img']['name']!=null ){
                    $old_img= $this->fetch->getInfoById($id,'products');
                    $unlink= 'assets/img/product'.$old_img->img;
                    $path ='assets/img/product';
                    $initialize = array(
                        "upload_path" => $path,
                        "allowed_types" => "jpg|jpeg|png|bmp|webp",
                        "remove_spaces" => TRUE
                    );
                    $this->load->library('upload', $initialize);
                    if (!$this->upload->do_upload('img')) 
                    {
                        $this->session->set_flashdata('failed',$this->upload->display_errors());
                        redirect('Admin/Products');
                    }
                    else 
                    {
                        $filedata = $this->upload->data();
                        $fileName = $filedata['file_name'];
                        $data['img']=$fileName;
                    } 
                }

                $cat_data=$this->fetch->getCategoryInfoId($data['cname'],'categories');
                foreach ($cat_data as $row)
                {
                   $data['cid']=$row->id; 
                } 
             
                unset($data['cname']);
                $status= $this->edit->updateInfo($data, $id, 'products');
                if($status)
                {
                    unlink($unlink);
                    $this->session->set_flashdata('success','Training updated !' );
                    redirect('Admin/Products');
                }
                else
                {
                    $this->session->set_flashdata('failed','Error !');
                    redirect('Admin/Products');
                }
            }
            else
            {
                $this->session->set_flashdata('failed',strip_tags(validation_errors()));
                redirect('Admin/Products');
            }
        }

        public function Portfolio($id)
        {
            $data=$this->fetch->getInfoById($id,'portfolio');
            $this->load->view('admin/adminheader',['title'=>'Edit portfolio','data'=>$data]); 
            $this->load->view('admin/adminaside'); 
            $this->load->view('admin/portfolio-form'); 
            $this->load->view('admin/adminfooter');  
        }
        public function updatePortfolio($id)
        {  
            $this->form_validation->set_rules('title', 'Project title', 'required');
            $this->form_validation->set_rules('short_descr', 'Short description', 'required');
            
            if($this->form_validation->run() == true){
                $data=$this->input->post();

                if( $_FILES['img1']['name']!=null ){
                    $old_img= $this->fetch->getInfoById($id,'portfolio');
                    $unlink1= 'assets/portfolio/'.$old_img->img_src1;
                    $path ='assets/portfolio';
                    $initialize = array(
                        "upload_path" => $path,
                        "allowed_types" => "jpg|jpeg|png|bmp|webp",
                        "remove_spaces" => TRUE
                    );
                    $this->load->library('upload', $initialize);
                    if (!$this->upload->do_upload('img1')) {
                        $this->session->set_flashdata('failed',$this->upload->display_errors());
                        redirect('Admin/Portfolio');
                    }
                    else {
                        $filedata1 = $this->upload->data();
                        $fileName1 = $filedata1['file_name'];
                        
                        $data['img_src1']=$fileName1;
                    } 
                }
                if( $_FILES['img2']['name']!=null ){
                    $old_img= $this->fetch->getInfoById($id,'portfolio');
                    $unlink2= 'assets/portfolio/'.$old_img->img_src2;
                    $path ='assets/portfolio';
                    $initialize = array(
                        "upload_path" => $path,
                        "allowed_types" => "jpg|jpeg|png|bmp|webp",
                        "remove_spaces" => TRUE
                    );
                    $this->load->library('upload', $initialize);
                    if (!$this->upload->do_upload('img2')) {
                        $this->session->set_flashdata('failed',$this->upload->display_errors());
                        redirect('Admin/Portfolio');
                    }
                    else {
                        $filedata2 = $this->upload->data();
                        $fileName2 = $filedata2['file_name'];
                        
                        $data['img_src2']=$fileName2;
                    } 
                }
                if( $_FILES['img3']['name']!=null )
                {
                    $old_img= $this->fetch->getInfoById($id,'portfolio');
                    $unlink3= 'assets/portfolio/'.$old_img->img_src3;
                    $path ='assets/portfolio';
                    $initialize = array(
                        "upload_path" => $path,
                        "allowed_types" => "jpg|jpeg|png|bmp|webp",
                        "remove_spaces" => TRUE
                    );
                    $this->load->library('upload', $initialize);
                    if (!$this->upload->do_upload('img3')) 
                    {
                        $this->session->set_flashdata('failed',$this->upload->display_errors());
                        redirect('Admin/Portfolio');
                    }
                    else {
                        $filedata3 = $this->upload->data();
                        $fileName3 = $filedata3['file_name'];
                        $data['img_src3']=$fileName3;
                    } 
                }

                $status= $this->edit->updateInfo($data, $id, 'portfolio');
                if($status)
                {
                    unlink($unlink1);
                    unlink($unlink2);
                    unlink($unlink3);
                    $this->session->set_flashdata('success','Portfolio project updated !' );
                    redirect('Admin/Portfolio');
                }
                else
                {
                    $this->session->set_flashdata('failed','Error !');
                    redirect('Admin/Portfolio');
                }
            }
            else{
                $this->session->set_flashdata('failed',strip_tags(validation_errors()));
                redirect('Admin/Portfolio');
            }
        }

        
        public function updateVideo($id)
        {
            if( $this->input->post()!=null ){
                $data = $this->input->post();
                $status= $this->edit->updateInfo($data, $id, 'video');

                if($status){
                    $this->session->set_flashdata('success','Video updated !' );
                    redirect('Admin/Video');
                }
                else{
                    $this->session->set_flashdata('failed','Error !');
                    redirect('Admin/Video');
                }
            }
            else{
                $this->session->set_flashdata('failed','Please set the link for the video');
                redirect('Admin/Video');
            }
        }

        
        public function Header_images($name){
            if($_FILES['img']['name']!=null){
                $path ='assets/images/';
                $initialize = array(
                    "upload_path" => $path,
                    "allowed_types" => "jpg|jpeg|png|bmp",
                    "remove_spaces" => TRUE,
                    "max_size" => 550,
                    "overwrite" => true,
                    'file_name' => $name.'.jpg'
                );
                $this->load->library('upload', $initialize);
                if (!$this->upload->do_upload('img')) {
                    $this->session->set_flashdata('failed',trim(strip_tags($this->upload->display_errors())) );
                    redirect('Admin/editableImages');
                } 
                else {
                    $this->session->set_flashdata('success',"Image updated" );
                    redirect('Admin/editableImages');
                }
            }
            else{
                $this->session->set_flashdata('failed','No file selected' );
                redirect('Admin/editableImages');
            }
        }


        public function Clients($id)
        {
            $data=$this->input->post();
            $path=null;
            if($_FILES['img']['name']!=null){
                $path ='assets/clients';
                $initialize = array(
                    "upload_path" => $path,
                    "allowed_types" => "jpg|jpeg|png|bmp|webp",
                    "remove_spaces" => TRUE,
                    "max_size" => 600
                );
                $this->load->library('upload', $initialize);
                if (!$this->upload->do_upload('img')) {
                    $this->session->set_flashdata('failed',strip_tags($this->upload->display_errors()) );
                    redirect('Admin/Clients');
                }
                else {
                    $imgdata = $this->upload->data();
                    $imagename = $imgdata['file_name'];
                    $data['img_src']=$imagename;
                    $d= $this->fetch->getInfoById($id,'clients');
                    $path= 'assets/clients/'.$d->img_src;
                } 
            }

            $status= $this->edit->updateInfo($data,$id, 'clients');
            if($status){
                if($path){
                    unlink($path);
                }
                $this->session->set_flashdata('success','Client Updated!' );
                redirect('Admin/Clients');
            }
            else{
                $this->session->set_flashdata('failed','Error !');
                redirect('Admin/Clients');
            }
        }

        public function webProfile()
        {
            $data=$this->input->post();
            $status= $this->edit->updateWebProfile($data);

            if($status){
                $this->session->set_flashdata('success','Web Profile Updated !');
                redirect('Admin/webProfile');
            }
            else{
                $this->session->set_flashdata('failed','Error !');
                redirect('Admin/webProfile');
            }
        }

        public function enqStatus($id)
        {
            $status= $this->edit->updateEnqStatus($id);
            if($status){
                redirect('Admin');
            }
            else{
                redirect('Admin');
            }
        }

        public function adminProfile($id)
        {
            $data=$this->input->post();
            $status= $this->edit->updateAdminProfile($data,$id);
            $user=$this->fetch->getAdminProfile();
            $this->session->set_userdata(['user' =>  $user]);

            if($status){
                $this->session->set_flashdata('success','Admin Panel Profile Updated !');
                redirect('Admin/adminProfile');
            }
            else{
                $this->session->set_flashdata('failed','Error !');
                redirect('Admin/adminProfile');
            }
        }

        
        function generate_url_slug($string,$table,$field='slug',$key=NULL,$value=NULL){
            $t =& get_instance();
            $slug = url_title($string);
            $slug = strtolower($slug);
            $i = 0;
            $params = array ();
            $params[$field] = $slug;
            if($key)$params["$key !="] = $value; 
            while ($t->db->where($params)->get($table)->num_rows())
            {
                if (!preg_match ('/-{1}[0-9]+$/', $slug )){
                    $slug .= '-' . ++$i;
                }
                else{
                    $slug = preg_replace ('/[0-9]+$/', ++$i, $slug );
                }
                $params [$field] = $slug;
            }
                return $slug;
        }
        

}
