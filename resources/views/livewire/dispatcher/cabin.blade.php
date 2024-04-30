<div>
    <h4 class="d-flex justify-content-lg-center flex-column flex-sm-row align-items-center">
         <span>
           {{ Auth::user()->userBattalion->battalion->name }}
        </span>

    </h4>


    <div class="row">
        <div class="col-12">
            <livewire:dispatcher.cabin.table />
        </div>
    </div>
</div>
