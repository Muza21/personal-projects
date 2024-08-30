<?php

namespace App\Controllers;

use laramz\mvcphp\Application;
use laramz\mvcphp\Controller;
use laramz\mvcphp\Request;
use laramz\mvcphp\Response;
use App\Models\ContactForm;

class SiteController extends Controller
{
    public function home()
    {
        $params = [
            'name' => "the muza"
        ];

        return $this->render('home', $params);
    }


    public function contact(Request $request, Response $response)
    {
        $contact = new ContactForm();
        if ($request->isPost()) {
            $contact->loadData($request->getBody());
            if ($contact->validate() && $contact->send()) {
                Application::$app->session->setFlash('success', 'Thanks for contacting us.');
                return $response->redirect('/contact');
            }
        }
        return $this->render('contact', [
            'model' => $contact
        ]);
    }
}
