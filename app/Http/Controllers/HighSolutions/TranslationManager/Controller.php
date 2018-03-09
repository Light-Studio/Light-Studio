<?php

namespace App\Http\Controllers\HighSolutions\TranslationManager;

use HighSolutions\TranslationManager\Service;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use TCG\Voyager\Facades\Voyager;

class Controller extends BaseController
{


use AuthorizesRequests;

    /** @var \HighSolutions\TranslationManager\Service  */
    protected $service;

    public function __construct()
    {
        $this->service = new Service;
    }

    public function getIndex()
    {   Voyager::canOrFail('browse_translation');
         return view('translation-manager::index', [
            'locales' => $this->service->loadLocales(),
            'groups' => $this->service->getGroups(),
            'highlighted' => $this->service->getHighlighted(),
            'canManage' => $this->service->canManage(),
            'group' => null,
        ]);
    }

    public function getView($group = null)
    {   Voyager::canOrFail('browse_translation');
        $group = $this->service->getGroup('translations/view/');

        return view('translation-manager::show', [
            'translations' => $this->service->getTranslations($group),
            'locales' => $this->service->loadLocales(),
            'groups' => $this->service->getGroups(),
            'highlighted' => $this->service->getHighlighted(),
            'canManage' => $this->service->canManage(),
            'group' => $group,
            'currentLocale' => config('app.locale'),
            'deleteEnabled' => $this->service->getConfig('delete_enabled'),
        ]);
    }

    public function postEditAndExport(Request $request)
    {   Voyager::canOrFail('browse_translation');
       $this->service->update($request->input('name'), $request->input('value'));

        return [
            'success' => true,
        ];
    }

    public function postAdd(Request $request)
    {   Voyager::canOrFail('browse_translation');
        $group = $this->service->getGroup('translations/add/');

        $this->service->add($group, $request->input('keys'));

        return redirect()->back();
    }

    public function postEdit(Request $request)
    {   Voyager::canOrFail('browse_translation');
        $group = $this->service->getGroup('translations/edit/');

        if(in_array($group, $this->service->getConfig('exclude_groups')))
            return [
                'success' => false,
                'msg' => 'File is excluded',
            ];

        $this->service->edit($group, $request->input('name'), $request->input('value'));

        return [
            'success' => true,
        ];
    }

    public function postDelete()
    {   Voyager::canOrFail('browse_translation');
        list($key, $group) = $this->service->getDeleteParams(func_get_args());

        if(in_array($group, $this->service->getConfig('exclude_groups')) ||
            !$this->service->getConfig('delete_enabled'))
            return [
                'success' => false,
                'msg' => 'Removing key from this file is forbidden.',
            ];

        $this->service->remove($group, $key);

        return [
            'success' => true,
        ];
    }

    public function postImport(Request $request)
    {   Voyager::canOrFail('browse_translation');
        $this->service->import($request->input('replace'));

        return [
            'success' => true,
        ];
    }

    public function postFind()
    {   Voyager::canOrFail('browse_translation');
        $this->service->findTranslations();

        return [
            'success' => true,
        ];
    }

    public function postClean(Request $request)
    {   Voyager::canOrFail('browse_translation');
        if($request->input('reset') == false)
            $this->service->cleanEmpty();
        else
            $this->service->removeAll();

        return [
            'success' => true,
        ];
    }

    public function postPublish()
    {   Voyager::canOrFail('browse_translation');
        $group = $this->service->getGroup('translations/publish/');

        $this->service->publish($group);

        return [
            'success' => true,
        ];
    }

}
