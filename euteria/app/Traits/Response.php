<?php

namespace App\Traits;

use App\User;

trait Response
{
    
    private function response($status, $message, $data=[])
    {
        $default_response = ['status'=>$status, 'message'=>$message];
        if($data)
        {
            if(is_array($data))
            {
                if(count($data) > 0)
                {
                    foreach($data as $key => $other)
                    {
                        $default_response[$key] = $other;
                    }
                    return $default_response;
                }
            }else{
                $default_response['data'] = $data;
            }
            
            return $default_response;
        }
        return $default_response;
    }

    public function success($data=null)
    {
        return response()->json($this->response('success', 'Success', $data), 200);
    }

    public function error($data=null,$code=500)
    {
        return response()->json($this->response('error', 'Error', $data), $code);
    }

    public function created($data=null)
    {
        return response()->json($this->response('success', 'Created', $data), 201);
    }

    public function internal_server_error($data=null)
    {
        return response()->json($this->response('error', 'Internal Server Error', $data), 500);
    }
    
    public function not_found()
    {
        return response()->json($this->response('error', 'Not Found'), 404);
    }

    public function bad_request($data=null)
    {
        return response()->json($this->response('error', 'Bad Request', $data), 400);
    }

    public function forbidden()
    {
        return response()->json($this->response('error', 'Forbidden Access'), 403);
    }

    public function unauthorized()
    {
        return response()->json($this->response('error', 'Unauthorized'), 401);
    }
}

