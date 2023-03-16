<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Backend\Slider;
use App\Traits\Response;
use App\Traits\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    use Response;
    use Upload;

    public function source()
    {
        $query = Slider::query();
        $query->orderBy('order','ASC');
        return DataTables::eloquent($query)
        ->editColumn('title', function ($data) {
            return $data->title;
        })
        ->editColumn('images', function ($data) {
            return "<img src='".asset($data->images)."' width='50px'>";
        })
        ->addColumn('order', function($data) use ($query){
            return view('backend.slider.order-action',compact(['data','query']));
        })
        ->addIndexColumn()
        ->addColumn('action', 'backend.slider.index-action')
        ->rawColumns(['action','images','order'])
        ->toJson();
    }

    public function index()
    {
        return view('backend.slider.index');
    }

    public function create()
    {
        $data = null;
        return view('backend.slider.form',compact(['data']));
    }

    public function store(Request $request)
    {

        DB::beginTransaction();
        try {

            if($request->has('image')){
                $image = [];
                foreach($request->image as $key=>$row){
                    if($row)
                    {
                        $image[] = $this->upload($row, 'image/slider', Str::uuid().'-'.$key);
                        // dd($image);
                    }
                }
                $request->merge(['images'=>$image[0]['file_name']]);
            }

            // return $request->all();
            Slider::create($request->all());
            DB::commit();
            return redirect()->route('admin.slider.index')->with('success-message','Slider berhasil disimpan');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error-message',$e->getMessage());
        }
    }

    public function show($id)
    {
        $data = Slider::findOrFail($id);
        return view('backend.slider.show',compact(['data']));
    }

    public function edit($id)
    {
        $data = Slider::findOrFail($id);
        return view('backend.slider.form',compact(['data']));
    }

    public function update(SliderRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $data = Slider::findOrFail($id);
            if($request->has('image')){
                $image = [];
                foreach($request->image as $key=>$row){
                    if($row)
                    {
                        $image[] = $this->upload($row, 'image/slider', Str::uuid().'-'.$key);
                    }
                }
                $request->merge(['images'=>$image[0]['file_name']]);
            }
            $data->update($request->all());
            DB::commit();
            return redirect()->route('admin.slider.index')->with('success-message','Slider berhasil dirubah');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error-message',$e->getMessage());
        }
    }

    public function destroy($id)
    {
        $data = Slider::find($id);
        if($data)
        {
            $data->delete();
            return $this->success();
        }
        return $this->not_found();
    }

    public function order($type,$id)
    {
        $data = Slider::findOrFail($id);
        if($type == 'up' || $type = 'down')
        {
            if($type == 'up')
            {
                $new_oder = $data->order-1;

                $before_data = Slider::where('order',$new_oder)->first();
                if($before_data)
                {
                    $before_order = $before_data->order + 1;
                    $before_data->update([
                        'order'=> $before_order
                    ]);
                    $data->update([
                        'order'=> $new_oder
                    ]);
                }
                return $this->success();
            }elseif($type == 'down'){
                $new_oder = $data->order + 1;

                $before_data = Slider::where('order',$new_oder)->first();
                if($before_data)
                {
                    $before_order = $before_data->order - 1;
                    $before_data->update([
                        'order'=> $before_order
                    ]);
                    $data->update([
                        'order'=> $new_oder
                    ]);
                }
                return $this->success();
            }else{
                return $this->not_found();
            }

        }
        return $this->not_found();
    }
}
