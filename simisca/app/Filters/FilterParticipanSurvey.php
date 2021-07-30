<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use App\Models\Participan_model;

class FilterParticipanSurvey implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $email = session()->email;
        $model = new Participan_model();
        try {
            $result = $model->getParticipan($email);
            if(count($result)==0){
                session()->set(['kuesioner' => false]);
                return redirect()->to(base_url('dashboard'));
            }else{
                session()->set(['kuesioner' => true]);
            }
        } catch (\Throwable $th) {
            // tidak sedang dalam masa survey
            session()->set(['kuesioner' => false]);
            return redirect()->to(base_url('dashboard'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}