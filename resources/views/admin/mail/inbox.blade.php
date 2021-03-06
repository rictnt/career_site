@extends('admin')
@section('page_title','Mail')
@section('content')
    <div class="portlet light">
        <div class="portlet-body">
            <div class="row inbox">
                <div class="col-md-2">

                    <ul class="inbox-nav margin-bottom-10">
                        <li class="compose-btn">
                            <a href="javascript:;" data-title="Compose" class="btn green">
                                <i class="fa fa-edit"></i> Compose </a>
                        </li>
                        <li class="inbox active">
                            <a href="javascript:;" class="btn" data-title="Inbox">
                                Inbox(3) </a>
                            <b></b>
                        </li>
                        <li class="sent">
                            <a class="btn" href="javascript:;" data-title="Sent">
                                Sent </a>
                            <b></b>
                        </li>
                        <li class="draft">
                            <a class="btn" href="javascript:;" data-title="Draft">
                                Draft </a>
                            <b></b>
                        </li>
                        <li class="trash">
                            <a class="btn" href="javascript:;" data-title="Trash">
                                Trash </a>
                            <b></b>
                        </li>
                    </ul>
                </div>
                <div class="col-md-10">
                    <div class="inbox-header">
                        <h1 class="pull-left">Inbox</h1>
                        <form class="form-inline pull-right" action="index.html">
                            <div class="input-group input-medium">
                                <input type="text" class="form-control" placeholder="Password">
											<span class="input-group-btn">
											<button type="submit" class="btn green"><i class="fa fa-search"></i></button>
											</span>
                            </div>
                        </form>
                    </div>
                    <div class="inbox-loading" style="display: block;">
                        Loading...
                    </div>
                    <div class="inbox-content"></div>
                </div>
            </div>
        </div>
    </div>
@endsection