<div class="card contract-item" data-id="">
    <div class="card-header d-flex align-items-center">
        <h5 class="mb-0">Contract item</h5>
        <p class="mb-0 ms-auto me-2">Display on CV</p>
        <div class="form-check form-switch">
            <input class="form-check-input switch-size-lg" type="checkbox">
        </div>
        <button type="button" class="btn btn-warning ms-2 contract-remove-item-btn">Remove Item</button>
    </div>
    <div class="card-body d-flex">
        <div class="mb-3">
            <label for="contract-title" class="form-label">Title <span class="text-danger">*</span></label>
            <input type="text" class="form-control">
            <small class="form-text text-danger">We'll never share your text with anyone else.</small>
        </div>
        <div class="mb-3 ms-2">
            <label for="contract-content" class="form-label">Content <span class="text-danger">*</span></label>
            <input type="text" class="form-control" >
            <small class="form-text text-danger">We'll never share your email with anyone else.</small>
        </div>
        <div class="mb-3 ms-2">
            <label class="form-label">Icon</label>
            <div class="d-flex align-items-center">
                <div class="contract-choose-icon mt-1">
                    Click here to choose icon
                </div>
                <input class="icon-path" type="text" hidden>
                <img class="contract-icon-preview ms-2" alt="" hidden>
                <img class="contract-icon-remove ms-2" alt="">
            </div>
        </div>
    </div>
</div>