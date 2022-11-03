<div wire:init="init" wire:ignore.self class="modal fade clearfix px-5" id="setting-modal-container" tabindex="-1"
    role="dialog" aria-labelledby="settingModalContainer" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document" style="max-width: 1000px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fa-solid fa-heart fa-xl my-4" style="color:red;"></i>
                    <i class="fa-solid fa-heart fa-xl my-4" style="color:red;"></i>
                    <i class="fa-solid fa-heart fa-xl my-4" style="color:red;"></i>
                </h5>
                <button id="setting-modal-close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        <div class="profile">
                            <div class="avatar" style="bottom:50px;">
                                {{-- <img src="{{asset('front/images/icons/login-icon/login.jpg')}}"
                                    alt="Circle Image" class="img-raised rounded-circle img-fluid"> --}}
                                <img src="{{ asset(isset($userAvatar) ? $userAvatar->img_path : '') }}" alt="100x100"
                                    class="" data-holder-rendered="true">
                            </div>
                        </div>
                    </div>
                </div>
                <form> @csrf
                    <div class="row d-flex justify-content-center" >
                        <div class="upload-btn-wrapper" >
                            <button class="info-settting-upload-btn">Upload ảnh</button>
                            <input type="file" wire:model="photoUpload"  accept=".jpg, .jpeg, .png, .mov"/>
                            {{-- <img style="width:30px; height:30px;" src="{{asset('storage/icons/image-loading.gif')}}"> --}}
                            <div wire:loading wire:target="photoUpload" ><img style="width:20px; height:20px;" src="{{asset('storage/icons/image-loading.gif')}}"></div>
                        </div>
                    </div>
                </form>

                <form wire:submit.prevent="saveUserInfo"> @csrf
                    {{-- <link rel="stylesheet"
                        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}


                    {{-- <input type="file" wire:model="photo"> --}}
                    <div class="row my-2" style="height:30px;">
                        <div class="col-xs-4 h-100 m-0" style="display:block; justify-content: center;">
                            <h5 class="mt-3">Họ tên nè </h5>
                        </div>
                        <div class="col-xs-7 h-100 m-0">
                            <input required wire:model="userName" maxlength="25" type="text"
                                class="form-control h-100" />
                        </div>
                    </div>
                    <div class="row my-2" style="height:30px;">
                        <div class="col-xs-4 h-100 m-0">
                            <h5 class="mt-3">Biệt danh </h5>
                        </div>
                        <div class="col-xs-7 h-100 m-0">
                            <input maxlength="55" type="text" class="form-control h-100" wire:model="userNickname" />
                        </div>
                    </div>
                    <div class="row my-2" style="height:30px;">
                        <div class="col-xs-4 h-100 m-0">
                            <h5 class="mt-3">Ngày sinh </h5>
                        </div>
                        <div class="col-xs-7 h-100 m-0">
                            <input type="date" class="form-control h-100" required wire:model="userDob">
                        </div>
                    </div>
                    <div class="row mt-2" style="height:30px;">
                        <div class="col-xs-6 h-100">
                            <h5 class="mt-3">Quote</h5>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-9 h-100">
                            <textarea class="form-control" rows="3" wire:model="userQuote"></textarea>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        @error('userName')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        @error('userDob')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        @error('photoUpload')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" type="button" class="btn modal-btn">Lưu thay đổi</button>
                    </div>
                </form>

            </div>
        </div>
    </div>





    <style>
        #setting-modal-container{
            border-radius: 6px;
        }
        .modal-btn {
            background-color: #ff64b8;
            color: white;
        }

        .modal-btn:hover {
            background-color: white;
            color: #ff64b8;
            border: 1px solid #ff64b8;
        }

        ::placeholder {
            color: red;
            opacity: 1;
            /* Firefox */
        }

        :-ms-input-placeholder {
            /* Internet Explorer 10-11 */
            color: red;
        }

        ::-ms-input-placeholder {
            /* Microsoft Edge */
            color: red;
        }
    </style>


</div>

<div wire:init="init" wire:ignore.self class="modal fade clearfix px-5" id="accept-avatar-modal" tabindex="-1"
    role="dialog" aria-labelledby="settingModalContainer" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document" style="max-width: 500px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <p id="accept-avatar-modal-title"></p>
                </h5>
                <button id="accept-avatar-modal-close" type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        <div class="profile">
                            <div class="avatar" style="bottom:0px;">
                                <img id="accept-avatar-show" src="" alt="100x100" class=""
                                    data-holder-rendered="true">

                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer d-flex justify-content-center">
                    <button id="upload-avatar-btn" type="button" class="btn modal-btn">Đặt ảnh này làm avatar</button>
                </div>


            </div>
        </div>
    </div>
</div>
