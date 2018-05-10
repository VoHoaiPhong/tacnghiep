<?php
include_once("../../database/model/InAuditLoader.php");
$page = $_GET['page'] == null ? 0 : $_GET['page'];
$inAuditLoader = new InAuditLoader();

?>
<!--Modal-->
<div class="modal fade" id="detailInAuditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chi tiết phí thu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Mô tả</label>
                        <input type="text" class="form-control" id="txtDescription" readonly="true">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Số tiền thu (VND)</label>
                        <input type="text" class="form-control" id="txtInAudit" readonly="true">
                    </div>
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Ngày thu</label>
                        <input type="date" class="form-control" id="txtInAuditDate" readonly="true">
                    </div>
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Người đóng tiền</label>
                        <input type="text" class="form-control" id="txtPayer" readonly="true">
                    </div>
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Người xác nhận</label>
                        <input type="text" class="form-control" id="txtConfirmed" readonly="true">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">ĐÓNG</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--End Modal-->

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">DANH SÁCH PHÍ THU</h4>
                <!--<p class="card-category"> Here is a subtitle for this table</p>-->
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                        <th>
                            Số thứ tự
                        </th>
                        <th>
                            Mô tả
                        </th>
                        <th>
                            Số tiền thu (VND)
                        </th>
                        <th>
                            Ngày thu
                        </th>
                        <th>
                            Người đóng tiền
                        </th>
                        <th>
                            Người xác nhận
                        </th>
                        <th class="text-center">
                            Thao tác
                        </th>
                        </thead>
                        <tbody id="table-body"><?php echo $inAuditLoader->viewOnly($page); ?></tbody>
                    </table>
                </div>
                <div id="pagination"><?php echo $inAuditLoader->getPagination(); ?></div>
            </div>
        </div>
    </div>
</div>

<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.min.js"></script>
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/bootstrap-material-design.js"></script>
<script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!--  Charts Plugin, full documentation here: https://gionkunz.github.io/chartist-js/ -->
<script src="../assets/js/plugins/chartist.min.js"></script>
<!-- Library for adding dinamically elements -->
<script src="../assets/js/plugins/arrive.min.js" type="text/javascript"></script>
<!--  Notifications Plugin, full documentation here: http://bootstrap-notify.remabledesigns.com/    -->
<script src="../assets/js/plugins/bootstrap-notify.js"></script>
<!-- Material Dashboard Core initialisations of plugins and Bootstrap Material Design Library -->
<script src="../assets/js/material-dashboard.js?v=2.0.0"></script>
<!-- demo init -->
<script src="../assets/js/plugins/demo.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        demo.initDashboardPageCharts();
        demo.initCharts();
    });

    $(window).on('load', function () {
        $(".btn-info").click(function () {
            var modal = $(this).data("target");
            var tdata = $(this).closest("tr").find("td");
            var input = $(modal).find("input");
            for (var i = 0; i < input.length; i++) {
                input.eq(i).val(tdata.eq(i + 1).text());
            }
        });
    });


</script>