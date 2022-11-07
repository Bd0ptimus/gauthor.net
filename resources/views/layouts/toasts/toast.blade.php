<style>
    .notification {
        position: fixed;
        top: 70px;
        right: 10px;
    }
    #para {
        border: 1px solid black;
        width: 300px;
        height: 100px;
        overflow: scroll;
    }
    .toast-success-color {
        color: green;
        background-color: #e0e0e0;
    }
    .toast-fail-color {
        color: red;
        background-color: #e0e0e0;
    }
    h1 {
        color:green;
    }
</style>
<div id="notification-success" class="toast toast-success-color notification"  data-delay="4000" style="z-index:3000;">
    <div class="toast-header toast-success-color">
        <strong class="mr-auto"><i class="fa-solid fa-check" style="color:green;"></i></strong>
        <small style="color: black">Just Now</small>

        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>

    <div class="toast-body" id="toast-success-text">
        Hi! You just scrolled the paragaraph.
    </div>
</div>

<div id="notification-fail" class="toast toast-fail-color notification"  data-delay="4000" style="z-index:3000;">
    <div class="toast-header toast-fail-color">
        <strong class="mr-auto"><i class="fa-solid fa-x" style="color:red;"></i></strong>
        <small style="color: black">Just Now</small>

        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>

    <div class="toast-body" id="toast-fail-text">
        Hi! You just scrolled the paragaraph.
    </div>
</div>
