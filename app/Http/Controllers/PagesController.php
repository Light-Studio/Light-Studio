<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Session;
use Mail;
use App;
use App\Project;
use App\Category;
use App\Service;
use App\Team;
use Lang;
class PagesController extends Controller {


    public function getIndex() {
        $services = Service::orderBy('created_at')->get();
        $teams = Team::orderBy('created_at')->get();
        return view('index')->withServices($services)->withTeams($teams);
    }

    public function getIndexVoyager() {
        return redirect('/');
    }

    public function getTranslationsVoyager() {
        return redirect('/translations');
    }



     public function postContact(Request $request) {

         $this->validate($request, [
                'name'      => 'required|min:3',
                'email'     => 'required|email',
                'phone'     => 'required',
                'subject'   => 'required|min:3',
                'message'   => 'required',
         ]);

         $data = array('name'        => $request->name,
                       'email'       => $request->email,
                       'phone'       => $request->phone,
                       'subject'     => $request->subject,
                       'bodyMessage' => $request->message,
                      );

         Mail::send('emails.contact', $data, function($message) use ($data){
                $message->from($data['email']);
                $message->to('info@light-studio.ca');
                $message->subject($data['subject']);


         });

         Session::flash('success', Lang::get('main.contact_form.success'));
         return Redirect::to(URL::previous() . "#contact");
         }

       public function getProjects() {
        $projects = Project::orderBy('created_at', 'desc')->get();
        $categories = Category::all();

        return view('test.projects')->withProjects($projects)->withCategories($categories);
    }
 }
