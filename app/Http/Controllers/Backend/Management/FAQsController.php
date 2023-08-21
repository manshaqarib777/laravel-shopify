<?php

namespace App\Http\Controllers\Backend\Management;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use App\Models\marque;
use App\Models\Setting;
use App\Models\Translation;
use App\Rules\RuleFAQCategoryExists;
use Illuminate\Http\Request;
use Session;
use Validator;

class FAQsController extends Controller
{
    public function __construct()
    {
        $this->middleware('backend');
        $this->middleware('permission:manage_faqs');
    }

    public function deleteFAQ($id)
    {
        FAQ::where('id', $id)->delete();

        return redirect()->route('backend-management-faqs');
    }

    public function editFAQForm(Request $request)
    {
        if ($request->getMethod() == 'POST') {
            if ($request->get('faq_edit_id')) {
                $faq = FAQ::where('id', $request->input('faq_edit_id'))->get()->first();

                if ($faq != null) {
                    if ($request->get('translation_lng') && strlen($request->get('translation_lng'))) {
                        $lng = strtolower($request->input('translation_lng'));
                        foreach (['question', 'answer'] as $keyword) {
                            $translation = Translation::where([
                                ['lang', '=', $lng],
                                ['type', '=', 'faq'],
                                ['keyword', '=', $keyword],
                                ['entry_id', '=', $faq->id],
                            ])->get()->first();

                            if ($translation == null) {
                                Translation::create([
                                    'lang' => $lng,
                                    'entry_id' => $faq->id,
                                    'keyword' => $keyword,
                                    'value' => $request->input('faq_edit_' . $keyword) ?? '',
                                    'type' => 'faq',
                                ]);
                            } else {
                                $translation->update([
                                    'value' => $request->input('faq_edit_' . $keyword) ?? '',
                                ]);
                            }
                        }

                        return redirect()->route('lang-edit-faq', [$lng, $faq->id])->with([
                            'successMessage' => __('backend/main.changes_successfully'),
                        ]);
                    }

                    $validator = Validator::make($request->all(), [
                        'faq_edit_question' => 'required|max:255',
                        'faq_edit_answer' => 'required|max:5000',
                        'faq_edit_category' => new RuleFAQCategoryExists(),
                    ]);

                    if (!$validator->fails()) {
                        $question = $request->input('faq_edit_question');
                        $answer = $request->input('faq_edit_answer');
                        $category = $request->input('faq_edit_category');
                        $ordering = $request->input('faq_edit_ordering') ?? 1;

                        $faq->update([
                            'answer' => $answer,
                            'question' => $question,
                            'category_id' => $category,
                            'ordering' => $ordering,
                        ]);

                        return redirect()->route('backend-management-faq-edit', $faq->id)->with([
                            'successMessage' => __('backend/main.changes_successfully'),
                        ]);
                    }

                    $request->flash();

                    return redirect()->route('backend-management-faq-edit', $faq->id)->withErrors($validator)->withInput();
                }
            }
        }

        return redirect()->route('backend-management-faqs');
    }

    public function showFAQEditPageLang($lang, $id)
    {
        if (!in_array(strtolower($lang), Setting::getAvailableLocales())) {
            return redirect()->route('backend-management-faqs');
        }

        return $this->showFAQEditPage($id, $lang);
    }

    public function showFAQEditPage($id, $lang = null)
    {
        $faq = FAQ::where('id', $id)->get()->first();

        if ($faq == null) {
            return redirect()->route('backend-management-faqs');
        }

        return view('backendV2.management.faqs.edit', [
            'faq' => $faq,
            'lang' => $lang,
            'managementPage' => true,
        ]);
    }

