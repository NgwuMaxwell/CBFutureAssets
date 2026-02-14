<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;
use App\Models\SettingsCont;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class AppSettingsController extends Controller
{

    // Return view
    public function appsettingshow()
    {
        $live_timezones = timezone_identifiers_list();
        include 'currencies.php';
        return view('admin.Settings.AppSettings.show', [
            'title' => 'Website information settings',
            'timezones' => $live_timezones,
            'currencies' => $currencies,
            'timezone' => config('app.timezone'),
            'settings' => Settings::where('id', '=', '1')->first(),
        ]);
    }

    public function updateTheme(Request $request){
        $this->validate($request, [
            'theme' => 'mimes:zip|max:30000',
        ]);

        $file = $request->file('theme');
        //dd($file);

        $settings = Settings::find(1);


        if ($file->extension() != 'zip') {
            return redirect()->back()->with('message', 'Please upload a zip file');
        }

        // read the content of the zip file
        $zip = new \ZipArchive();
        $open = $zip->open($file->getRealPath());

        //get theme name without the .zip extension
        $themeName = substr($file->getClientOriginalName(), 0, -4);

        if ($open === TRUE) {
            // extract the zip file to the themes folder
            $zip->extractTo(base_path("themes/{$themeName}"));
            //$zip->extractTo(public_path("themes/{$themeName}"));
            $zip->close();

            //extract the views file to the resources folder
            $zip->open(base_path("themes/{$themeName}/views.zip"));
            //$zip->open(public_path("themes/{$themeName}/views.zip"));
            $zip->extractTo(resource_path("views"));
            $zip->close();

            // add the theme to the database
            $settings->theme = $themeName;
            $settings->save();
            $this->clearCache();
            return redirect()->back()->with('success', 'Theme uploaded successfully For more script like this joinour telegram with https://t.me/+AU0r-kLCuto5M2Q0');
        }

        return redirect()->back()->with('message', 'There was an error uploading the theme, please try again.For more or issue script like this join our telegram with https://t.me/+AU0r-kLCuto5M2Q0');

    }

    public function clearCache()
    {
         //clear the cache with Artisan command
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
    }

    // update wensite information
    public function updatewebinfo(Request $request)
    {
        $this->validate($request, [
            'logo' => 'mimes:jpg,jpeg,png|max:500|image',
            'favicon' => 'mimes:jpg,jpeg,png,ico|max:500',
        ]);

        $settings = Settings::where('id', '=', '1')->first();

        if ($request->hasfile('logo')) {
            $file = $request->file('logo');
            Storage::disk('public')->delete($settings->logo);
            $path = $file->store('photos', 'public');
        } else {
            $path  = $settings->logo;
        }

        if ($request->hasfile('favicon')) {
            $favfile = $request->file('favicon');
            Storage::disk('public')->delete($settings->favicon);
            $pathfav = $favfile->store('photos', 'public');
        } else {
            $pathfav = $settings->favicon;
        }



        Settings::where('id', '1')
            ->update([
                'newupdate' => $request['update'],
                'site_name' => $request['site_name'],
                'description' => $request['description'],
                'keywords' => $request['keywords'],
                'timezone' => $request['timezone'],
                'site_title' => $request['site_title'],
                'install_type' => $request['install_type'],
                'logo' => $path,
                'merchant_key' => $request->merchant_key,
                'favicon' => $pathfav,
                'tawk_to' => strip_tags($request['tawk_to']),
                'site_address' => $request['site_address'],
                'welcome_message' => $request->welcome_message,
                'whatsapp' => $request->whatsapp,
                'gasfee' => $request->gasfee,
                'trade_message' => $request->trade_message,

            ]);

        $moreset = SettingsCont::find(1);
        $moreset->purchase_code = $request->purchase_code;
        $moreset->save();

        return redirect()->back()->with('success', 'Settings Saved successfully For more script like this join our telegram with https://t.me/+AU0r-kLCuto5M2Q0');
    }



    public function updatepreference(Request $request)
    {

        if ($request->return_capital == 'true') {
            $return_capital = true;
        } else {
            $return_capital = false;
        }

        Settings::where('id', 1)->update([
            'contact_email' => $request['contact_email'],
            'currency' => $request['currency'],
            's_currency' => $request['s_currency'],
            'weekend_trade' => $request['weekend_trade'],
            'location' => $request['location'],
            'trade_mode' => $request['trade_mode'],
            'enable_verification' => $request['enail_verify'],
            'google_translate' => $request['googlet'],
            'enable_kyc' => $request['enable_kyc'],
            'enable_kyc_registration' => $request['enable_kyc_registration'],
            'captcha' => $request['captcha'],
            'enable_with' => $request['withdraw'],
            'return_capital' => $return_capital,
            'enable_social_login' => $request['social'],
            'enable_annoc' => $request['annouc'],
            'redirect_url' => $request->redirect_url,
            'should_cancel_plan' => $request->should_cancel_plan,
        ]);
        return response()->json(['status' => 200, 'success' => 'Settings Saved successfully For more script like this joinour telegram with https://t.me/+AU0r-kLCuto5M2Q0']);
    }

    // Update email preference
    public function updateemail(Request $request)
    {
        Settings::where('id', ' 1')
            ->update([
                'mail_server' => $request['server'],
                'emailfrom' => $request['emailfrom'],
                'emailfromname' => $request['emailfromname'],
                'smtp_host' => $request['smtp_host'],
                'smtp_port' => $request['smtp_port'],
                'smtp_encrypt' => $request['smtp_encrypt'],
                'smtp_user' => $request['smtp_user'],
                'smtp_password' => $request['smtp_password'],
                'google_id' => $request['google_id'],
                'google_secret' => $request['google_secret'],
                'google_redirect' => $request['google_redirect'],
                'capt_secret' => $request['capt_secret'],
                'capt_sitekey' => $request['capt_sitekey'],
            ]);
        return response()->json(['status' => 200, 'success' => 'Settings Saved successfully For more script like this joinour telegram with https://t.me/+AU0r-kLCuto5M2Q0']);
        //return redirect()->back()->with('message', 'Action Sucessful');
    }
}
