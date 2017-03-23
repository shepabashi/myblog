<?php

namespace App;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Symfony\Component\Finder\SplFileInfo;

class Media extends Model
{
    /**
     * @param Request $request
     * @return bool
     */
    public static function fileSave(Request $request)
    {
        $file = $request->file('media');
        $parent = Carbon::now()->format('Y/m');

        if ($request->has('file_name')) {
            $path = $file->storeAs($parent, $request->input('file_name'));
        } else {
            $path = $file->store($parent);
        }

        $splFileInfo = new \SplFileInfo($path);
        $file_name = $splFileInfo->getFilename();

        $media = new Media();
        $media->file_name = $file_name;
        $media->path = $path;
        $media->alt = $request->input('alt');
        $media->mime_type = $file->getMimeType();

        $media->save();
    }
}
