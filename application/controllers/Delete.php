<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delete extends MY_Controller {

        function __construct()
        {
                parent:: __construct();
                $this->redirectIfNotLoggedIn();
                $this->load->model('GetModel','fetch');
                $this->load->model('DeleteModel','delete');
        }

  
        public function Enquiry($id)
        {
            $status= $this->delete->deleteInfo($id, 'enquiries');
            if($status)
            {
                $this->session->set_flashdata('success','Enquiry deleted!');
                redirect('Admin');
            }
            else
            {
                $this->session->set_flashdata('failed','Error!');
                redirect('Admin');
            }
        }


        public function Portfolio($id)
        { 
            $d= $this->fetch->getInfoById($id, 'portfolio');
            $path1= 'assets/portfolio/'.$d->img_src1;
            $path2= 'assets/portfolio/'.$d->img_src2;
            $path3= 'assets/portfolio/'.$d->img_src3;
            $status= $this->delete->deleteInfo($id, 'portfolio');
            if($status)
            {
                unlink("$path1");
                unlink("$path2");
                unlink("$path3");
                $this->session->set_flashdata('success','Project deleted from portfolio!');
                redirect('Admin/Portfolio');
            }
            else{
                $this->session->set_flashdata('failed','Error!');
                redirect('Admin/Portfolio');
            }
        }

        public function Service($id)
        {
            $d= $this->fetch->getInfoById($id, 'services');
            $path= 'assets/images/'.$d->img_src;
            $status= $this->delete->deleteInfo($id, 'services');
            if($status)
            {
                unlink("$path");
                $this->session->set_flashdata('success','Service Deleted!');
                redirect('Admin/Services');
            }
            else{
                $this->session->set_flashdata('failed','Error!');
                redirect('Admin/Services');
            }
        }

        public function Feedback($id)
        {
            $d= $this->fetch->getInfoById($id, 'feedbacks');
            $path= 'assets/clients/'.$d->img_src;
            $status= $this->delete->deleteInfo($id, 'feedbacks');
            if($status){
                unlink("$path");
                $this->session->set_flashdata('success','Feedback deleted!');
                redirect('Admin/Feedbacks');
            }
            else{
                $this->session->set_flashdata('failed','Error!');
                redirect('Admin/Feedbacks');
            }
        }
        

        public function products($id)
        {
            
            $d= $this->fetch->getInfoById($id, 'products');
            $path= 'assets/img/product'.$d->img;
            $status= $this->delete->deleteInfo($id, 'products');
            if($status){
                unlink("$path");
                $this->session->set_flashdata('success','Products deleted!');
                redirect('Admin/Products');
            }
            else{
                $this->session->set_flashdata('failed','Error!');
                redirect('Admin/Products');
            }
        }


        public function Clients($id)
        {
            
            $d = $this->fetch->getInfoById($id, 'clients');
            $path= 'assets/clients/'.$d->img_src;
            $status= $this->delete->deleteInfo($id, 'clients');
            if($status){
                unlink($path);
                $this->session->set_flashdata('success','Client deleted!');
                redirect('Admin/Clients');
            }
            else{
                $this->session->set_flashdata('failed','Error!');
                redirect('Admin/Clients');
            }
        }
     



}
