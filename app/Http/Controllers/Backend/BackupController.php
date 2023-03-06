<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class BackupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('index-role');

        $disk = Storage::disk(config('backup.backup.destination.disks')[0]);  // local disk  'backup.backup.destination.disks')
        $files = $disk->files(config('backup.backup.name'));  // env('APP_NAME')

        $backups = [];  // .zip
        foreach ($files as $key => $file) {
            if (substr($file, -4 == '.zip' && $disk->exists($file))) {
                $file_name = str_replace(config("backup.backup.name").'/','',$file);
                $backups[] = [
                    'file_path' => $file,
                    'file_name' => $file_name,
                    'file_size' => $this->byteToHuman($disk->size($file)),
                    'created_at' => Carbon::parse($disk->lastModified($file))->diffForHumans(),
                    'download_link' => '#',
                ];
            }
        }
        // reverse the backups, so that latest one would come first
        $backups = array_reverse($backups);
        return view('backend.pages.backup.index', compact('backups'));
    }

    /**
     * Convert bytes to human readable
     * @param $bytes
     * @return string
     */
    public function byteToHuman($bytes)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];
        for ($i=0; $bytes > 1024 ; $i++) {
            $bytes/=1024;
        }
        return round($bytes, 2).' '.$units[$i];
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('index-role');
        //Start the process of backup create
        Artisan::call('backup:run');  //  databesh & file download
        // Artisan::call('backup:run --only-db');  // only databesh download
        dd(Artisan::output());
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($file_name)
    {
        // dd($file_name);
        Gate::authorize('index-role');
        $disk = Storage::disk(config('backup.backup.destination.disks')[0]);  // local disk  'backup.backup.destination.disks')
        $files = $disk->files(config('backup.backup.name'));  // env('APP_NAME')

        if ($disk->exists(config('backup.backup.name').'/'.$file_name)) {
           $disk->delete(config('backup.backup.name').'/'.$file_name);

           Toastr::success('Backup Delete Successfull');
           return redirect()->back();
        }

    }

    public function backup_download($file_name)
    {
        Gate::authorize('index-role');
        $file = config('backup.backup.name').'/'.$file_name;
        $disk = Storage::disk(config('backup.backup.destination.disks')[0]); // local disk

        if ($disk->exists($file)) {
            $fs = Storage::disk(config('backup.backup.destination.disks')[0])->getDriver();
            $stream = $fs->readStream($file);
            return \Response::stream(function() use($stream){
                fpassthru($stream);
            }, 200, [
                'content-Type' => '.zip',
                'content-Length' => $disk->size($file),
                'content-disposition' => "attachment; filename=\"". basename($file). "\"",
            ]);
        }


    }
}
