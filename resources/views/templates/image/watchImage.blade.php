<div class="modal fade clearfix px-5" id="watchImage-modal-container" tabindex="-1" role="dialog"
    aria-labelledby="watchImageModalContainer" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document" style="max-width: 1500px; width : 100%; ">
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
                @if ($darlingOnWatching == false)
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
                            <textarea id="watchImageStatusField" class="form-control watchImage-status-form" rows="3" style="border:0px; margin: auto;"></textarea>
                        </div>
                        <div class="row d-flex justify-content-center" style="width: 100%; margin: 10px auto;">
                            <button id="watchImageSaveBtn" class="modal-btn">Lưu status</button>
                        </div>
                    </div>
                </div>
                @endif
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

        $(document).ready(function(){
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

        function watchImageModalStart(imgUrl, imgId, imgStatus){
            $('#watchImageShow').attr('src',imgUrl);
            $('#watchImageSaveBtn').attr('onclick',`saveClick(${imgId})`);
            $('#watchImageStatus').text(imgStatus);
            $('#watchImageStatusField').val(imgStatus);
        }

        function saveClick(imageId){
            let status = $('#watchImageStatusField').val();
            console.log('save image id : ', imageId);

            console.log('save btn click- status : ', status);

            $.ajax({
                method: 'post',
                url: '{{ route('image.changeStatus') }}',
                data: {
                    imageId: imageId,
                    status : status,
                    _token: '{{ csrf_token() }}',
                },
                success: function(data) {
                    console.log('data response : ', JSON.stringify(data));
                    if(data.error == 0){
                        $('#watchImageStatus').text(data.data);
                        editDisable();
                        loadImageAlbum();
                    }else{
                        editDisable();
                    }
                }

            });

        }
    </script>


</div>