    public function addFAQForm(Request $request)
    {
        if ($request->getMethod() == 'POST') {
            $validator = Validator::make($request->all(), [
                'faq_add_question' => 'required|max:255',
                'faq_add_answer' => 'required|max:5000',
                'faq_add_category' => new RuleFAQCategoryExists(),
            ]);

            if (!$validator->fails()) {
                $question = $request->input('faq_add_question');
                $answer = $request->input('faq_add_answer');
                $category = $request->input('faq_add_category');
                $ordering = $request->input('faq_add_ordering') ?? 1;

                FAQ::create([
                    'answer' => $answer,
                    'question' => $question,
                    'category_id' => $category,
                    'ordering' => $ordering,
                ]);

                return redirect()->route('backend-management-faq-add')->with([
                    'successMessage' => __('backend/main.added_successfully'),
                ]);
            }

            $request->flash();

            return redirect()->route('backend-management-faq-add')->withErrors($validator)->withInput();
        }

        return redirect()->route('backend-management-faq-add');
    }

    public function showFAQAddPage(Request $request)
    {
        return view('backendV2.management.faqs.add', [
            'managementPage' => true,
        ]);
    }

    public function showFAQsPage(Request $request, $pageNumber = 0)
    {
        $faqs = FAQ::orderByDesc('created_at')->paginate(10, ['*'], 'page', $pageNumber);

        if ($pageNumber > $faqs->lastPage() || $pageNumber <= 0) {
            return redirect()->route('backend-management-faqs-with-pageNumber', 1);
        }

        return view('backendV2.management.faqs.list', [
            'faqs' => $faqs,
            'managementPage' => true,
        ]);
    }

    public function marque(Request $request)
    {
        $marque = marque::all();
        return view("backendV2.management.faqs.marque", ["marque" => $marque]);
    }


    public function marqueEdit(Request $request)
    {
        $marque = marque::find($request->id);

        return view('backendV2.management.faqs.marqueEdit', [
            "marque" => $marque,
            'managementPage' => true,
        ]);
    }

    public function marqueDelete(Request $request)
    {
        $marque = marque::find($request->id);
        $deleteQuery = $marque->delete();

        if ($deleteQuery) {
            return redirect()->route('backend-management-marque')->with("success", "Marque Successfuly Deleted...");
        } else {
            return redirect()->route('backend-management-marque')->with("error", "Oops Something wen,t wrong...");
        }
    }

    public function marqueUpdate(Request $request)
    {
        $updateData = ["marque_text" => $request->marque_edit_text];
        marque::where("id", $request->id)->update($updateData);
        return redirect()->route('backend-management-marque')->with("success", "Marque Successfuly Updated...");
        // return view("backendV2.management.faqs.marque",["marque"=>$marque])->with("success","Marque Successfuly Updated...");
    }

    public function marqueAdd(Request $request)
    {
        return view("backendV2.management.faqs.marqueAdd");
    }

    public function marqueAdding(Request $request)
    {


        $marque = new marque;
        $marque->marque_text = $request->marque_text;
        $marque->banner_img = '';
        $marque->proflie_img = '';
        $marque->profile_names = '';
        if ($request->marque_text != '' || $request->banner_img == '') {

            $query = $marque->save();
            if ($query) {
                return redirect()->route('backend-management-marque')->with("success", "Marque Successfuly Added...");
            } else {
                return redirect()->route('backend-management-marque-add')->with("error", "Something wen,t wrong...");
            }
        } else if ($request->banner_img != '' || $request->marque_text != '') {

            $marques = $request->marque_text;
            if ($marques == '') {
                $marques1 = '';
            } else {
                $marques1 = $request->marque_edit_text;
            }
            $updateData = ["marque_text" => $marques1, "banner_img" => $request->banner_img, "proflie_img" => $request->proflie_img, "profile_names" => $request->profile_names];
            marque::where("id", 11)->update($updateData);
            if ($updateData) {
                return redirect()->route('backend-management-marque')->with("success", "Marque Successfuly Added...");
            } else {
                return redirect()->route('backend-management-marque-add')->with("error", "Something wen,t wrong...");
            }
        } else {

        }


    }
}
