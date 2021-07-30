<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use App\Models\Participan_model;

class FilterSSO implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if(session()->email == 'bps1@bps.go.id' || session()->email == 'nurani.aprilia@bps.go.id'){
            session()->set(['super admin' => true]);
        }else{
            session()->set(['super admin' => false]);
        }
        $email = session()->email;
        $model = new Participan_model();
        try {
            $result = $model->getParticipan($email);
            if(count($result)==0){
                session()->set(['kuesioner' => false]);
            }else{
                session()->set(['kuesioner' => true]);
            }
        } catch (\Throwable $th) {
            // tidak sedang dalam masa survey
            session()->set(['kuesioner' => false]);
        }
        if (!session('SSOLog')) {
            return redirect()->to(base_url('landingpage'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}