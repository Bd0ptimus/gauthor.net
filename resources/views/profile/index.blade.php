<!DOCTYPE html>
<html class="no-js">
@include('layouts.layoutMaster')
@include('layouts.profile.profileLayoutsStyle')
@include('layouts.loadingScreen')
@include('layouts.uploadingScreen')

<body class="profile-page">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    @include('layouts.navbar1')
    @include('layouts.toasts.toast')

    <div class="toast toast-color" id="notification" data-delay="3000">
        <div class="toast-header toast-color">
            <strong class="mr-auto">SCROLLED!</strong>
            <small>Just Now</small>

            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>

        <div class="toast-body">
            Hi! You just scrolled the paragaraph.
        </div>
    </div>

    <!--page-header header-filter   profile-page-->
    <div class="profile-header" data-parallax="true"
        style="background-image:url('http://wallpapere.org/wp-content/uploads/2012/02/black-and-white-city-night.png');"
        style="margin:0px;">
    </div>
    <div class="main main-raised">
        <div class="profile-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        <div class="profile">
                            <div class="avatar">
                                {{-- <img src="{{asset('front/images/icons/login-icon/login.jpg')}}"
                                    alt="Circle Image" class="img-raised rounded-circle img-fluid"> --}}
                                <img src="{{ asset(isset($userAvatar) ? $userAvatar->img_path : '') }}" alt="100x100"
                                    id="profile-avatar" data-holder-rendered="true">
                            </div>
                            <div class="name">
                                <h3 id="user-name" class="title">{{ $userProfile->name }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="description text-center">
                    <p id="user-nickname">{{ $userProfile->nickname }} </p>
                    <p id="user-dob">{{ $userProfile->dob }} </p>
                    <p id="user-quote">{{ $userProfile->quote }}</p>
                </div>
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        <div class="profile-tabs">
                            <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                                @if ($darlingOnWatching == false)
                                    <li class="nav-item">
                                        <a class="nav-link active pe-auto" id="darling-btn" role="tab"
                                            data-toggle="tab" style="height:100%; width: 120px;">
                                            <i class="fa-solid fa-heart fa-xl my-4"></i>
                                            Người iu nè
                                        </a>
                                    </li>
                                    <li class="nav-item pe-auto">
                                        <a class="nav-link pe-auto" id="picture-btn" role="tab" data-toggle="tab"
                                            style="height:100%; width: 120px;">
                                            <i class="fa-solid fa-image fa-xl my-4"></i>
                                            Ảnh nè
                                        </a>
                                    </li>
                                    <li class="nav-item" id="setting-container">
                                        <a id="setting-modal-open" class="nav-link pe-auto" role="tab"
                                            data-toggle="tab" style="height:100%; width: 120px;">
                                            <!--href="#favorite" data-target="#modalLessonSampleContent"-->
                                                <i class="fa-sharp fa-solid fa-gear fa-xl my-4" id="info-setting"></i>
                                                Thay đổi thông tin
                                        </a>
                                    </li>
                                @endif


                            </ul>
                        </div>
                    </div>
                </div>


                <div class="tab-content tab-space">
                    @if ($darlingOnWatching == false)
                        <div class="tab-pane active text-center darling " id="darling" style="display:block;">

                            <a class="row d-flex justify-content-center m-auto" id="darling-row"
                                style="max-width:500px;"
                                href="{{ route('profile.darling', ['darling_id' => $darlingProfile->id]) }}">
                                <div id="darling-avatar-section" style="height:100%; width:40%;">
                                    <span class="vertical-helper"></span>
                                    <img class="align-middle"
                                        src="{{ asset(isset($darlingAvatar) ? $darlingAvatar->img_path : '') }}"
                                        alt="100x100" id="darling-avatar" data-holder-rendered="true">
                                </div>
                                <div id="darling-info-section m-auto" style="height:100%; width:60%; display:table;">
                                    <div class="align-middle"
                                        style="margin:auto; display:table-cell; vertical-align:middle;">
                                        <p class="darling-row-text">{{ $darlingProfile->name }}</p>
                                        <p class="darling-row-text">{{ $darlingProfile->quote }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif

                    <div class="tab-pane active text-center gallery" id="picture"
                        @if ($darlingOnWatching) style="display:block;" @else style="display:none;" @endif>
                        <div class="row" style="width:100%; position:relative; height : 300px; display:none; margin:auto;" id="user-image-loading-icon">
                            @include('layouts.loadingIcon')
                        </div>
                        <div class="row" id="user-image-album">
                            @foreach ($userImages as $image)
                                <div class="img-container" id="image-{{ $image->id }}">
                                    <img class="rounded" src="{{ asset($image->img_path) }}" style="margin-bottom:0px;"
                                        alt="personal image">
                                    <div class="img-title-sec">
                                        <div class="img-float-title-container">
                                            <p class="img-title">
                                                {{ $image->status }}
                                            </p>
                                        </div>
                                        @if ($darlingOnWatching == false)
                                            <i id="{{ $image->id }}"
                                                class="fa-solid fa-trash-can fa-2xl delete-icon"></i>
                                            <i class="fa-solid fa-image-portrait"></i>
                                        @endif

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- <div class="tab-pane text-center gallery" id="works">
                        <div class="row">
                            <div class="col-md-3 ml-auto">
                                <img src="https://images.unsplash.com/photo-1524498250077-390f9e378fc0?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=83079913579babb9d2c94a5941b2e69d&auto=format&fit=crop&w=751&q=80"
                                    class="rounded">
                                <img src="https://images.unsplash.com/photo-1506667527953-22eca67dd919?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=6326214b7ce18d74dde5e88db4a12dd5&auto=format&fit=crop&w=750&q=80"
                                    class="rounded">
                                <img src="https://images.unsplash.com/photo-1505784045224-1247b2b29cf3?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=ec2bdc92a9687b6af5089b335691830e&auto=format&fit=crop&w=750&q=80"
                                    class="rounded">
                            </div>
                            <div class="col-md-3 mr-auto">
                                <img src="https://images.unsplash.com/photo-1504346466600-714572c4b726?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=6754ded479383b7e3144de310fa88277&auto=format&fit=crop&w=750&q=80"
                                    class="rounded">
                                <img src="https://images.unsplash.com/photo-1494028698538-2cd52a400b17?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=83bf0e71786922a80c420c17b664a1f5&auto=format&fit=crop&w=334&q=80"
                                    class="rounded">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane text-center gallery" id="favorite">
                        <div class="row">
                            <div class="col-md-3 ml-auto">
                                <img src="https://images.unsplash.com/photo-1504346466600-714572c4b726?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=6754ded479383b7e3144de310fa88277&auto=format&fit=crop&w=750&q=80"
                                    class="rounded">
                                <img src="https://images.unsplash.com/photo-1494028698538-2cd52a400b17?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=83bf0e71786922a80c420c17b664a1f5&auto=format&fit=crop&w=334&q=80"
                                    class="rounded">
                            </div>
                            <div class="col-md-3 mr-auto">
                                <img src="https://images.unsplash.com/photo-1505784045224-1247b2b29cf3?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=ec2bdc92a9687b6af5089b335691830e&auto=format&fit=crop&w=750&q=80"
                                    class="rounded">
                                <img src="https://images.unsplash.com/photo-1524498250077-390f9e378fc0?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=83079913579babb9d2c94a5941b2e69d&auto=format&fit=crop&w=751&q=80"
                                    class="rounded">
                                <img src="https://images.unsplash.com/photo-1506667527953-22eca67dd919?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=6326214b7ce18d74dde5e88db4a12dd5&auto=format&fit=crop&w=750&q=80"
                                    class="rounded">
                            </div>
                        </div>
                    </div> --}}
                </div>


            </div>
        </div>
    </div>
    {{-- <livewire:setting-page /> --}}

    @livewire('setting-page')
    {{-- @include('templates.settings.infoSetting') --}}
    @extends('layouts.footer')
    @include('layouts.profile.profileLayoutsScript')
    @include('templates.image.watchImage')

    <script>
        $(document).ready(function() {
            $('#loading').hide();

            $('#avatarUpload').change(function() {
                var filesTypesAccept = ['jpg', 'jpeg', 'png', 'gif', 'svg'];
                console.log('avatarUpload : ', this.files[0]);
                var extension = this.files[0].name.split('.').pop().toLowerCase();
                fileExtensionAccept = filesTypesAccept.indexOf(extension) > -1;
                if (fileExtensionAccept) {
                    fileSizeAccept = this.files[0].size < 15728640;
                    if (fileSizeAccept) {
                        let reader = new FileReader();
                        reader.onload = (e) => {
                            // console.log('check name file: ', e.target.result);
                            $('#accept-avatar-show').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(this.files[0]);
                        $('#accept-avatar-modal').modal('show');
                        $('#avatar-upload-warning').text('');

                    } else {
                        $('#avatar-upload-warning').text(
                            'Kích thước ảnh lớn quá rùi. Chỉ chấp ảnh tối đa 15Mb thui nhó!');
                    }
                } else {
                    $('#avatar-upload-warning').text('Ủa, chỉ up ảnh thui chớ');
                }

            });
        });

        function settingModalReset() {
            $('.error-text').text('');

        }

        $('#setting-modal-close').on('click', function(e) {
            // console.log('modal-close');
            $('#setting-modal-container').modal('hide');
        })

        $('#setting-modal-open').on('click', function(e) {
            // console.log('modal active');
            $('.tab-pane').css('display', 'none');
            settingModalReset();
            $('#setting-modal-container').modal('show');
        })

        $('#darling-btn').on('click', function() {
            $('.tab-pane').css('display', 'none');
            $('#darling').css('display', 'block');
        });

        $('#picture-btn').on('click', function() {
            $('#user-image-loading-icon').show();
            $('#user-image-album').empty();
            $.ajax({
                type: 'get',
                url: "{{ route('profile.loadUserImage', ['userId' => $userProfile->id]) }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    // console.log('respose success : ', response);
                    response.data.images.forEach(function(e){
                        $('#user-image-album').append(`<div class="img-container" id="image-${e.id}">
                                    <img class="rounded" src="{{ asset('${e.img_path}') }}" style="margin-bottom:0px;"
                                        alt="personal image">
                                    <div class="img-title-sec">
                                        <div class="img-float-title-container">
                                            <p class="img-title">
                                                ${e.status==null?'':e.status}
                                            </p>
                                        </div>
                                        @if ($darlingOnWatching == false)
                                            <div class="row d-flex justify-content-between action-bar">
                                                <i id="${e.id}" class="fa-solid fa-trash-can fa-2xl delete-icon" onclick="deleteImage(${e.id})"></i>
                                                <i class="fa-solid fa-image-portrait fa-2xl setavatar-icon" onclick="setAvatar(${e.id})"></i>
                                                <i class="fa-solid fa-bars fa-2xl detail-icon" onclick="checkDetail(${e.id})"></i>
                                            </div>

                                        @endif

                                    </div>
                                </div>`);
                    });
                    $('#user-image-loading-icon').hide();
                },
                error: function(response) {
                    $('#image-input-error').text(response.responseJSON.message);
                }
            });
            $('.tab-pane').css('display', 'none');
            $('#picture').css('display', 'block');
        });

        window.addEventListener('user-info-setting-updated', event => {
            $('#user-name').text(event.detail.user['name']);
            $('#user-nickname').text(event.detail.user['nickname']);
            $('#user-dob').text(event.detail.user['dob']);
            $('#user-quote').text(event.detail.user['quote']);
        });

        // window.addEventListener('user-avatar-updated', (event) => {
        //     $('#accept-avatar-modal').modal('show');
        //     $('#accept-avatar-show').attr('src', event.detail.avatarData['avatar']);
        //     $('#accept-avatar-modal-title').text(event.detail.avatarData['modal-title']);
        //     $('#uploading').hide();

        // });

        // window.addEventListener('user-avatar-updated-complete', event => {
        //     $('#accept-avatar-modal').modal('hide');
        //     location.reload();
        //     // $('#profile-avatar').attr('src', event.detail.avatarData['avatar_url']);
        // });

        $('#accept-avatar-modal-close').on('click', function(e) {
            $('#accept-avatar-modal').modal('hide');

        })

        // $('#upload-avatar-btn').on('click', function(e) {
        //     Livewire.emit('avatarUploaded');
        // });

        function deleteImage(imageId){
            console.log('delete-icon-click');

            $.ajax({
                method: 'post',
                url: '{{ route('profile.deleteImage') }}',
                data: {
                    id: imageId,
                    _token: '{{ csrf_token() }}',
                },
                success: function(data) {
                    console.log('data response : ', JSON.stringify(data));
                    if (data['error'] == 0) {
                        $('#toast-success-text').text('Xóa ảnh thành công nè!');
                        $('#notification-success').toast('show');
                        $(`#image-${imageId}`).hide();
                    } else {
                        $('#toast-success-text').text('Ơ, bị lỗi rồi, thử xóa lại nha!');
                        $('#notification-fail').toast('show');
                    }
                }

            });
        }

        function checkDetail(imageId){
            $.ajax({
                method: 'post',
                url: '{{ route('profile.checkDetailImage') }}',
                data: {
                    id: imageId,
                    _token: '{{ csrf_token() }}',
                },
                success: function(data) {
                    console.log('data response : ', JSON.stringify(data));
                    if (data['error'] == 0) {
                        $('#watchImageShow').attr('src',data.img_url);
                        $('#watchImageStatus').text(data.img_status);
                        $('#watchImage-modal-container').modal('show');
                    } else {
                        // $('#toast-success-text').text('Ơ, bị lỗi rồi, thử xóa lại nha!');
                        // $('#notification-fail').toast('show');
                    }
                }

            });
        }

        function setAvatar(imageId){
            $.ajax({
                method: 'post',
                url: '{{ route('profile.setAvatar') }}',
                data: {
                    id: imageId,
                    _token: '{{ csrf_token() }}',
                },
                success: function(data) {
                    console.log('data response : ', JSON.stringify(data));
                    if (data['error'] == 0) {
                        $('#toast-success-text').text('Thay đổi avatar thành công nè!');
                        $('#notification-success').toast('show');
                        setTimeout(function(){
                            window.location.reload();
                        }, 500);
                    } else {
                        $('#toast-success-text').text('Ơ, bị lỗi rồi, thử xóa lại nha!');
                        $('#notification-fail').toast('show');
                    }
                }

            });
        }


        $('#upload-avatar-btn').on('click', function() {
            $('#uploading').show();
            var imageTest = document.getElementById('avatarUpload').files;
            // console.log('imageTest : ', imageTest);

            var image = $('#avatarUpload').prop('files');
            // console.log('check image : ', image);

            let formData = new FormData();
            let file = image[0];
            formData.append('avatarUpload', file);
            // console.log('form data : ', formData);
            $.ajax({
                type: 'post',
                url: "{{ route('profile.setting.upload_avatar', ['userId' => $userProfile->id]) }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log('respose success');
                    $('#accept-avatar-modal').modal('hide');
                    $('#profile-avatar').attr('src', response.new_avt);
                    $('#settingInfoAvatar').attr('src', response.new_avt);
                    $('#uploading').hide();
                },
                error: function(response) {
                    $('#accept-avatar-modal').modal('hide');
                    $('#avatar-upload-warning').text("Bị lỗi rùi, thử lại nha");
                    $('#uploading').hide();
                }
            });


        })
    </script>

</body>

</html>
