<?php

namespace App\Http\Controllers\CommonSetting;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\CommonSetting;
use Illuminate\Http\Request;

class CommonSettingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function index(Request $request)
    {
        $model = str_slug('commonsetting','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $commonsetting = CommonSetting::where('title', 'LIKE', "%$keyword%")
                ->orWhere('favicon', 'LIKE', "%$keyword%")
                ->orWhere('dashboard_logo', 'LIKE', "%$keyword%")
                ->orWhere('dashboard_logo_text', 'LIKE', "%$keyword%")
                ->orWhere('footer_text', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $commonsetting = CommonSetting::paginate($perPage);
            }

            return view('commonSetting.common-setting.index', compact('commonsetting'));
        }
        return response(view('403'), 403);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $model = str_slug('commonsetting','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('commonSetting.common-setting.create');
        }
        return response(view('403'), 403);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $model = str_slug('commonsetting','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'title' => 'required',
			'favicon' => 'required',
			'dashboard_logo' => 'required',
			'dashboard_logo_text' => 'required'
		]);
            $requestData = $request->all();
            $requestData['favicon']=$this->storeImageToStorageFolder('AdminDashboard',$request->favicon)??"";                             
            $requestData['dashboard_logo']=$this->storeImageToStorageFolder('AdminDashboard',$request->dashboard_logo)??"";                             
            $requestData['dashboard_logo_text']=$this->storeImageToStorageFolder('AdminDashboard',$request->dashboard_logo_text)??"";                             
            CommonSetting::create($requestData);
            return redirect('commonSetting/common-setting')->with('flash_message', 'CommonSetting added!');
        }
        return response(view('403'), 403);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $model = str_slug('commonsetting','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $commonsetting = CommonSetting::findOrFail($id);
            return view('commonSetting.common-setting.show', compact('commonsetting'));
        }
        return response(view('403'), 403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $model = str_slug('commonsetting','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $commonsetting = CommonSetting::findOrFail($id);
            return view('commonSetting.common-setting.edit', compact('commonsetting'));
        }
        return response(view('403'), 403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $model = str_slug('commonsetting','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'title' => 'required',
//			'favicon' => 'required',
//			'dashboard_logo' => 'required',
//			'dashboard_logo_text' => 'required'
		]);
            $requestData = $request->all();
            
            $commonsetting = CommonSetting::findOrFail($id);
            $oldFavicon = $commonsetting->favicon; 
            if ($request->hasFile('favicon')) {
                $requestData['favicon']=$this->storeImageToStorageFolder('AdminDashboard',$request->favicon)??"";            
                $this->deleteImage($oldFavicon)??"";
            }else{
                $requestData['favicon'] = $commonsetting->favicon??"";
            }//end if else.     
            $oldLogo = $commonsetting->dashboard_logo; 
            if ($request->hasFile('dashboard_logo')) {
                $requestData['dashboard_logo']=$this->storeImageToStorageFolder('AdminDashboard',$request->dashboard_logo)??"";            
                $this->deleteImage($oldLogo)??"";
            }else{
                $requestData['dashboard_logo'] = $commonsetting->dashboard_logo??"";
            }//end if else.     
            $oldLogoText = $commonsetting->dashboard_logo_text; 
            if ($request->hasFile('dashboard_logo_text')) {
                $requestData['dashboard_logo_text']=$this->storeImageToStorageFolder('AdminDashboard',$request->dashboard_logo_text)??"";            
                $this->deleteImage($oldLogoText)??"";
            }else{
                $requestData['dashboard_logo_text'] = $commonsetting->dashboard_logo_text??"";
            }//end if else.     
            
            $commonsetting->update($requestData);

            return redirect('commonSetting/common-setting')->with('flash_message', 'CommonSetting updated!');
        }
        return response(view('403'), 403);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $model = str_slug('commonsetting','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            CommonSetting::destroy($id);

            return redirect('commonSetting/common-setting')->with('flash_message', 'CommonSetting deleted!');
        }
        return response(view('403'), 403);

    }
}
