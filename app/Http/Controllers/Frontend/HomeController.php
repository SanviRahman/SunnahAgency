<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Course;
use App\Models\CourseBundle;
use App\Models\Service;
use App\Models\Team;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home_Index()
    {
        // $courses = Course::where('status', 1)->get();
        // $courses = $courses->shuffle();
        // $courses = $courses->take(4);

        // $courses_Latest = Course::where('status', 1)->orWhere('status', 2)->inRandomOrder()->latest('id')->limit(8)->get();
        // $courses_Beginner = Course::where('status', 1)->orWhere('status', 2)->where('skill_requirements', 'Beginner')->inRandomOrder()->latest('id')->limit(8)->get();
        // $courses_Intermediate = Course::where('status', 1)->orWhere('status', 2)->where('skill_requirements', 'Intermediate')->inRandomOrder()->latest('id')->limit(8)->get();
        // $courses_Advanced = Course::where('status', 1)->orWhere('status', 2)->where('skill_requirements', 'Advanced')->inRandomOrder()->latest('id')->limit(8)->get();
        // $courses_Expert = Course::where('status', 1)->orWhere('status', 2)->where('skill_requirements', 'Expert')->inRandomOrder()->latest('id')->limit(8)->get();

        $about = About::first();
        $banner = Banner::first();
        
        $course = Course::count();
        $courses = Course::where('status', 1)->inRandomOrder()->limit(3)->get();

        $services = Service::where('status', 1)->get();
        $services = $services->shuffle();
        $services = $services->take(14);

        $teams = Team::where('status', 1)->get();
        $teams = $teams->shuffle();
        $teams = $teams->take(3);

        $blogs = Blog::where('status', 1)->get();
        $blogs = $blogs->shuffle();
        $blogs = $blogs->take(9);

        // dd($courses_Beginner);

        return view('frontend.home.index', compact(
            'about',
            'banner',
            'course',
            'courses',
            'services',
            'teams',
            'blogs',
        ));
    }
}
