@livewire('setting-page')
<div class="modal fade clearfix px-5" id="setting-modal-container" tabindex="-1" role="dialog"
    aria-labelledby="settingModalContainer" aria-hidden="true">
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
                <form method="POST" action=""> @csrf
                    <div class="row my-2" style="height:30px;">
                        <div class="col-xs-4 h-100 m-0" style="display:block; justify-content: center;">
                            <h5 class="mt-3">Họ tên nè </h5>
                        </div>
                        <div class="col-xs-7 h-100 m-0">
                            <input maxlength="25" name='userName' type="text" class="form-control h-100"
                                value="" />
                        </div>
                    </div>
                    <div class="row my-2" style="height:30px;">
                        <div class="col-xs-4 h-100 m-0">
                            <h5 class="mt-3">Biệt danh </h5>
                        </div>
                        <div class="col-xs-7 h-100 m-0">
                            <input maxlength="55" name='userName' type="text" class="form-control h-100"
                                value="" />
                        </div>
                    </div>
                    <div class="row my-2" style="height:30px;">
                        <div class="col-xs-4 h-100 m-0">
                            <h5 class="mt-3">Test Livewire </h5>
                        </div>
                        <div class="col-xs-7 h-100 m-0">
                            <input maxlength="55" name='userName' type="text" class="form-control h-100"
                                value="" wire:model="testMessage"/>
                        </div>
                        <p>{{$testMessage}}</p>
                    </div>
                    <div class="row my-2" style="height:30px;">
                        <div class="col-xs-4 h-100 m-0">
                            <h5 class="mt-3">Ngày sinh </h5>
                        </div>
                        <div class="col-xs-7 h-100 m-0">
                            <input type="date" class="form-control h-100" value="" required>
                        </div>

                    </div>
                    <div class="row mt-2" style="height:30px;">
                        <div class="col-xs-6 h-100">
                            <h5 class="mt-3">Quote</h5>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center" >
                        <div class="col-md-9 h-100">
                            <textarea class="form-control"  rows="3"></textarea>
                        </div>
                    </div>
                </form>

            </div>

            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn modal-btn">Lưu thay đổi</button>
            </div>
        </div>
    </div>


    <style>
        .modal-btn {
            background-color: #ff64b8;
            color: white;
        }

        .modal-btn:hover {
            background-color: white;
            color: #ff64b8;
            border: 1px solid #ff64b8;
        }
    </style>

</div>
