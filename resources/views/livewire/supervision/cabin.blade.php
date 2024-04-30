<div>
    <h4 class="d-flex justify-content-lg-center flex-column flex-sm-row align-items-center">
         <span>
            <span>  {{ Auth::user()->userBattalion->battalion->name }}
        </span>

    </h4>

    <div class="row">
        <div class="col-12">
            <livewire:supervision.cabin.table />
        </div>
    </div>
</div>
