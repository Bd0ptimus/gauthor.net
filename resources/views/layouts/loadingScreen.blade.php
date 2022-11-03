<style rel="stylesheet" type="text/css">
    @-webkit-keyframes waterfall {
        0% {
            opacity: 0;
            -webkit-transform: translateY(-250%);
            transform: translateY(-250%);
        }

        40%,
        60% {
            opacity: 1;
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }

        100% {
            opacity: 0;
            -webkit-transform: translateY(250%);
            transform: translateY(250%);
        }
    }

    @keyframes waterfall {
        0% {
            opacity: 0;
            -webkit-transform: translateY(-250%);
            transform: translateY(-250%);
        }

        40%,
        60% {
            opacity: 1;
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }

        100% {
            opacity: 0;
            -webkit-transform: translateY(250%);
            transform: translateY(250%);
        }
    }

    .waterfall div {
        -webkit-animation: waterfall 1.5s infinite;
        animation: waterfall 1.5s infinite;
        background-color: #ff64b8;
        height: 20px;
        left: 50%;
        margin-top: -10px;
        opacity: 0;
        position: absolute;
        top: 50%;
        width: 20px;
    }

    .waterfall div:nth-of-type(1) {
        -webkit-animation-delay: 0.25s;
        animation-delay: 0.25s;
        margin-left: -10px;
    }

    .waterfall div:nth-of-type(2) {
        -webkit-animation-delay: 0.5s;
        animation-delay: 0.5s;
        margin-left: 15px;
    }

    .waterfall div:nth-of-type(3) {
        -webkit-animation-delay: 0.75s;
        animation-delay: 0.75s;
        margin-left: -35px;
    }

    .waterfall div:nth-of-type(4) {
        -webkit-animation-delay: 1s;
        animation-delay: 1s;
        margin-left: 40px;
    }

    .waterfall div:nth-of-type(5) {
        -webkit-animation-delay: 1.25s;
        animation-delay: 1.25s;
        margin-left: -60px;
    }
</style>
<div id="loading" class="row"
    style="background-color:white;z-index:100; width:100%; height:100%; position: fixed; margin:auto; top: 0px;">
    <div class="waterfall">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>

