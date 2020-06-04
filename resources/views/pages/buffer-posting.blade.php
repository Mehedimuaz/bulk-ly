@extends('layouts.app')
@section('content')
    <div class="container-fluid app-body">
        <h3>Buffer Postings

            @if($user->plansubs())
                @if($user->plansubs()['plan']->slug == 'proplusagencym' OR $user->plansubs()['plan']->slug == 'proplusagencyy' )
                    <a href="https://bufferapp.com/oauth2/authorize?client_id={{env('BUFFER_CLIENT_ID')}}&redirect_uri={{env('BUFFER_REDIRECT')}}&response_type=code" class="btn btn-primary pull-right">Add Buffer Account</a>
                @endif
            @endif




        </h3>

        <div class="row>">
            <div class="col-md-12">
                <form action="{{url('buffer-postings/')}}" method="POST">
                    {{csrf_field()}}
                    <div class="col-md-4">
                        <select name="group_type">
                            <option value="">All Groups</option>
                            @foreach($socialPostGroups as $group)
                                <option value="{{$group->type}}">{{$group->type}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input type="date" name="date">
                    </div>
                    <div>
                        <button type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover social-accounts">
                            <thead>
                            <tr>
                                <th>Group</th>
                                <th>Account Service</th>
                                <th>Post Text</th>
                                <th>Time</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($bufferPostings as $bufferPosting)
                                <tr>
                                    <?php
                                    $group = \Bulkly\SocialPostGroups::find($bufferPosting->group_id);?>
                                    <td>{{isset($group)? $group->name: ''}}</td>
                                    <td>{{$bufferPosting->account_service}}</td>
                                    <td>{{$bufferPosting->post_text}}</td>
                                    <td><?php echo date('d M, Y h:i a', strtotime($bufferPosting->created_at)) ?></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {{$bufferPostings->links()}}
                </div>

{{--                <example-component></example-component>--}}
            </div>
        </div>
    </div>
@endsection
