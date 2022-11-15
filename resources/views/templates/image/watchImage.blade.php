<div class="modal fade clearfix px-5" id="watchImage-modal-container" tabindex="-1" role="dialog"
    aria-labelledby="watchImageModalContainer" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document" style="max-width: 1000px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fa-solid fa-heart fa-xl my-4" style="color:red;"></i>
                    <i class="fa-solid fa-heart fa-xl my-4" style="color:red;"></i>
                    <i class="fa-solid fa-heart fa-xl my-4" style="color:red;"></i>
                </h5>
                <button id="watchImage-modal-close" type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body">
                <div class="row d-flex justify-content-center">
                    <div class="image-showing-sec">
                        <img class="image-showing" src="{{ asset(isset($userAvatar) ? $userAvatar->img_path : '') }}"
                            id="watchImageShow" alt="image" class="" data-holder-rendered="true">
                    </div>
                </div>
                <div class="row d-block justify-content-center" style="margin: 30px 0px;">
                    <div class="row justify-content-center" id="watchImage-nonEdit_status" style="display:block;">
                        <div class="row" style="width: auto; margin: 10px auto;">
                            <span class="editStatus-btn" onclick="editClick()">
                                <i class="fa-solid fa-pen-to-square"></i><span>Thay đổi status</span>
                            </span>
                        </div>
                        <div class="row d-flex justify-content-center" style="width: auto; margin: 10px auto;">
                            <h4 id="watchImageStatus">anh yêu bé thỏ của anh nhiều lắm</h4>
                        </div>
                    </div>

                    <div class="row justify-content-center" id="watchImage-editing_status" style="display:none;">
                        <div class="row d-flex justify-content-center" style="width: 100%; margin: 10px auto;">
                            <textarea class="form-control watchImage-status-form" rows="3" style="border:0px; margin: auto;"></textarea>
                        </div>
                        <div class="row d-flex justify-content-center" style="width: 100%; margin: 10px auto;">
                            <button class="modal-btn" onclick="saveClick()">Lưu status</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <style>
        .editStatus-btn:hover {
            color: #ff64b8;
            cursor: pointer;
        }

        .error-text {
            font-size: 13px;
        }

        #setting-modal-container {
            border-radius: 6px;
        }

        .modal-btn {
            border-radius: 5px;
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


        @media (max-width:5000px) {
            .watchImage-status-form {
                width : 700px;
            }
        }

        @media (max-width:1020px) {
            .watchImage-status-form  {
                width : 600px;
            }
        }

        @media (max-width:768px) {
            .watchImage-status-form  {
                width : 500px;
            }
        }

        @media (max-width:500px) {
            .watchImage-status-form  {
                width : 250px;
            }
        }
    </style>

    <script type="text/javascript">

        $document.ready(function(){
            $('#watchImage-nonEdit_status').css("display", "block");

        });
        function editEnable(){
            $('#watchImage-editing_status').show();
            $('#watchImage-nonEdit_status').hide();
        }

        function editDisable(){
            $('#watchImage-editing_status').hide();
            $('#watchImage-nonEdit_status').show();
        }

        function editClick(){
            editEnable();
        }

        function saveClick(){
            editDisable();
        }
    </script>


</div>
