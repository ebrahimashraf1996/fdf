<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\AboutUsCard;
use App\Models\Commitment;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Goal;
use App\Models\GoalPhoto;
use App\Models\MainSectionItem;
use App\Models\Service;
use App\Models\WhyUsItem;
use App\Models\WhyUsReason;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $home_section = MainSectionItem::selection()->active()->first();

        $about_us_section = About::selection()->active()->first();

        $about_us_cards = AboutUsCard::active()->selection()->get();

        $gallery = Gallery::active()->selection()->get();

        $goals = Goal::selection()->active()->get();

        $goal_photo = GoalPhoto::selection()->active()->first();

        $commit_items = Commitment::selection()->active()->get();

        $services = Service::selection() ->active()->get();

        $why_us = WhyUsItem::selection()->active()->first();

        $why_us_reasons = WhyUsReason::selection() ->active()->get();

        $contacts = Contact::selection() ->active()->get();

        return view('front.index', compact('home_section',
            'about_us_section',
            'about_us_cards',
            'gallery',
            'goals',
            'goal_photo',
        'commit_items',
        'services',
        'why_us',
        'why_us_reasons',
        'contacts'
        ));
    }
}
