<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Adscipciones1\BulkDestroyAdscipciones1;
use App\Http\Requests\Admin\Adscipciones1\DestroyAdscipciones1;
use App\Http\Requests\Admin\Adscipciones1\IndexAdscipciones1;
use App\Http\Requests\Admin\Adscipciones1\StoreAdscipciones1;
use App\Http\Requests\Admin\Adscipciones1\UpdateAdscipciones1;
use App\Models\Adscipciones1;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class Adscipciones1Controller extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexAdscipciones1 $request
     * @return array|Factory|View
     */
    public function index(IndexAdscipciones1 $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Adscipciones1::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            [''],

            // set columns to searchIn
            ['']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.adscipciones1.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.adscipciones1.create');

        return view('admin.adscipciones1.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAdscipciones1 $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreAdscipciones1 $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Adscipciones1
        $adscipciones1 = Adscipciones1::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/adscipciones1s'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/adscipciones1s');
    }

    /**
     * Display the specified resource.
     *
     * @param Adscipciones1 $adscipciones1
     * @throws AuthorizationException
     * @return void
     */
    public function show(Adscipciones1 $adscipciones1)
    {
        $this->authorize('admin.adscipciones1.show', $adscipciones1);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Adscipciones1 $adscipciones1
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Adscipciones1 $adscipciones1)
    {
        $this->authorize('admin.adscipciones1.edit', $adscipciones1);


        return view('admin.adscipciones1.edit', [
            'adscipciones1' => $adscipciones1,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAdscipciones1 $request
     * @param Adscipciones1 $adscipciones1
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateAdscipciones1 $request, Adscipciones1 $adscipciones1)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Adscipciones1
        $adscipciones1->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/adscipciones1s'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/adscipciones1s');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyAdscipciones1 $request
     * @param Adscipciones1 $adscipciones1
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyAdscipciones1 $request, Adscipciones1 $adscipciones1)
    {
        $adscipciones1->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyAdscipciones1 $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyAdscipciones1 $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Adscipciones1::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
