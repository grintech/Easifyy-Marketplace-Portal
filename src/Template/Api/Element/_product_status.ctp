<?php
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><strong>Product Status</strong></h3>
    </div>
    <div class="panel-body rnd-panelbody">
        <div class="col-sm-12 rnd-panelbody-item">
            <select name="status" class="form-control" required="required" id="ProductStatus">
                <option value="">Status</option>
                <option value="Publish">Publish</option>
                <option value="Pending">Pending</option>
                <option value="Draft">Draft</option>
            </select>
        </div>
        <div class="col-sm-12 rnd-panelbody-item margin-top-10">
            <div class="submit">
                <input value="Save Product" class="btn btn-primary btn-product-save" type="submit">
            </div>
        </div>
    </div>
</div>