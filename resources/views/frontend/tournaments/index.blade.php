@extends('frontend.layouts.app')
@section('title',__('Mi.futbol'))

@section('content')
    <div class="container-xl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> {{$tournament->name}}</h4>

        <div class="nav-align-top mb-4">
            <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
                @foreach($tournament->groups as $group)
                    @if($group->matches->count()!=0)
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link {{ $group->id == 1 ? 'active' : '' }}" role="tab" data-bs-toggle="tab" data-bs-target="#group-{{$group->id}}" aria-controls="navs-pills-justified-home" aria-selected="true">
                                <i class="tf-icons ti ti-home ti-xs me-1"></i>  {{$group->name}}
                                {{--                            <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-danger ms-1"> {{$group->matches->count()}}</span>--}}
                            </button>
                        </li>
                    @endif

                @endforeach
            </ul>
            <div class="tab-content">
                @foreach($tournament->groups as $group)
                    <div class="tab-pane fade show  {{ $group->id == 1 ? 'active' : '' }}" id="group-{{$group->id}}" role="tabpanel">
                       @foreach($group->matches as $match)
                           <div class="row text-center d-flex align-items-center">
                               <div class="col-md-4">
                                   @if($match->team_one->logo!=null)
                                       <div class="avatar-wrapper d-flex justify-content-center">
                                           <div class="avatar avatar-xl p-2 rounded-circle bg-label-primary">
                                               <img src="{{asset('uploads/teams/'.$match->team_one->logo)}}" alt="Avatar" class="">
                                           </div>
                                       </div>
                                   @else
                                       <div class="avatar-wrapper d-flex justify-content-center">
                                           <div class="avatar avatar-xl">
                                               <span class="avatar-initial rounded-circle bg-label-primary">{{$match->team_one->name[0]}}</span>
                                           </div>
                                       </div>
                                   @endif
                                   <h5 class="my-2">
                                       {{$match->team_one->name}}
                                   </h5>
                               </div>
                               <div class="col-md-4">
                                    <h4>
                                        {{ date('d M Y', strtotime($match->date))}}
                                    </h4>
                                   <h5>
                                       {{ date('H:m', strtotime($match->hour))}}
                                   </h5>

                               </div>
                               <div class="col-md-4">
                                   @if($match->team_two->logo!=null)
                                       <div class="avatar-wrapper d-flex justify-content-center">
                                           <div class="avatar avatar-xl p-2 rounded-circle bg-label-primary">
                                               <img src="{{asset('uploads/teams/'.$match->team_two->logo)}}" alt="Avatar" class="">
                                           </div>
                                       </div>
                                   @else
                                       <div class="avatar-wrapper d-flex justify-content-center">
                                           <div class="avatar avatar-xl">
                                               <span class="avatar-initial rounded-circle bg-label-primary">{{$match->team_two->name[0]}}</span>
                                           </div>
                                       </div>
                                   @endif
                                       <h5 class="my-2">
                                           {{$match->team_two->name}}
                                       </h5>
                               </div>
                           </div>
                            <hr>
                       @endforeach
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
