<?php

namespace App\Http\Controllers\FE;

use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Order;
use App\Models\Province;
use App\Models\Ward;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->get();
        $provinces = Province::orderby("administrative_region_id", "asc")
            ->select('code', 'full_name_en')
            ->get();
        return view('profile.profile', [
            // return view('profile.edit', [
            'user' => $user,
            'orders' => $orders,
            'provinces' => $provinces
        ]);
    }

    public function select_delivery(Request $request)
    {
        $data = $request->all();
        if ($data['action']) {
            $output = '';
            if ($data['action'] == "city") {
                $districts = District::orderby("full_name_en", "asc")
                    ->where('province_code', 'like', $data['code'])
                    ->get();

                foreach ($districts as $key => $district) {
                    $output .= '<option value="' . $district->code . '">' . $district->full_name_en . '</option>';
                    //<option value="{{$item->code}}">{{$item->full_name_en}}</option>
                }
            } else {
                $wards = Ward::orderby("full_name_en", "asc")
                    ->where('district_code', 'like', $data['code'])
                    ->get();
                foreach ($wards as $ward) {
                    $output .= '<option value="' . $ward->code . '">' . $ward->full_name_en . '</option>';
                }
            }
            echo $output;
        }
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $info = $request->all();

        $image_path = 'assets/img/upload/user';
        if (!file_exists($image_path)) {
            mkdir($image_path, 0777, true);
        }
        $path = 'assets/img/upload/user/' . $request->avatar;
        if ($request->hasFile('avatar')) {
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('avatar');
            // $ext = $file->getClientOriginalExtension();
            // if ($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png') {
            //     return redirect('/club/create');
            // }
            $imageFile = trim($file->getClientOriginalName());
            $file->move($image_path, $imageFile);
            $info['avatar'] = $imageFile;
        }

        if (isset($request->city) && isset($request->district) && isset($request->ward)) {
            try {
                $city = Province::where('code', $request->city)->first();
                $district = District::where('code', $request->district)->first();
                $ward = Ward::where('code', $request->ward)->first();
                $info['city'] = $city->full_name_en ?? '';
                $info['district'] = $district->full_name_en ?? '';
                $info['ward'] = $ward->full_name_en ?? '';
            } catch (\Throwable $th) {
                throw $th;
            }
        }

        $request->user()->profile = $info;

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();
        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}