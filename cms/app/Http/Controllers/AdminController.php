<?php

namespace App\Http\Controllers;

use App\Mail\ReplayContactMail;
use App\Models\Card;
use App\Models\ContactNotification;
use App\Models\LandingPage;
use App\Models\Payment;
use App\Models\Reply;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index ()
    {
        return view('dashboard');
    }

    public function landingpages (): View
    {
        $landing_pages = LandingPage::paginate(3);
        foreach($landing_pages as $landing_page){
            $landing_page->title = json_decode($landing_page->title, true);
            $landing_page->description = json_decode($landing_page->description, true);
        }
        return view('pages.landingPages', compact('landing_pages'));
    }

    public function toggle_landing_page (Request $request)
    {
        $landing_page = LandingPage::findOrFail($request->input('id_landingpage'));
        $landing_page->etat = $landing_page->etat === 1 ? 0 : 1;
        $landing_page->save();
        return redirect()->back()->with('succes', "The landing page has ". $landing_page->etat === 1 ? "displayed" : "hidden" ." seccessfuly");
    }

    public function ManageLP ($id)
    {
        $landing_page = LandingPage::with('sections')->findOrFail($id);
        $landing_page->title = json_decode($landing_page->title, true);
        $landing_page->description = json_decode($landing_page->description, true);

        $sections = $landing_page->sections;

        return view('pages.manage_lp', compact('landing_page', 'sections'));
    }

    public function ManageSection($id)
    {
        $section = Section::with('cards')->findOrFail($id);
        $section->title = json_decode($section->title, true);
        $section->subtitle1 = json_decode($section->subtitle1, true);
        $section->subtitle2 = json_decode($section->subtitle2, true);
        $section->description = json_decode($section->description, true);

        $cards = $section->cards;
        foreach($cards as $card){
            $card->title = json_decode($card->title, true);
        }

        return view('pages.manage_section', compact('section', 'cards'));
    }

    public function ManageCards ($id)
    {
        $card = Card::findOrFail($id);
        $card->title = json_decode($card->title, true);
        return view('pages.manage_card', compact('card'));
    }

    public function users ()
    {
        return view('pages.users');
    }

    public function updateLP(Request $request, $id)
    {
        $landingPage = LandingPage::findOrFail($id);

        $landingPage->name = $request->input('name');
        $landingPage->link = $request->input('link');
        $landingPage->price = $request->input('price');

        $title = [
            'fr' => $request->input('title_fr'),
            'en' => $request->input('title_en'),
        ];
        $description = [
            'fr' => $request->input('description_fr'),
            'en' => $request->input('description_en'),
        ];

        $landingPage->title = json_encode($title);
        $landingPage->description = json_encode($description);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $landingPage->image = $file->storeAs('images', $filename);
        }

        $landingPage->save();

        return redirect()->back()->with('success', 'Landing page updated successfully.');
    }

    public function updateSection(Request $request, $id)
    {
        $section = Section::findOrFail($id);

        $section->section_name = $request->input('section_name');

        $title = [
            'fr' => $request->input('title_fr'),
            'en' => $request->input('title_en'),
        ];
        $subtitle1 = [
            'fr' => $request->input('subtitle1_fr'),
            'en' => $request->input('subtitle1_en'),
        ];
        $subtitle2 = [
            'fr' => $request->input('subtitle2_fr'),
            'en' => $request->input('subtitle2_en'),
        ];
        $description = [
            'fr' => $request->input('description_fr'),
            'en' => $request->input('description_en'),
        ];

        $section->title = json_encode($title);
        $section->subtitle1 = json_encode($subtitle1);
        $section->subtitle2 = json_encode($subtitle2);
        $section->description = json_encode($description);

        if ($request->hasFile('article_photo')) {
            $file = $request->file('article_photo');
            $filename = $file->getClientOriginalName();
            $section->article_photo = $file->storeAs('images', $filename);
        }

        $section->save();

        return redirect()->back()->with('success', 'Section updated successfully.');
    }

    public function updateCard(Request $request, $id)
    {
        $card = Card::findOrFail($id);

        $title = [
            'fr' => $request->input('title_fr'),
            'en' => $request->input('title_en'),
        ];

        $description = [
            'fr' => str_replace("\n", ';', $request->input('description_fr')),
            'en' => str_replace("\n", ';', $request->input('description_en')),
        ];

        $card->title = json_encode($title);
        $card->description = json_encode($description);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $card->image = $file->storeAs('images', $filename);
        }

        $card->save();

        return redirect()->back()->with('success', 'Card updated successfully.');
    }

    public function duplicateLP(Request $request, $id)
    {
        $landing_page = LandingPage::with('sections.cards')->findOrFail($id);

        $newLandingPage = $landing_page->replicate();

        $newLandingPage->link = $request->input('link');

        $newLandingPage->save();

        foreach ($landing_page->sections as $section) {
            $newSection = $section->replicate();
            $newSection->id_landing_page = $newLandingPage->id;
            $newSection->save();

            foreach ($section->cards as $card) {
                $newCard = $card->replicate();
                $newCard->id_section = $newSection->id;
                $newCard->save();
            }
        }

        return redirect()->back()->with('success', 'Landing page duplicated successfully!');
    }

    public function deleteLP($id)
    {
        $landingPage = LandingPage::find($id);

        if (!$landingPage) {
            return redirect()->back()->with('error', 'Landing page not found!');
        }

        $landingPage->delete();

        return redirect()->back()->with('success', 'Landing page deleted successfully!');
    }

    public function getPayments(): View
    {
        $payments = Payment::with('client', 'landingPage')->paginate(4);
        return view('pages.manage_payment', compact('payments'));
    }

    public function getContactNotifications(): View
    {
        $notifications = ContactNotification::paginate(4);
        return view('pages.mails.contact_notifications', compact('notifications'));
    }

    public function manageContactNotification($id_notification){
        $notification = ContactNotification::findOrFail($id_notification);
        $replies = Reply::where('id_notification', $notification->id)->orderBy('created_at')->get();
        return view('pages.mails.contact_notification_manage', compact('notification', 'replies'));
    }

    public function contactReplay(Request $request){
        $notification = ContactNotification::findOrFail($request->input('id_notification'));
        $data = [
            "email" => "amakdoufali6@gmail.com",
            "mailTo" => $notification->email,
            "nom" => "AMAKDOUF ALI",
            "message" => $request->input('message'),
            "date_time" => date('d/m/y')
        ];

        $notification->status = 1;

        $reply = new Reply();
        $reply->id_notification = $notification->id;
        $reply->message = $request->input('message');

        Mail::to($notification->email)->send(new ReplayContactMail($data));

        $notification->save();
        $reply->save();

        return redirect()->back()->with('success', 'The replay was sent successfully!');
    }

    public function deleteNotification(Request $request){
        ContactNotification::destroy($request->input('id_notification'));

        return redirect()->back()->with('success', 'The notification message has deleted successfully!');
    }

}
