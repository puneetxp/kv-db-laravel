    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Enviroment</h5>
                        @if (env('ENV_EDIT') == 1)
                            <ul
                                class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                <li class="breadcrumb-item">
                                    <a href="javascript:" class="text-muted" data-toggle="modal" data-target="#myModal">Add
                                        New</a>
                                </li>
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/dompurify@2.3.6/dist/purify.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
        <div class="d-flex flex-column-fluid">
            <div class="main-card mb-3 card w-100">
                <div class="card-body">
                    @if ($enviroments->count())
                        @foreach ($enviroments as $envs)
                            @if ($envs[0]->multiple || $envs[0]->type == 'custom')
                                <div class=" my-5 p-3 p-sm-5 d-flex justify-content-between border">
                                    <div>
                                        {{ ucfirst($envs[0]->key) }} ({{ $envs->count() }})
                                    </div>
                                    <div>
                                        <a class="mt-1 btn btn-primary"
                                            href="{{ route('admin.enviroment.show', $envs[0]->id) }}">
                                            View/Edit
                                        </a>
                                    </div>
                                </div>
                            @else
                                @foreach ($envs as $env)
                                    @if ($env->enviroment_id == null)
                                        @if ($env->type == 'string')
                                            <form class="ajax_form my-5 p-3 p-sm-5 border"
                                                action="{{ route('admin.enviroment.update', $env->id) }}" method="post"
                                                id="clinicForm">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label>{{ ucfirst($env->key) }}
                                                        <span class="text-danger">*</span></label>
                                                    <input
                                                        @if ($env->pattern) pattern="{{ $env->pattern }}" @endif
                                                        type="text" title="{{ ucfirst($env->key) }}" class="form-control"
                                                        name="value" id="{{ $env->key }}"
                                                        value="{{ old($env->key, $env->value) }}" required>
                                                </div>
                                                <button class="mt-1 btn btn-primary">Update</button>
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
                                                    <input accept="image/*" name="value" id="exampleFile" type="file"
                                                        class="form-control-file">
                                                </div>
                                                <div class="modal fade" id="myModalshow{{ $env->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="myModalshow{{ $env->id }}Label"
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
                                                <button class="mt-1 btn btn-primary m-auto">Update</button>
                                            </form>
                                        @elseif($env->type == 'date')
                                            <form class="ajax_form my-5 p-3 p-sm-5 border"
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
                                                <button class="mt-1 btn btn-primary">Update</button>
                                            </form>
                                        @elseif($env->type == 'email')
                                            <form class="ajax_form my-5 p-3 p-sm-5 border"
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
                                                <button class="mt-1 btn btn-primary">Update</button>
                                            </form>
                                        @elseif($env->type == 'longtext')
                                            <form class="ajax_form my-5 p-3 p-sm-5 border"
                                                action="{{ route('admin.enviroment.update', $env->id) }}" method="post"
                                                id="clinicForm">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label>{{ ucfirst($env->key) }}
                                                        <span class="text-danger">*</span></label>
                                                    <x-input.quill :value="$env->value" :id="'id' . $env->id" :key="'value'"
                                                        :quill="'quill' . $env->key" :toolbar="'t' . $env->key" :editor="'e' . $env->key" />
                                                </div>
                                                <button class="mt-1 btn btn-primary">Update</button>
                                            </form>
                                        @endif
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                        <div>
                            <form class="ajax_form my-5 py-5" action="{{ route('admin.enviroment.store') }}"
                                method="post" id="clinicForm">
                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myModalLabel">
                                                    New Attribute</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                @csrf
                                                <div class="form-group">
                                                    <label>Name
                                                        <span class="text-danger">*</span></label>
                                                    <input type="text" title="Name" class="form-control"
                                                        name="name" id="name" value="{{ old('name') }}">
                                                </div>
                                                <div class="form-group">
                                                    <label>Type <span class="text-danger">*</span></label>
                                                    <select class="form-control" name="type" id="type">
                                                        <option value="string"
                                                            {{ old('type') == 'string' ? 'selected' : '' }}>String
                                                        </option>
                                                        <option value="photo"
                                                            {{ old('type') == 'photo' ? 'selected' : '' }}>Photo
                                                        </option>
                                                        <option value="date"
                                                            {{ old('type') == 'date' ? 'selected' : '' }}>Date
                                                        </option>
                                                        <option value="longtext"
                                                            {{ old('type') == 'longtext' ? 'selected' : '' }}>Long
                                                            Text
                                                        </option>
                                                        <option value="custom"
                                                            {{ old('type') == 'custom' ? 'custom' : '' }}>Custom
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Pattern</label>
                                                    <input type="text" title="Pattern" class="form-control"
                                                        name="pattern" id="pattern" value="{{ old('pattern') }}">
                                                </div>
                                                <div class="form-group">
                                                    <div>Mutlitple</div>
                                                    <div class="col-4 text-right">
                                                        <span class="switch switch-success switch-sm">
                                                            <label>
                                                                <input type="checkbox" title="multiple"
                                                                    class="form-control" name="multiple" id="multiple"
                                                                    value="{{ old('multiple') }}" />
                                                                <span></span>
                                                            </label>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @else
                        <div>
                            <h5 class="my-5 py-5">
                                New Attribute
                            </h5>
                            <form class=" ajax_form" action="{{ route('admin.enviroment.store') }}" method="post"
                                id="clinicForm">
                                @csrf
                                <div class="form-group">
                                    <label>Name
                                        <span class="text-danger">*</span></label>
                                    <input type="text" title="Name" class="form-control" name="name"
                                        id="name" value="{{ old('name') }}">
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
                                        <option value="longtext" {{ old('type') == 'longtext' ? 'selected' : '' }}>Long
                                            Text
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
                                    <label>Mutlitple</label>
                                    <div class="col-4 text-right">
                                        <span class="switch switch-success switch-sm">
                                            <label>
                                                <input type="checkbox" title="multiple" class="form-control"
                                                    name="multiple" id="multiple" value="{{ old('multiple') }}" />
                                                <span></span>
                                            </label>
                                        </span>
                                    </div>
                                </div>
                                <button class="mt-1 btn btn-primary" type="submit">Submit</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
        </div>

