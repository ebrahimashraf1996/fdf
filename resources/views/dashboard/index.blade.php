
@extends('layouts.admin')

@section('title')
    Control Panel
    @stop


@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                @include('dashboard.includes.alerts.success')
                @include('dashboard.includes.alerts.errors')

                <div class="row">
                    <div class="co-md-12 text-center block">
                        <h1 style="color: #aba526; font-family: serif; font-weight: 900; font-size: 48px">لوحة تحكم مؤسسة FDF للتصميم والديكورات</h1>
                    </div>
                    <div class="co-md-12 text-center block">
                        <img style="margin-top: 20px" width="360" height="300" src="{{asset('assets/front/images/logo.png')}}" alt="LOGO"/>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @stop
