<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Profile\ProfileResource;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileContoller extends Controller
{
    public function index()
    {
        $profiles = Profile::all();
        $profiles = ProfileResource::collection($profiles)->resolve();

        return inertia("Admin/Profiles/Index", compact("profiles"));
    }

    public function show(Profile $profile)
    {
        $profile = ProfileResource::make($profile)->resolve();
        return inertia("Admin/Profiles/Show", compact("profile"));
    }
}
