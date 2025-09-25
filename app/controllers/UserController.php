<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UserController extends Controller {
    public function __construct()
    {
        parent::__construct();
        $this->call->library('pagination'); 
    }

    public function index()
    {
        $page = !empty($_GET['page']) ? $this->io->get('page') : 1;
        $q = !empty($_GET['q']) ? trim($this->io->get('q')) : '';
        $records_per_page = 10;

        // Get paginated users
        $all = $this->UserModel->page($q, $records_per_page, $page);
        $data['users'] = $all['records'];
        $total_rows = $all['total_rows'];

        // Setup pagination
        $this->pagination->set_options([
            'first_link'     => '⏮ First',
            'last_link'      => 'Last ⏭',
            'next_link'      => 'Next →',
            'prev_link'      => '← Prev',
            'page_delimiter' => '&page='
        ]);
        $this->pagination->set_theme('bootstrap');
        $this->pagination->initialize($total_rows, $records_per_page, $page, site_url('/user').'?q='.$q);

        $data['page'] = $this->pagination->paginate();

        $this->call->view($view, $data);
    }


    public function create()
    {
        if ($this->io->method() == 'post') {
            $username = $this->io->post('username');
            $email = $this->io->post('email');

            $data = [
                'username' => $username,
                'email'    => $email
            ];

            $this->UserModel->insert($data);
            redirect('/');
        } else {
            $this->call->view('user/create');
        }
    }

    public function update($id)
    {
        $data['user'] = $this->UserModel->find($id);

        if ($this->io->method() == 'post') {    
            $data = [
                'username' => $this->io->post('username'),
                'email'    => $this->io->post('email')
            ];

            $this->UserModel->update($id, $data);
            redirect('/');
        } else {
            $this->call->view('user/update', $data);
        }
    }

    public function delete($id)
    {
        $this->UserModel->delete($id);
        redirect('/');
    }
}
