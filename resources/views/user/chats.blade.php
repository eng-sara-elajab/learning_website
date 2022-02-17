@extends('layouts.user')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">User Panel -<span style="opacity: 0.8; margin-left: 10px">Chats</span></h1>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container-fluid row">
        @if(count($admin_user_chats) > 0)
            @foreach($admin_user_chats as $admin_user_chat)
                @foreach($admins as $admin)
                    @if($admin->id == $admin_user_chat->admin_id)
                        <div class="col-md-10 offset-md-1 col-xs-10 offset-xs-1 row chat-list" style="margin-top: 30px">
                            <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10 chat-sender" style="margin-top: 15px">
                                <a>{{$admin->name}}</a>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
                                @if($admin->profile_photo == null)
                                    <img class="img-circle chat-sender-image" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR0ZL7it9GAAc4a1Fb40d6fxu-paaRZ-zG2yQ&usqp=CAU">
                                @else
                                    <img class="img-circle chat-sender-image" src="{{asset('images/profiles/'.$admin->profile_photo)}}">
                                @endif
                            </div>
                            @foreach($admin_user_messages as $admin_user_message)
                                @if($admin_user_message->chat_room == $admin_user_chat->id)
                                    <div class="col-md-10 col-10">
                                        <a href="{{route('one_chat', $admin_user_message->chat_room)}}" class="chat-body">
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
        @else
            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                <h1 style="font-size: 30px; margin-top: 7%; text-align: center; color: darkorange">No messages</h1>
            </div>
        @endif
    </div>
@endsection