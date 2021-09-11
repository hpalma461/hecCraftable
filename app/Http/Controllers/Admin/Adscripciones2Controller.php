<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Adscripciones2\BulkDestroyAdscripciones2;
use App\Http\Requests\Admin\Adscripciones2\DestroyAdscripciones2;
use App\Http\Requests\Admin\Adscripciones2\IndexAdscripciones2;
use App\Http\Requests\Admin\Adscripciones2\StoreAdscripciones2;
use App\Http\Requests\Admin\Adscripciones2\UpdateAdscripciones2;
use App\Models\Adscripciones2;
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

class Adscripciones2Controller extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexAdscripciones2 $request
     * @return array|Factory|View
     */
    public function index(IndexAdscripciones2 $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Adscripciones2::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'Nombre'],

            // set columns to searchIn
            ['id', 'Nombre']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.adscripciones2.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.adscripciones2.create');

        return view('admin.adscripciones2.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAdscripciones2 $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreAdscripciones2 $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Adscripciones2
        $adscripciones2 = Adscripciones2::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/adscripciones2s'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/adscripciones2s');
    }

    /**
     * Display the specified resource.
     *
     * @param Adscripciones2 $adscripciones2
     * @throws AuthorizationException
     * @return void
     */
    public function show(Adscripciones2 $adscripciones2)
    {
        $this->authorize('admin.adscripciones2.show', $adscripciones2);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Adscripciones2 $adscripciones2
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Adscripciones2 $adscripciones2)
    {
        $this->authorize('admin.adscripciones2.edit', $adscripciones2);


        return view('admin.adscripciones2.edit', [
            'adscripciones2' => $adscripciones2,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAdscripciones2 $request
     * @param Adscripciones2 $adscripciones2
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateAdscripciones2 $request, Adscripciones2 $adscripciones2)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Adscripciones2
        $adscripciones2->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/adscripciones2s'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/adscripciones2s');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyAdscripciones2 $request
     * @param Adscripciones2 $adscripciones2
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyAdscripciones2 $request, Adscripciones2 $adscripciones2)
    {
        $adscripciones2->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyAdscripciones2 $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyAdscripciones2 $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Adscripciones2::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
