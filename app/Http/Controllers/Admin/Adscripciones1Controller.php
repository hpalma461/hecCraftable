<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Adscripciones1\BulkDestroyAdscripciones1;
use App\Http\Requests\Admin\Adscripciones1\DestroyAdscripciones1;
use App\Http\Requests\Admin\Adscripciones1\IndexAdscripciones1;
use App\Http\Requests\Admin\Adscripciones1\StoreAdscripciones1;
use App\Http\Requests\Admin\Adscripciones1\UpdateAdscripciones1;
use App\Models\Adscripciones1;
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

class Adscripciones1Controller extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexAdscripciones1 $request
     * @return array|Factory|View
     */
    public function index(IndexAdscripciones1 $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Adscripciones1::class)->processRequestAndGet(
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

        return view('admin.adscripciones1.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.adscripciones1.create');

        return view('admin.adscripciones1.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAdscripciones1 $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreAdscripciones1 $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Adscripciones1
        $adscripciones1 = Adscripciones1::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/adscripciones1s'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/adscripciones1s');
    }

    /**
     * Display the specified resource.
     *
     * @param Adscripciones1 $adscripciones1
     * @throws AuthorizationException
     * @return void
     */
    public function show(Adscripciones1 $adscripciones1)
    {
        $this->authorize('admin.adscripciones1.show', $adscripciones1);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Adscripciones1 $adscripciones1
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Adscripciones1 $adscripciones1)
    {
        $this->authorize('admin.adscripciones1.edit', $adscripciones1);


        return view('admin.adscripciones1.edit', [
            'adscripciones1' => $adscripciones1,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAdscripciones1 $request
     * @param Adscripciones1 $adscripciones1
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateAdscripciones1 $request, Adscripciones1 $adscripciones1)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Adscripciones1
        $adscripciones1->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/adscripciones1s'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/adscripciones1s');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyAdscripciones1 $request
     * @param Adscripciones1 $adscripciones1
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyAdscripciones1 $request, Adscripciones1 $adscripciones1)
    {
        $adscripciones1->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyAdscripciones1 $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyAdscripciones1 $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Adscripciones1::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
