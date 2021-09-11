@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.adscripciones2.actions.edit', ['name' => $adscripciones2->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <adscripciones2-form
                :action="'{{ $adscripciones2->resource_url }}'"
                :data="{{ $adscripciones2->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.adscripciones2.actions.edit', ['name' => $adscripciones2->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.adscripciones2.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </adscripciones2-form>

        </div>
    
</div>

@endsection