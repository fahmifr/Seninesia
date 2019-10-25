<?php

namespace App\Repositories;

use App\Models\artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;

use App\Http\Requests\seniStoreRequest;
use App\Http\Requests\seniUpdateRequest;

class seniRepository
{
    private $model;

    public function __construct(artikel $model)
    {
        $this->model = $model;
    }
    
    public function get($id)
    {
        $seni = $this->model->where('id', $id)->first();

        return $seni;
    }

    public function store(seniStoreRequest $request, $imageName)
    {
        DB::beginTransaction();

        try {
            $seni = $this->model->create(
                ['name' => $request->name, 'description' => $request->description, 'thumbnail' => $imageName]
            );
            DB::commit();
            return $seni;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception($e);
        }
    }

    public function fileUpload($seni, $imageName, $thumbnail)
    {
        DB::beginTransaction();

        try {
            $thumbnail->move(public_path('assets/img/seni'), $imageName);
            $seni->thumbnail = $imageName;
            $seni->save();
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception($e);
        }
    }

    public function delete(artikel $seni)
    {
        DB::beginTransaction();

        try {
            $seni->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception($e);
        }
    }

    public function deleteFile(artikel $seni)
    {
        DB::beginTransaction();

        try {
            File::delete(public_path('assets/img/seni/' . $seni->thumbnail));
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public function update(seniUpdateRequest $request, artikel $seni, $imageName)
    {
        DB::beginTransaction();

        try {
            $seni->update(
                ['name' => $request->name, 'description' => $request->description, 'thumbnail' => $imageName]
            );
            DB::commit();
            return $seni;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception($e);
        }
    }
}
