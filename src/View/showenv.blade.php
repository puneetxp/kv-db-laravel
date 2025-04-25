    <style>
        .form-group * {
            width: clamp(min(10vw, 20rem), 300px, max(90vw, 55rem));
        }
    </style>
    {{-- @dd($envs) --}}
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        {{-- <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Enviroment</h5>
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="javascript:" class="text-muted" data-toggle="modal" data-target="#myModal">Add
                                    New</a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div> --}}

        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <h4 class="text-dark font-weight-bold my-1 mr-5">{{ ucfirst($primary->key) }}</h4>
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                @if ($primary->type == 'custom')
                                    @if (env('ENV_EDIT') == 1)
                                        <a href="#" class="text-muted" data-toggle="modal" data-target="#myModalx">Add
                                            Custom</a>
                                    @endif
                                    @if ($primary->multiple)
                                        <form class="m-2 ajax_form" action="{{ route('admin.customAddNew') }}"
                                            method="post" id="clinicForm">
                                            @csrf
                                            <input hidden type="text" title="id" class="form-control" name="id"
                                                id="id" value="{{ $primary->id }}">
                                            <input hidden type="text" title="Name" class="form-control" name="name"
                                                id="name" value="{{ $primary->key }}">
                                            <input hidden type="text" title="Pattern" class="form-control" name="pattern"
                                                id="pattern" value="{{ $primary->pattern }}">
                                            <input hidden type="text" title="Type" class="form-control" name="type"
                                                id="type" value="{{ $primary->type }}">
                                            <input hidden title="multiple" class="form-control" name="multiple"
                                                id="multiple" value="{{ $primary->multiple }}" />
                                            <span></span>
                                            <button class="btn text-muted" type="submit">Add</button>
                                        </form>
                                    @endif
                                @else
                                    <form class="m-2 ajax_form" action="{{ route('admin.enviroment.store') }}"
                                        method="post" id="clinicForm">
                                        @csrf
                                        <input hidden type="text" title="id" class="form-control" name="id"
                                            id="id" value="{{ $primary->id }}">
                                        <input hidden type="text" title="Name" class="form-control" name="name"
                                            id="name" value="{{ $primary->key }}">
                                        <input hidden type="text" title="Pattern" class="form-control" name="pattern"
                                            id="pattern" value="{{ $primary->pattern }}">
                                        <input hidden type="text" title="Type" class="form-control" name="type"
                                            id="type" value="{{ $primary->type }}">
                                        <input hidden type="text" title="Pattern" class="form-control" name="pattern"
                                            id="pattern" value="{{ $primary->pattern }}">
                                        <input hidden title="multiple" class="form-control" name="multiple" id="multiple"
                                            value="{{ $primary->multiple }}" />
                                        <span></span>
                                        <button class="btn text-muted" type="submit">Add</button>
                                    </form>
                                @endif
                                {{-- <a href="javascript:" class="text-muted" data-toggle="modal" data-target="#myModal">Add
                                    New</a> --}}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <form class="ajax_form" action="{{ route('admin.enviroment.store') }}" method="post" id="clinicForm">
            <div class="modal fade" id="myModalx" role="dialog" aria-labelledby="myModalxLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalxLabel">
                                New Attribute</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @csrf
                            <input hidden name="enviroment_id" value="{{ $primary->id }}" />
                            <div class="form-group">
                                <label>Name
                                    <span class="text-danger">*</span></label>
                                <input type="text" title="Name" class="form-control" name="name" id="name"
                                    value="{{ old('name') }}">
                                <input hidden type="text" title="id" class="form-control" name="id"
                                    id="id" value="{{ $primary->id }}">
                            </div>
                            <div class="form-group">
                                <label>Type <span class="text-danger">*</span></label>
                                <select class="form-control" name="type" id="type">
                                    <option value="string" {{ old('type') == 'string' ? 'selected' : '' }}>String
                                    </option>
                                    <option value="photo" {{ old('type') == 'photo' ? 'selected' : '' }}>Photo
                                    </option>
                                    <option value="date" {{ old('type') == 'date' ? 'selected' : '' }}>Date
                                    </option>
                                    <option value="longtext" {{ old('type') == 'longtext' ? 'selected' : '' }}>Long Text
                                    </option>
                                    <option value="custom" {{ old('type') == 'custom' ? 'custom' : '' }}>Custom
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Pattern</label>
                                <input type="text" title="Pattern" class="form-control" name="pattern"
                                    id="pattern" value="{{ old('pattern') }}">
                            </div>
                            <div class="form-group">
                                <div>Mutlitple</div>
                                <div class="col-4 text-right">
                                    <span class="switch switch-success switch-sm">
                                        <label>
                                            <input type="checkbox" title="multiple" class="form-control" name="multiple"
                                                id="multiple" value="{{ old('multiple') }}" />
                                            <span></span>
                                        </label>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/dompurify@2.3.6/dist/purify.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
        <div class="d-flex flex-column-fluid">
            <div class="main-card mb-3 card w-100">
                <div class="card-body">
                    @if ($primary->multiple)
                        @foreach ($envs as $env)
                            <div class="my-3 border p-3 position-relative">
                                @if ($env->type == 'custom')
                                    <form
                                        class="ajax_form my-5 m-2 p-3 p-sm-5 d-grid"
                                        action="{{ route('admin.customUpdate', $env->id) }}" method="post"
                                        id="clinicForm">
                                        @csrf
                                        @method('PUT')
                                        {{-- @dd($env->categorychildern) --}}
                                        @foreach ($env->categorychildern as $child)
                                            @if ($child->multiple)
                                                <div class=" my-5 p-3 p-sm-5 d-flex justify-content-between w-100">
                                                    <div>
                                                        {{ ucfirst($child->key) }} ({{ $envs->count() }})
                                                    </div>
                                                    <div>
                                                        <a class="mt-1 btn btn-primary"
                                                            href="{{ route('admin.enviroment.show', $child->id) }}">
                                                            View/Edit
                                                        </a>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="d-flex flex-wrap justify-content-between border my-3">
                                                    @if ($child->type == 'string')
                                                        <div class="form-group p-2">
                                                            <label>{{ ucfirst($child->key) }}
                                                                <span class="text-danger">*</span></label>
                                                            <input
                                                                @if ($child->pattern) pattern="{{ $child->pattern }}" @endif
                                                                type="text" title="{{ ucfirst($child->key) }}"
                                                                class="form-control" name="{{ $child->key }}"
                                                                id="{{ $child->key }}"
                                                                value="{{ old($child->key, $child->value) }}" required>
                                                        </div>
                                                    @elseif($child->type == 'photo')
                                                        <div class="position-relative p-2 form-group">
                                                            <label for="exampleFile" class="">
                                                                @if ($child->value != null)
                                                                    {{ ucfirst($child->key) }}
                                                                    <button
                                                                        class="mt-1 btn w-auto m-auto btn-outline-primary"
                                                                        type="button" data-toggle="modal"
                                                                        data-target="#myModalshow{{ $child->id }}">Preview</button>
                                                                    {{-- <img class="img-fluid bg-light" src="{{ $child->value }}" /> --}}
                                                                @else
                                                                    {{ ucfirst($child->key) }}
                                                                @endif
                                                            </label>
                                                            <input accept="image/*" name="{{ $child->key }}"
                                                                id="exampleFile" type="file"
                                                                class="form-control-file">
                                                        </div>
                                                        <div class="modal fade" id="myModalshow{{ $child->id }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="myModalshow{{ $child->id }}Label"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="myModalshowLabel">
                                                                            Preview
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <img class="img-fluid bg-light"
                                                                            src="{{ $child->value }}" />
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @elseif($child->type == 'date')
                                                        <div class="form-group p-2">
                                                            <label>{{ ucfirst($child->key) }}
                                                                <span class="text-danger">*</span></label>
                                                            <input name="{{ $child->key }}" id="exampleFile"required
                                                                type="date" value="{{ $child->value }}"
                                                                class="form-control-file">
                                                        </div>
                                                    @elseif($child->type == 'email')
                                                        <div class="form-group p-2">
                                                            <label>{{ ucfirst($child->key) }}
                                                                <span class="text-danger">*</span></label>
                                                            <input name="{{ $child->key }}" id="exampleFile" required
                                                                type="email" class="form-control-file">
                                                        </div>
                                                    @elseif($child->type == 'longtext')
                                                        <div class="p-2 w-100">
                                                            <label>{{ ucfirst($child->key) }}
                                                                <span class="text-danger">*</span></label>
                                                            <x-input.quill :id="'id' . $child->id" :value="$child->value"
                                                                :key="$child->key" :quill="'quill' . $child->key . $child->id" :toolbar="'t' . $child->key . $child->id"
                                                                :editor="'e' . $child->key . $child->id" />
                                                        </div>
                                                    @elseif($child->type == 'custom')
                                                        <div
                                                            class=" my-5 p-3 p-sm-5 d-flex justify-content-between w-100">
                                                            <div>
                                                                {{ ucfirst($child->key) }} ({{ $envs->count() }})
                                                            </div>
                                                            <div>
                                                                <a class="mt-1 btn btn-primary"
                                                                    href="{{ route('admin.enviroment.show', $child->id) }}">
                                                                    View/Edit
                                                                </a>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            @endif
                                        @endforeach
                                        <button
                                            class="mt-1 btn btn-primary update{{ $env->id }} d-none">Update</button>
                                    </form>
                                    <form
                                        class="ajax_form my-5 p-3 p-sm-5 d-flex flex-wrap position-absolute right-0 bottom-0"
                                        action="{{ route('admin.enviroment.destroy', $env->id) }}" method="post"
                                        id="clinicForm">
                                        @csrf
                                        @method('DELETE')
                                        <button class="mt-1 btn btn-danger" type="button" data-toggle="modal"
                                            data-target="#myModal{{ $env->id }}">Delete</button>
                                        <button type="button" class="btn btn-primary  ml-2"
                                            onclick="document.querySelector('.update{{ $env->id }}').click()">Update</button>
                                        <div class="modal fade" id="myModal{{ $env->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="myModal{{ $env->id }}Label"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="myModalLabel">
                                                            Are You Sure?</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button class="btn btn-primary">Delete</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                @else
                                    <div class="d-flex flex-wrap justify-content-between border my-3">
                                        @if ($env->type == 'string')
                                            <form class="ajax_form my-5 m-2 p-3 p-sm-5 d-flex flex-wrap flex-grow-1"
                                                action="{{ route('admin.enviroment.update', $env->id) }}" method="post"
                                                id="clinicForm">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label>{{ ucfirst($env->key) }}
                                                        <span class="text-danger">*</span></label>
                                                    <input
                                                        @if ($env->pattern) pattern="{{ $env->pattern }}" @endif
                                                        type="text" title="{{ ucfirst($env->key) }}"
                                                        class="form-control" name="value" id="{{ $env->key }}"
                                                        value="{{ old($env->key, $env->value) }}" required>
                                                </div>
                                                <button
                                                    class="mt-1 btn btn-primary update{{ $env->id }} d-none">Update</button>
                                            </form>
                                        @elseif($env->type == 'photo')
                                            <form
                                                class="ajax_form my-5 p-3 p-sm-5 d-flex flex-wrap flex-grow-1 justify-content-between"
                                                action="{{ route('admin.enviroment.update', $env->id) }}" method="post"
                                                id="clinicForm">
                                                @csrf
                                                @method('PUT')
                                                <div class="position-relative p-2 form-group">
                                                    <label for="exampleFile" class="">
                                                        @if ($env->value != null)
                                                            {{ ucfirst($env->key) }}
                                                            <button class="mt-1 btn w-auto m-auto btn-outline-primary"
                                                                type="button" data-toggle="modal"
                                                                data-target="#myModalshow{{ $env->id }}">Preview</button>
                                                            {{-- <img class="img-fluid bg-light" src="{{ $env->value }}" /> --}}
                                                        @else
                                                            {{ ucfirst($env->key) }}
                                                        @endif
                                                    </label>
                                                    <input accept="image/*" name="value" id="exampleFile"
                                                        type="file" class="form-control-file">
                                                </div>
                                                <div class="modal fade" id="myModalshow{{ $env->id }}"
                                                    tabindex="-1" role="dialog"
                                                    aria-labelledby="myModalshow{{ $env->id }}Label"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="myModalshowLabel">
                                                                    Preview
                                                                </h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img class="img-fluid bg-light"
                                                                    src="{{ $env->value }}" />
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button
                                                    class="mt-1 btn btn-primary m-auto update{{ $env->id }}">Update</button>
                                            </form>
                                        @elseif($env->type == 'date')
                                            <form
                                                class="ajax_form my-5 p-3 p-sm-5 d-flex flex-wrap flex-grow-1 justify-content-between"
                                                action="{{ route('admin.enviroment.update', $env->id) }}" method="post"
                                                id="clinicForm">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label>{{ ucfirst($env->key) }}
                                                        <span class="text-danger">*</span></label>
                                                    <input name="value" id="exampleFile"required type="date"
                                                        value="{{ $env->value }}" class="form-control-file">
                                                </div>
                                                <button
                                                    class="mt-1 btn btn-primary update{{ $env->id }} d-none">Update</button>
                                            </form>
                                        @elseif($env->type == 'email')
                                            <form
                                                class="ajax_form my-5 p-3 p-sm-5 d-flex flex-wrap flex-grow-1 justify-content-between"
                                                action="{{ route('admin.enviroment.update', $env->id) }}" method="post"
                                                id="clinicForm">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label>{{ ucfirst($env->key) }}
                                                        <span class="text-danger">*</span></label>
                                                    <input name="value" id="exampleFile" required type="email"
                                                        class="form-control-file">
                                                </div>
                                                <button
                                                    class="mt-1 btn btn-primary update{{ $env->id }} d-none">Update</button>
                                            </form>
                                        @elseif($env->type == 'longtext')
                                            <form
                                                class="ajax_form my-5 p-3 p-sm-5 d-flex flex-wrap flex-grow-1 justify-content-between"
                                                action="{{ route('admin.enviroment.update', $env->id) }}" method="post"
                                                id="clinicForm">
                                                @csrf
                                                @method('PUT')
                                                <div class="p-2">
                                                    <label>{{ ucfirst($env->key) }}
                                                        <span class="text-danger">*</span></label>
                                                    <x-input.quill :id="'id' . $env->id" :value="$env->value" :key="'value'"
                                                        :quill="'quill' . $env->key . $env->id" :toolbar="'t' . $env->key . $env->id" :editor="'e' . $env->key . $env->id" />
                                                </div>
                                                <button
                                                    class="mt-1 btn btn-primary update{{ $env->id }} d-none">Update</button>
                                            </form>
                                        @endif

                                        @if ($envs->count() !== 1)
                                            <form class="ajax_form my-5 p-3 p-sm-5 d-flex flex-wrap"
                                                action="{{ route('admin.enviroment.destroy', $env->id) }}" method="post"
                                                id="clinicForm">
                                                @csrf
                                                @method('DELETE')
                                                <button class="mt-1 btn btn-danger" type="button" data-toggle="modal"
                                                    data-target="#myModal{{ $env->id }}">Delete</button>

                                                <button type="button" class="btn btn-primary ml-2"
                                                    onclick="document.querySelector('.update{{ $env->id }}').click()">Update</button>
                                                <div class="modal fade" id="myModal{{ $env->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="myModal{{ $env->id }}Label"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="myModalLabel">
                                                                    Are You Sure?</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button class="btn btn-primary">Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        @else
                                            <button type="button" class="btn btn-primary ml-2"
                                                onclick="document.querySelector('.update{{ $env->id }}').click()">Update</button>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    @else
                        @if ($primary->type == 'custom')
                            <form class="ajax_form my-5 m-2 p-3 p-sm-5 d-grid"
                                action="{{ route('admin.customUpdate', $primary->id) }}" method="post" id="clinicForm">
                                @csrf
                                @method('PUT')
                                {{-- @dd($env->categorychildern) --}}
                                @foreach ($primary->categorychildernbykey as $child)
                                    @if ($child->multiple)
                                        <div class=" my-5 p-3 p-sm-5 d-flex justify-content-between w-100 ">
                                            <div>
                                                {{ ucfirst($child->key) }} ({{ $envs->count() }})
                                            </div>
                                            <div>
                                                <a class="mt-1 btn btn-primary"
                                                    href="{{ route('admin.enviroment.show', $child->id) }}">
                                                    View/Edit
                                                </a>
                                            </div>
                                        </div>
                                    @else
                                        <div class="d-flex flex-wrap justify-content-between border my-3">
                                            @if ($child->type == 'string')
                                                <div class="form-group p-2">
                                                    <label>{{ ucfirst($child->key) }}
                                                        <span class="text-danger">*</span></label>
                                                    <input
                                                        @if ($child->pattern) pattern="{{ $child->pattern }}" @endif
                                                        type="text" title="{{ ucfirst($child->key) }}"
                                                        class="form-control" name="{{ $child->key }}"
                                                        id="{{ $child->key }}"
                                                        value="{{ old($child->key, $child->value) }}" required>
                                                </div>
                                            @elseif($child->type == 'photo')
                                                <div class="position-relative p-2 form-group">
                                                    <label for="exampleFile" class="">
                                                        @if ($child->value != null)
                                                            {{ ucfirst($child->key) }}
                                                            <button class="mt-1 btn w-auto m-auto btn-outline-primary"
                                                                type="button" data-toggle="modal"
                                                                data-target="#myModalshow{{ $child->id }}">Preview</button>
                                                            {{-- <img class="img-fluid bg-light" src="{{ $child->value }}" /> --}}
                                                        @else
                                                            {{ ucfirst($child->key) }}
                                                        @endif
                                                    </label>
                                                    <input accept="image/*" name="{{ $child->key }}" id="exampleFile"
                                                        type="file" class="form-control-file">
                                                </div>
                                                <div class="modal fade" id="myModalshow{{ $child->id }}"
                                                    tabindex="-1" role="dialog"
                                                    aria-labelledby="myModalshow{{ $child->id }}Label"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="myModalshowLabel">
                                                                    Preview
                                                                </h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img class="img-fluid bg-light"
                                                                    src="{{ $child->value }}" />
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @elseif($child->type == 'date')
                                                <div class="form-group p-2">
                                                    <label>{{ ucfirst($child->key) }}
                                                        <span class="text-danger">*</span></label>
                                                    <input name="{{ $child->key }}" id="exampleFile"required
                                                        type="date" value="{{ $child->value }}"
                                                        class="form-control-file">
                                                </div>
                                            @elseif($child->type == 'email')
                                                <div class="form-group p-2">
                                                    <label>{{ ucfirst($child->key) }}
                                                        <span class="text-danger">*</span></label>
                                                    <input name="{{ $child->key }}" id="exampleFile" required
                                                        type="email" class="form-control-file">
                                                </div>
                                            @elseif($child->type == 'longtext')
                                                <div class="p-2 w-100">
                                                    <label>{{ ucfirst($child->key) }}
                                                        <span class="text-danger">*</span></label>
                                                    <x-input.quill :id="'id' . $child->id" :value="$child->value" :key="$child->key"
                                                        :quill="'quill' . $child->key . $child->id" :toolbar="'t' . $child->key . $child->id" :editor="'e' . $child->key . $child->id" />
                                                </div>
                                            @elseif($child->type == 'custom')
                                                <div class=" my-5 p-3 p-sm-5 d-flex justify-content-between w-100">
                                                    <div>
                                                        {{ ucfirst($child->key) }} ({{ $envs->count() }})
                                                    </div>
                                                    <div>
                                                        <a class="mt-1 btn btn-primary"
                                                            href="{{ route('admin.enviroment.show', $child->id) }}">
                                                            View/Edit
                                                        </a>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    @endif
                                @endforeach
                                <button class="mt-1 btn btn-primary update{{ $primary->id }} d-none">Update</button>
                            </form>
                        @else
                            <div class="d-flex flex-wrap justify-content-between border my-3">
                                @if ($primary->type == 'string')
                                    <form class="ajax_form my-5 m-2 p-3 p-sm-5 d-flex flex-wrap flex-grow-1"
                                        action="{{ route('admin.enviroment.update', $primary->id) }}" method="post"
                                        id="clinicForm">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>{{ ucfirst($primary->key) }}
                                                <span class="text-danger">*</span></label>
                                            <input
                                                @if ($primary->pattern) pattern="{{ $primary->pattern }}" @endif
                                                type="text" title="{{ ucfirst($primary->key) }}"
                                                class="form-control" name="value" id="{{ $primary->key }}"
                                                value="{{ old($primary->key, $primary->value) }}" required>
                                        </div>
                                        <button
                                            class="mt-1 btn btn-primary update{{ $primary->id }} d-none">Update</button>
                                    </form>
                                @elseif($primary->type == 'photo')
                                    <form
                                        class="ajax_form my-5 p-3 p-sm-5 d-flex flex-wrap flex-grow-1 justify-content-between"
                                        action="{{ route('admin.enviroment.update', $primary->id) }}" method="post"
                                        id="clinicForm">
                                        @csrf
                                        @method('PUT')
                                        <div class="position-relative p-2 form-group">
                                            <label for="exampleFile" class="">
                                                @if ($primary->value != null)
                                                    {{ ucfirst($primary->key) }}
                                                    <button class="mt-1 btn w-auto m-auto btn-outline-primary"
                                                        type="button" data-toggle="modal"
                                                        data-target="#myModalshow{{ $primary->id }}">Preview</button>
                                                    {{-- <img class="img-fluid bg-light" src="{{ $primary->value }}" /> --}}
                                                @else
                                                    {{ ucfirst($primary->key) }}
                                                @endif
                                            </label>
                                            <input accept="image/*" name="value" id="exampleFile" type="file"
                                                class="form-control-file">
                                        </div>
                                        <div class="modal fade" id="myModalshow{{ $primary->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="myModalshow{{ $primary->id }}Label"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="myModalshowLabel">
                                                            Preview
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img class="img-fluid bg-light" src="{{ $primary->value }}" />
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button
                                            class="mt-1 btn btn-primary m-auto update{{ $primary->id }}">Update</button>
                                    </form>
                                @elseif($primary->type == 'date')
                                    <form
                                        class="ajax_form my-5 p-3 p-sm-5 d-flex flex-wrap flex-grow-1 justify-content-between"
                                        action="{{ route('admin.enviroment.update', $primary->id) }}" method="post"
                                        id="clinicForm">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>{{ ucfirst($primary->key) }}
                                                <span class="text-danger">*</span></label>
                                            <input name="value" id="exampleFile"required type="date"
                                                value="{{ $primary->value }}" class="form-control-file">
                                        </div>
                                        <button
                                            class="mt-1 btn btn-primary update{{ $primary->id }} d-none">Update</button>
                                    </form>
                                @elseif($primary->type == 'email')
                                    <form
                                        class="ajax_form my-5 p-3 p-sm-5 d-flex flex-wrap flex-grow-1 justify-content-between"
                                        action="{{ route('admin.enviroment.update', $primary->id) }}" method="post"
                                        id="clinicForm">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>{{ ucfirst($primary->key) }}
                                                <span class="text-danger">*</span></label>
                                            <input name="value" id="exampleFile" required type="email"
                                                class="form-control-file">
                                        </div>
                                        <button
                                            class="mt-1 btn btn-primary update{{ $primary->id }} d-none">Update</button>
                                    </form>
                                @elseif($primary->type == 'longtext')
                                    <form
                                        class="ajax_form my-5 p-3 p-sm-5 d-flex flex-wrap flex-grow-1 justify-content-between"
                                        action="{{ route('admin.enviroment.update', $primary->id) }}" method="post"
                                        id="clinicForm">
                                        @csrf
                                        @method('PUT')
                                        <div class="p-2">
                                            <label>{{ ucfirst($primary->key) }}
                                                <span class="text-danger">*</span></label>
                                            <x-input.quill :id="'id' . $primary->id" :value="$primary->value" :key="'value'"
                                                :quill="'quill' . $primary->key . $primary->id" :toolbar="'t' . $primary->key . $primary->id" :editor="'e' . $primary->key . $primary->id" />
                                        </div>
                                        <button
                                            class="mt-1 btn btn-primary update{{ $primary->id }} d-none">Update</button>
                                    </form>
                                @endif


                                <button type="button" class="btn btn-primary ml-2"
                                    onclick="document.querySelector('.update{{ $primary->id }}').click()">Update</button>
                            </div>
                        @endif

                        <button type="button" class="btn btn-primary ml-2"
                            onclick="document.querySelector('.update{{ $primary->id }}').click()">Update</button>
                    @endif
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
        </div>

