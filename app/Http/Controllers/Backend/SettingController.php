<?php

namespace App\Http\Controllers\Backend;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ApperanceUpdateRequest;
use App\Http\Requests\MailSettingUpdate;
use App\Http\Requests\SettingUpdateRequest;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Storage;
use setEnvValue;

class SettingController extends Controller
{
    /** General Setting **/
    public function general()
    {
       return view('backend.pages.setting.general_setting');
    }

    public function generalUpdate(SettingUpdateRequest $request)
    {
    //    dd($request->all());

        Setting::updateOrCreate(
            ['name' => 'site_title'],
            ['value' => $request->site_title],
        );
        Setting::updateOrCreate(
            ['name' => 'site_address'],
            ['value' => $request->site_address],
        );
        Setting::updateOrCreate(
            ['name' => 'site_phone_number'],
            ['value' => $request->site_phone_number],
        );
        Setting::updateOrCreate(
            ['name' => 'site_facebook_link'],
            ['value' => $request->site_facebook_link],
        );
        Setting::updateOrCreate(
            ['name' => 'site_twitter_link'],
            ['value' => $request->site_twitter_link],
        );
        Setting::updateOrCreate(
            ['name' => 'site_instagram_link'],
            ['value' => $request->site_instagram_link],
        );
        Setting::updateOrCreate(
            ['name' => 'site_description'],
            ['value' => $request->site_description],
        );

        Toastr::success('General Setting Update');
        return redirect()->back();
    }


    /** Apperance Setting **/
    public function apperance()
    {
       return view('backend.pages.setting.apperance_setting');
    }

    public function apperanceUpdate(ApperanceUpdateRequest $request)
    {
    //    dd($request->all());

        Setting::updateOrCreate(
            ['name' => 'bg_color'],
            ['value' => $request->bg_color],
        );

        if ($request->hasFile('logo_image')) {
            if (setting('logo_image') !=null) {
                $this->deleteOldFile(setting('logo_image'));
            }
            Setting::updateOrCreate(
                ['name' => 'logo_image'],
                ['value' => Storage::putFileAs('public', $request->file('logo_image'), 'logo_image.jpg')],
            );
        }
        if ($request->hasFile('favicon_image')) {
            if (setting('favicon_image') !=null) {
                $this->deleteOldFile(setting('favicon_image'));
            }
            Setting::updateOrCreate(
                ['name' => 'favicon_image'],
                ['value' => Storage::putFileAs('public', $request->file('favicon_image'), 'favicon_image.jpg')],
            );
        }

        Toastr::success('apperance Setting Update');
        return redirect()->back();
    }

    /** mail Setting **/
    public function mail()
    {
       return view('backend.pages.setting.mail_setting');
    }

    public function mailUpdate(MailSettingUpdate $request)
    {
    //    dd($request->all());

        Setting::updateOrCreate(
            ['name' => 'mail_mailer'],
            ['value' => $request->mail_mailer],
        );

        Setting::updateOrCreate(
            ['name' => 'mail_host'],
            ['value' => $request->mail_host],
        );

        Setting::updateOrCreate(
            ['name' => 'mail_port'],
            ['value' => $request->mail_port],
        );

        Setting::updateOrCreate(
            ['name' => 'mail_username'],
            ['value' => $request->mail_username],
        );

        Setting::updateOrCreate(
            ['name' => 'mail_password'],
            ['value' => $request->mail_password],
        );
        Setting::updateOrCreate(
            ['name' => 'mail_encryption'],
            ['value' => $request->mail_encryption],
        );
        Setting::updateOrCreate(
            ['name' => 'mail_form_address'],
            ['value' => $request->mail_form_address],
        );

        // // update env file
        // $this->setEnvValue('MAIL_MAILER', $request->mail_mailer);
        // $this->setEnvValue('MAIL_HOST', $request->mail_host);
        // $this->setEnvValue('MAIL_PORT', $request->mail_port);
        // $this->setEnvValue('MAIL_USERNAME', $request->mail_username);
        // $this->setEnvValue('MAIL_PASSWORD', $request->mail_password);
        // $this->setEnvValue('MAIL_ENCRYPTION', $request->mail_encryption);
        // $this->setEnvValue('MAIL_FROM_ADDRESS', $request->mail_form_address);

        Toastr::success('apperance Setting Update');
        return redirect()->back();
    }

    private function deleteOldFile($path)
    {
       Storage::disk('public')->delete($path);
    }

}
