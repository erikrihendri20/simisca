<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class FilterSSO implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session('SSOLog')) {
            return redirect()->to(base_url('landingpage'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}