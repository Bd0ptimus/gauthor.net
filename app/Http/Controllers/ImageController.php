<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
//Services
use App\Services\ImageService;

class ImageController extends BaseController
{
    protected $imageService;
    public function __construct(ImageService $imageService){
        $this->imageService = $imageService;
    }

    public function changeStatus(Request $request){
        try{
            $response = $this->imageService->changeImageStatus(request('imageId'), request('status'));
            if($response==null){
                return response()->json(['error' => 1, 'msg' => 'Đã có lỗi']);
            }
        }catch(\Exception $e){
            return response()->json(['error' => 1, 'msg' => 'Đã có lỗi']);
        }
        return response()->json(['error' => 0, 'msg' => 'Đã đổi status thành công', 'data' => $response ]);
    }
}
