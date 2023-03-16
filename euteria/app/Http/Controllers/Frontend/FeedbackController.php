<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Utility\Feedback;
use App\Traits\Response;
use App\Traits\GRecaptcha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class FeedbackController extends Controller
{
    use Response;
    use GRecaptcha;

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            
            $email = $request->email;

            $exist = Feedback::where('email',$email)->first();
            if($exist)
            {
                return $this->bad_request();
            }

            $opinion = json_encode($request->opinion);
            $request->merge(['opinion'=>$opinion]);

            Feedback::create($request->all());
            DB::commit();
            
            return $this->success($request->all());
        } catch (\Exception $e) {
            DB::rollback();
            // return redirect()->back()->with('error-message',$e->getMessage());
            return $this->internal_server_error();
        }
    }
}
