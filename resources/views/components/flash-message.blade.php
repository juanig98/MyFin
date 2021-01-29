<div class="p-4 flex">
    @if ($message = Session::get('success'))
    <div class="alert alert-success bg-green-600 alert-block w-full min-h-min p-3 sm:rounded-lg font-bold text-white">
        <strong>{{ $message }}</strong>
        <button type="button" class="close-alert float-right">×</button>
    </div>
    @endif

    @if ($message = Session::get('error'))
    <div class="alert alert-danger bg-red-500 alert-block w-full min-h-min p-3 sm:rounded-lg font-bold text-white">
        <strong>{{ $message }}</strong>
        <button type="button" class="close-alert float-right">×</button>
    </div>
    @endif

    @if ($message = Session::get('warning'))
    <div class="alert alert-warning bg-yellow-600  alert-block w-full min-h-min p-3 sm:rounded-lg  font-bold text-white">
        <strong>{{ $message }}</strong>
        <button type="button" class="close-alert float-right">×</button>
    </div>
    @endif

    @if ($message = Session::get('info'))
    <div class="alert alert-info bg-blue-400  alert-block w-full min-h-min p-3 sm:rounded-lg  font-bold text-white">
        <strong>{{ $message }}</strong>
        <button type="button" class="close-alert float-right">×</button>
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger  bg-red-600 w-full min-h-min p-3 sm:rounded-lg  font-bold text-white">
        Check the following errors :(
            <button type="button" class="close-alert float-right">×</button>
    </div>
    @endif
</div>
