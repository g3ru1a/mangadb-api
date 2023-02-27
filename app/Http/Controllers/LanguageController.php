<?php

namespace App\Http\Controllers;

use App\Http\Resources\LanguageResource;
use App\Models\Language;
use App\Http\Requests\StoreLanguageRequest;
use App\Http\Requests\UpdateLanguageRequest;
use App\Models\Review;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class LanguageController extends Controller
{
    /**
     * Create controller instance
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Language::class, 'language');
    }

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return LanguageResource::collection(Language::approvedOnly());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreLanguageRequest $request
     * @return LanguageResource
     */
    public function store(StoreLanguageRequest $request): LanguageResource
    {
        $name = htmlspecialchars($request->input('name'));
        $iso = htmlspecialchars($request->input('iso_639_1'));
        //
        $language = Language::create(['name' => $name, 'iso_639_1' => $iso]);
        ReviewController::create(Auth::user(), $language);
        return LanguageResource::make($language);
    }

    /**
     * Display the specified resource.
     *
     * @param Language $language
     * @return LanguageResource
     */
    public function show(Language $language): LanguageResource
    {
        return LanguageResource::make($language);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateLanguageRequest $request
     * @param Language $language
     * @return LanguageResource
     */
    public function update(UpdateLanguageRequest $request, Language $language): LanguageResource
    {
        $data = [
            'name' => $request->input('name') ? htmlspecialchars($request->input('name')) : $language->name,
            'iso_639_1' => $request->input('iso_639_1') ? htmlspecialchars($request->input('iso_639_1')) : $language->iso_639_1,
        ];
        //
        $language_new = Language::create($data);
        ReviewController::create(Auth::user(), $language_new, $language);
        return LanguageResource::make($language);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Language $language
     * @return LanguageResource
     */
    public function destroy(Language $language): LanguageResource
    {
        $language->delete();
        return LanguageResource::make($language);
    }
}
