@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Admin Panel -<span style="opacity: 0.8; margin-left: 10px">Contacts</span></h1>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="container-fluid row">
        @if(count($contacts) > 0)
            <div style="margin-top: 7%">
                @foreach($contacts as $contact)
                    <a class="chat-body" title="Click to view message" data-toggle="modal" data-target="#view_message{{$contact->id}}" data-backdrop="static" data-keyboard="false">
                        <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-10 offset-1 row chat-list" style="background-color : {{$contact->status == 'read' ? 'lightgrey' : 'white'}}; border-bottom: solid 1px darkgrey; height: 70px">
                            <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-10 offset-1 chat-sender" style="margin-top: 15px">

                                    <span>{{$contact->name}}</span><br>
                                    <span style="margin-right: 20px; color: black; font-size: 14px">
                                        @if(strlen($contact->message) > 30)
                                            {{substr($contact->message,0,30)}}
                                        @else
                                            {{$contact->message}}
                                        @endif
                                    </span>
                                <em class="pull-left" style="color: black; margin-left: 15px; opacity: 0.9; font-size: 11px">{{$contact->created_at->diffForHumans()}}</em>
                            </div>
                        </div>
                    </a>
                    <div class="modal fade" id="view_message{{$contact->id}}" tabindex="-1" aria-labelledby="exampleModalLable">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <h3 class="modal-title" id="exampleModalLable" style="text-align: center; color: darkred">{{$contact->name}}</h3>
                                    </div>
                                    <div class="modal-body col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <h5 style="color: black; text-align: left; display: block">{{$contact->message}}</h5>
                                        <em class="pull-right btn-default" style="color: black; margin-right: 15px; opacity: 0.9; font-size: 13px">Email: {{$contact->email}}</em>
                                    </div>
                                    <div class="modal-footer col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <form action="{{route('admin.mark_as_read')}}" method="Post">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="contact_id" value="{{$contact->id}}">
                                            <div class="modal-footer">
                                                <button class="btn btn-danger">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-10 offset-1 row">
                    <span style="margin-top: 2%">{{$contacts->links()}}</span>
                </div>
            </div>
        @else
            <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-10 offset-1">
                <h3 style="text-align: center; opacity: 0.7; margin-top: 12%">No Contact messages</h3>
            </div>
        @endif
    </div>
@endsection