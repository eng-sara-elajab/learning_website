@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Admin Panel -<span style="opacity: 0.8; margin-left: 10px">Chats</span></h1>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6" style="margin-bottom: 60px; text-align: center; font-size: 18px; font-family: 'Segoe UI'; color:#0275d8">
        <b data-toggle="modal" data-target="#chatModal" id="open" style="text-decoration: none" class="btn btn-info">Start New Chat&nbsp;<i class='fa fa-plus'></i></b>
    </div>
    <!-- Modal -->
    <div class="modal" tabindex="-1" role="dialog" id="chatModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="alert alert-danger" style="display:none"></div>
                <div class="modal-header">
                    <button type="button" class="pull-left close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{route('admin.create_chat')}}" id="form">
                    @csrf
                    <div class="modal-body">
                        <p class="modal-title" style="font-size: 12px; font-family: 'Segoe UI'; color: darkgray; text-align: center">Quick message to:</p>
                        <select name="user_id" style="width: 80%; text-align: center; display: block; margin: 5% 10%" required>
                            <option selected="selected">Select Receiver</option>
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                        <div class="row">
                            <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                @csrf
                                <label for="Name">Message:</label>
                                <textarea class="form-control input-field" name="body" id="body" style="height: 150px" placeholder="Write your message here..."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="pull-left">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if (session('error'))
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <p style="color: red; font-family: Cambria; font-size: 20px; text-align: center; margin-top: 20px">{{ session('error') }}</p>
        </div>
    @endif
    @if (session('success'))
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <p style="color: green; font-family: Cambria; font-size: 20px; text-align: center; margin-top: 20px">{{ session('success') }}</p>
        </div>
    @endif
    <div class="container-fluid row">
        @foreach($admin_user_chats as $admin_user_chat)
            @foreach($users as $user)
                @if($user->id == $admin_user_chat->user_id)
                    <div class="col-md-10 offset-md-1 col-xs-10 offset-xs-1 row chat-list" style="margin-top: 30px">
                        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10 chat-sender" style="margin-top: 15px">
                            <a>{{$user->name}}</a>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
                            @if($user->profile_photo == null)
                                <img class="img-circle chat-sender-image" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR0ZL7it9GAAc4a1Fb40d6fxu-paaRZ-zG2yQ&usqp=CAU">
                            @else
                                <img class="img-circle chat-sender-image" src="{{asset('images/profiles/'.$user->profile_photo)}}">
                            @endif
                        </div>
                        @foreach($admin_user_messages as $admin_user_message)
                            @if($admin_user_message->chat_room == $admin_user_chat->id)
                                <div class="col-md-10 col-10">
                                    <a href="{{route('admin.one_chat', $admin_user_message->chat_room)}}" class="chat-body">
                                        @if(strlen($admin_user_message->body) > 50)
                                            ....
                                            {{substr($admin_user_message->body,0,50)}}
                                        @else
                                            {{$admin_user_message->body}}
                                        @endif
                                    </a>
                                    <em class="pull-left" style="color: black; margin-left: 15px; opacity: 0.9">{{$admin_user_chat->updated_at->diffForHumans()}}</em><br>
                                    {{--<em class="pull-left" style="color: black; margin-left: 15px; opacity: 0.9">{{$admin_user_chat->updated_at->format("Y/m/d H:i")}}</em><br>--}}
                                </div>
                                <div class="col-md-12 col-xs-12">
                                    <hr style="height: 1px; background-color: darkgray; border: none">
                                </div>
                                @break
                            @endif
                        @endforeach
                    </div>
                @endif
                @endforeach
        @endforeach
    </div>
@endsection