<div wire:init="readyToLoad">
    <div wire:ignore.self class="card" id="show">
        <div class="card-datatable table-responsive pt-0">
            <div class="dataTables_wrapper dt-bootstrap5 no-footer">
                <div class="card-header flex-column flex-md-row">
                    <div class="head-label text-center">
                        <h5 class="card-title mb-0">{{__('MacroMeter code')}}</h5>
                    </div>
                    @if($loggedUserRole != 'Grupo Social')
                        <div class="dt-action-buttons text-end pt-3 pt-md-0">
                            <div class="dt-buttons btn-group flex-wrap">
                                <button class="dt-button add-new btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
                                    <span>
                                    <i class="ti ti-plus me-0 me-sm-1"></i>
                                    <span class="d-none d-sm-inline-block">{{__('Agg MacroMeter code')}}</span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="me-3">
                            @if($readyToLoad)
                                @if($terreno->total()>10)
                                    <div class="dataTables_length" id="DataTables_Table_0_length">
                                        <label>
                                            {{__('Show')}}
                                            <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-select" wire:model="cant">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                @if($terreno->total()>25)
                                                    <option value="50">50</option>
                                                @endif
                                                @if($terreno->total()>50)
                                                    <option value="100">100</option>
                                                @endif
                                            </select>
                                            {{__('entries')}}
                                        </label>
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end">
                        <div class="dataTables_filter px-2">
                            <label for="">
                                {{__('Search MacroMeter code')}}:
                                <input type="search" name="query" wire:model="query" class="form-control">
                            </label>
                        </div>
                    </div>
                </div>

                <div class="table-container">

                    <table class="table">
                        <thead class="border-top">
                            <tr>

                                <th class="text-center">{{__('Leader Name')}}</th>
                                <th class="text-center">{{__('Latitude')}}</th>
                                <th class="text-center">{{__('Longitude')}}</th>
                                <th class="text-center">{{__('Transformer quantity')}}</th>
                                <th class="text-center">{{__('user quantity')}}</th>

                                <th class="text-center">{{__('Network status')}}</th>

                                    @if($loggedUserRole == 'Centro de Inteligencia')
                                        <th class="text-center">{{__('Walker')}}</th>
                                    @endif

                                    @if($loggedUserRole == 'Centro de Inteligencia')
                                        <th class="text-center">{{__('macrometer code')}}</th>
                                    @elseif($loggedUserRole == 'Grupo Social')
                                        <th class="text-center">{{__('macrometer code')}}</th>
                                    @endif

                                    <th class="text-center">{{__('options')}}</th>







                                    @if($loggedUserRole != 'Grupo Social')

                                        <th class="text-center">{{__('Actions')}}</th>
                                    @endif
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($terreno as $caminantes)
                            <tr>

                                <td class="text-center">{{$caminantes->Datoscaminante->name}}</td>
                                <td class="text-center">{{$caminantes->Datoscaminante->latitude}}</td>
                                <td class="text-center">{{$caminantes->Datoscaminante->longitude}}</td>
                                <td class="text-center">{{$caminantes->Datoscaminante->Cantidad_transformador}}</td>
                                <td class="text-center">{{$caminantes->Datoscaminante->Cantidad_usuario}}</td>

                                <td class="text-center">{{$caminantes->Datoscaminante->networkstatus->name}}</td>


                                @if($loggedUserRole == 'Centro de Inteligencia')
                                    <td class="text-center">{{$caminantes->Datoscaminante->user->name}}</td>
                                @endif



                                @if($loggedUserRole == 'Centro de Inteligencia')
                                    <td class="text-center">{{$caminantes->code_macromedidor}}</td>
                                @elseif($loggedUserRole == 'Grupo Social')
                                    <td class="text-center">{{$caminantes->code_macromedidor}}</td>
                                @endif






                                <td class="text-center">
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="ti ti-dots-vertical"></i>
                                        </button>

                                        <div class="dropdown-menu dropdown-menu-end m-0">
                                            <div class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#maps" wire:click="openMapModal({{ $caminantes->id }})">
                                                <span class="fw-bold">Mapas</span>
                                                <button class="btn btn-sm btn-icon edit-record" data-bs-toggle="modal" data-bs-target="#maps" wire:click="openMapModal({{ $caminantes->id }})">
                                                    <i class="fa-solid fa-location-dot"></i>
                                                </button>
                                            </div>

                                            <div class="dropdown-item" type="button"  data-bs-toggle="modal" data-bs-target="#observaciones" wire:click="openMapModalobservaciones({{ $caminantes->id }})">
                                                <span class="fw-bold">Observaciones</span>
                                                <button class="btn btn-sm btn-icon edit-record" data-bs-toggle="modal" data-bs-target="#observaciones" wire:click="openMapModalobservaciones({{ $caminantes->id }})">
                                                    <i class="fa-regular fa-comment-dots"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </td>








                                @if($loggedUserRole != 'Grupo Social')

                                    <td class="text-center">
                                        <div class="d-inline-block text-nowrap">
                                            <button class="btn btn-sm btn-icon edit-record" data-bs-toggle="modal" data-bs-target="#edit" wire:click="edit({{$caminantes->id}})">
                                                <i class="ti ti-edit"></i>
                                            </button>

                                        </div>
                                    </td>
                                @endif
                            </tr>
                        @empty
                            <tr class="odd">
                                <td valign="top" colspan="12" class="dataTables_empty text-center">{{$readyToLoad?__('No records'):__('Loading...')}}</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>

                </div>

                @if ($readyToLoad)
                    @if($terreno->total()!=0)
                        <div class="row mx-2 my-3">
                            <div class="col-md-5">
                                <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">
                                    {{__('Showing')}} {{ $terreno->firstItem() }} {{__('to')}} {{ $terreno->lastItem() }} {{__('of')}} {{ $terreno->total() }} {{__('results')}}
                                </div>
                            </div>
                            <div class="col-md-7 d-flex justify-content-end">
                                @if ($terreno->hasPages())
                                    {{$terreno->links('vendor.livewire.bootstrap')}}
                                @endif
                            </div>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>

    @include('ControlTerrenos.maps')
    @include('ControlTerrenos.observation')
    @include('ControlTerrenos.edit')
</div>
