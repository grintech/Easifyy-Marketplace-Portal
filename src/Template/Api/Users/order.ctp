<div class="container main-w3pvt main-cont">
  <div class="ty-mainbox-container clearfix">
      <?php //print_r($pServices)?>
 <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Order Id</th>
                <th>Product Name</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Status</th>
                
            </tr>
        </thead>
        <tbody>
            <?php $count=1; foreach ($pServices as $service): ?>
                <tr><td><?php echo $service['id']?></td>
                <td><?php echo $service['order_items'][0]['product']['title']?></td>
                <td><?php echo $service['gross_total']?></td>
                <td><?php echo $service['created']?></td>
                <td><?php echo $service['order_status']['name']?></td></tr>
            <?php $count++; endforeach; ?>
        </tbody>
    </table>
    </div>
</div>