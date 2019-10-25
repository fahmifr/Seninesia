<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\seniStoreRequest;
use App\Http\Requests\seniUpdateRequest;
use App\Repositories\seniRepository;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\artikel;
use File;

class seniController extends Controller
{
    public function __construct(seniRepository $seniRepository)
    {

        $this->seniRepository = $seniRepository;
    }
    public function index()
    {
        $pageSlug ="seni";

        $seni = artikel::orderBy('id', 'asc')->get();

        return view('seni.index',
            compact(
                'pageSlug',
                'seni',
            ));
    }
    
    public function create()
    {
        $pageSlug ="seni";
        return view('seni.create',
            compact(
                'pageSlug',
            ));
    }

    public function store(seniStoreRequest $request)
    {
        
        $thumbnail = $request->file('thumbnail');
        $imageName = $thumbnail->getClientOriginalName();

        $seni = $this->seniRepository->store($request, $imageName);
        $this->seniRepository->fileUpload($seni, $imageName, $thumbnail);
        
        return redirect(route('seni'));

    }

    public function delete(artikel $seni)
    {

        $file = public_path('assets/img/seni/' . $seni->thumbnail);

        if(File::exists($file)){

            $this->seniRepository->delete($seni);
            $this->seniRepository->deleteFile($seni);
            
            return redirect(route('seni'));
        }
        else {
            $this->seniRepository->delete($seni);
            $this->seniRepository->deleteFile($seni);

            return redirect(route('seni'));
        }
    }

    public function edit($id)
    {
        $pageSlug ="seni";
        $seni = $this->seniRepository->get($id);

        return view('seni.edit',
            compact(
                'seni',
                'pageSlug',
            ));
    }

    public function update(seniUpdateRequest $request, artikel $seni)
    {

        $file = public_path('assets/img/seni/' . $seni->thumbnail);
        

        if (!empty($request->file('thumbnail'))) {

            if(File::exists($file)){

                $this->seniRepository->deleteFile($seni);
            }

            $thumbnail = $request->file('thumbnail');
            $imageName = $thumbnail->getClientOriginalName();

            $seni = $this->seniRepository->update($request, $seni, $imageName);
            $this->seniRepository->fileUpload($seni, $imageName, $thumbnail);
            
        }
        else {
            
            $seni->name = $request->get('name');
            $seni->description = $request->get('description');
            $seni->save();
        }


        return redirect(route('seni'));

    }
}
