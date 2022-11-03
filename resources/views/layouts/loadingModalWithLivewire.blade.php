<style>
    #uploading-modal{
        z-index:1000;
        position: fixed;
        margin:0px;
        bottom:-17.5px;
        top: -17.5px;
        left: -20%;
        right:-20%;
    }


    .uploading-modal-helper{
        display: inline-block;
        height: 100%;
        vertical-align: middle;
    }

    .uploading-modal-img{
        width:40%;
        height:auto;
        margin:auto;
        vertical-align:middle;
    }
    @media (max-width:5000px){
        #uploading-modal{
            bottom:-17.5px;
            top: -17.5px;
        }
    }

    @media (max-width:1020px){
        #uploading-modal{
            bottom:-17.5px;
            top: -17.5px;
        }
    }

    @media (max-width:576px){
        #uploading-modal{
            bottom:-5px;
            top: -17.5px;
        }
    }
</style>

<!--Upload image loading screen-->
<div class="row" style="width:100%; height:100%;">
    <div id="uploading-modal" class="d-flex justify-content-center"
        style="background-color:rgb(248,248,248);">
        <span class="uploading-modal-helper"></span>
        <img class="uploading-modal-img"
            src="{{ asset('storage/icons/image-loading.gif') }}">
    </div>
</div>
