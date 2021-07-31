<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use App\Models\Participan_model;

class FilterSuperAdmin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if(session()->email == 'bps1@bps.go.id' || session()->email == 'nurani.aprilia@bps.go.id'){
            session()->set(['super admin' => true]);
        }else{
            // session()->set(['super admin' => false]);
            return redirect()->to(base_url('dashboard'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}