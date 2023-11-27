@extends('layouts.main')
@section('content')
    <style>
        .form-check {
            left: 15px;
        }
    </style>
    @include('user.header')
    <div class="row">
        <div class="col-12">
            <span class="cnst-subtitle">
                Notifications
            </span>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <table class="st-table">
                <tr>
                    <th>Сategory</th>
                    <th>Email</th>
                    <th>Site</th>
                </tr>
                @if (auth()->user()->hasRole('Designer'))
                    {{-- <tr>
                    <td>Change rounds of contest</td>
                    <td>
                        <a class="st-done {{ !empty($notificationArray) && in_array("contest_movement_email", $notificationArray["active"]) ? "activ" : "" }}" data-id="contest_movement_email">
                            <i class="far fa-check-circle"></i>
                        </a>
                    </td>
                    <td>
                        <a class="st-done {{ !empty($notificationArray) && in_array("contest_movement_site", $notificationArray["active"]) ? "activ" : "" }}" data-id="contest_movement_site">
                            <i class="far fa-check-circle"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>Your work move to the next round</td>
                    <td>
                        <a class="st-done {{ !empty($notificationArray) && in_array("work_movement_email", $notificationArray["active"]) ? "activ" : "" }}" data-id="work_movement_email">
                            <i class="far fa-check-circle"></i>
                        </a>
                    </td>
                    <td>
                        <a class="st-done {{ !empty($notificationArray) && in_array("work_movement_site", $notificationArray["active"]) ? "activ" : "" }}" data-id="work_movement_site">
                            <i class="far fa-check-circle"></i>
                        </a>
                    </td>
                </tr> --}}
                    <tr>
                        <td>Winner</td>
                        <td>
                            <a class="st-done {{ !empty($notificationArray) && in_array('winner_email', $notificationArray['active']) ? 'activ' : '' }}"
                                data-id="winner_email">
                                <i class="far fa-check-circle"></i>
                            </a>
                        </td>
                        <td>
                            <a class="st-done {{ !empty($notificationArray) && in_array('winner_site', $notificationArray['active']) ? 'activ' : '' }}"
                                data-id="winner_site">
                                <i class="far fa-check-circle"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Deadline</td>
                        <td>
                            <a class="st-done {{ !empty($notificationArray) && in_array('deadline_email', $notificationArray['active']) ? 'activ' : '' }}"
                                data-id="deadline_email">
                                <i class="far fa-check-circle"></i>
                            </a>
                        </td>
                        <td>
                            <a class="st-done {{ !empty($notificationArray) && in_array('deadline_site', $notificationArray['active']) ? 'activ' : '' }}"
                                data-id="deadline_site">
                                <i class="far fa-check-circle"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Like your work</td>
                        <td>
                            <a class="st-done {{ !empty($notificationArray) && in_array('work_like_email', $notificationArray['active']) ? 'activ' : '' }}"
                                data-id="work_like_email">
                                <i class="far fa-check-circle"></i>
                            </a>
                        </td>
                        <td>
                            <a class="st-done {{ !empty($notificationArray) && in_array('work_like_site', $notificationArray['active']) ? 'activ' : '' }}"
                                data-id="work_like_site">
                                <i class="far fa-check-circle"></i>
                            </a>
                        </td>
                    </tr>
                @else
                    <tr>
                        <td>Work Upload</td>
                        <td>
                            <a class="st-done {{ !empty($notificationArray) && in_array('work_upload_email', $notificationArray['active']) ? 'activ' : '' }}"
                                data-id="work_upload_email">
                                <i class="far fa-check-circle"></i>
                            </a>
                        </td>
                        <td>
                            <a class="st-done {{ !empty($notificationArray) && in_array('work_upload_site', $notificationArray['active']) ? 'activ' : '' }}"
                                data-id="work_upload_site">
                                <i class="far fa-check-circle"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Close/Confirm Work</td>
                        <td>
                            <a class="st-done {{ !empty($notificationArray) && in_array('close_work_email', $notificationArray['active']) ? 'activ' : '' }}"
                                data-id="close_work_email">
                                <i class="far fa-check-circle"></i>
                            </a>
                        </td>
                        <td>
                            <a class="st-done {{ !empty($notificationArray) && in_array('close_work_site', $notificationArray['active']) ? 'activ' : '' }}"
                                data-id="close_work_site">
                                <i class="far fa-check-circle"></i>
                            </a>
                        </td>
                    </tr>
                @endif
            </table>
        </div>
    </div>
    <div class="row">
        <form action="{{ route('user.notification.update') }}" method="post" id="notification_form">
            <div class="col-lg-12 col-md-12 d-flex align-items-start justify-content-between">
                <div class="wrp-btn">
                    <button class="btn btn-primary btn-success wide"
                        type="submit">{{ !empty($notificationArray) ? 'Update' : 'Save' }} </button>
                </div>
            </div>
        </form>
    </div>
@endsection
