<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServicesController extends Controller
{

    public function index()
    {
        $services = Service::all();

        return view('dashboard.services.index', compact('services'));
    }

    public function create()
    {
        return view('dashboard.services.create');
    }

    public function store(ServiceRequest $request)
    {
        // validation by ServiceRequest
        try {

            DB::beginTransaction();

            $fileName = "";
            if ($request->has('photo')) {
                $fileName = uploadImage('services', $request->photo);
            }

            Service::create([
                'title' => $request->title,
                'content' => $request->content,
                'photo' => $fileName
            ]);

            DB::commit();
            return redirect()->route('admin.services')->with(['success' => 'تم الحفظ بنجاح']);
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->route('admin.services')->with(['error' => 'حدث خطأ ما برجاء المحاوله لاحقا']);
        }
    }

    public function edit($id)
    {
        $service = Service::find($id);
        if (!$service)
            return redirect()->route('admin.services')->with(['error' => 'هذه الخدمة غير موجود']);

        return view('dashboard.services.edit', compact('service'));
    }

    public function update(ServiceRequest $request, $id)
    {
        try {
            // validation by Large Sections Update Request

            //Update DB

            $service = Service::find($id);
            if (!$service)
                return redirect()->route('admin.services')->with(['error' => 'هذه الخدمة غير موجود ']);

            DB::beginTransaction();

            // Photo Update
            if ($request->has('photo')) {
                if (str_ends_with($service->photo, 'g') ) {
                    deletePhotos($service->photo);
                }
                $fileName = uploadImage('services', $request->photo);
                $service->update([
                    'photo' => $fileName,
                ]);
            }


            $service->update($request->except('_token', 'id', 'photo'));


            DB::commit();
            return redirect()->route('admin.services')->with(['success' => 'تم التحديث بنجاح']);

        } catch (\Exception $ex) {

            DB::rollback();
            return redirect()->route('admin.services')->with(['error' => 'حدث خطأ ما برجاء المحاولة لاحقا']);
        }
    }

    public function destroy($id)
    {
        try {
            //get specific Image
            $service = Service::find($id);

            // check if exists
            if (!$service)
                return redirect()->route('admin.services')->with(['error' => 'هذا الخدمة غير موجود ']);

            // delete photo from Folder
            if (str_ends_with($service->photo, '.jpg') || str_ends_with($service->photo, '.png') || str_ends_with($service->photo, '.jpeg')) {
                deletePhotos($service->photo);
            }

            // delete row from Table
            $service->delete();

            // redirect success
            return redirect()->route('admin.services')->with(['success' => 'تم الحذف بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.services')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function changeStatus($id)
    {
        try {
            $service = Service::find($id);

            if (!$service) {
                return redirect()->route('admin.services')->with(['error' => 'هذه الخدمة غير موجود']);
            }
            $status = $service->is_active;

            changeSts($status, $service);

            return redirect()->route('admin.services')->with(['success' => 'تم تغيير حالة الخدمة بنجاح']);

        } catch (\Exception $exception) {
            return redirect()->route('admin.services')->with(['error' => 'حدث خطأ ما برجاء المحاولة لاحقا']);
        }
    }

}
