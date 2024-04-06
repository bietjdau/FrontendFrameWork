<div class="row">
    <div class="row mb">
        <div class="boxleft mr">
            <div class="row mb">
                <div class="boxtitle">CẢM ƠN</div>
                <div class="row boxcontent" style="text-align:center">
                    <h2>Cảm ơn quý khách đã đặt hàng</h2>
                </div>
            </div>
            <?php
            if (isset($listbill) && (is_array($listbill))) {
                extract($listbill);
            }
            ?>
            <div class="row mb">
                <div class="boxtitle">THÔNG TIN ĐƠN HÀNG</div>
                <div class="row boxcontent" style="text-align:center">
                    <li>Mã đơn hàng: NVA
                        <?= $listbill['id']; ?>
                    </li>
                    <li>Ngày đạt hàng: NVA
                        <?= $listbill['ngaydathang']; ?>
                    </li>
                    <li>Tổng đơn hàng: 
                        <?= $listbill['total']; ?>
                    </li>
                    <li>Phương thức thanh toán: NVA
                        <?= $listbill['bill_pttt']; ?>
                    </li>
                </div>
            </div>
            <div class="row mb">
                <div class="boxtitle">THÔNG TIN ĐẶT HÀNG</div>
                <div class="row boxcontent info">
                    <table>
                        <tr>
                            <td>Người đặt hàng</td>
                            <td>
                                <?= $listbill['billname']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Địa chỉ</td>
                            <td>
                                <?= $listbill['bill_address']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>
                                <?= $listbill['bill_email']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Số điện thoại</td>
                            <td>
                                <?= $listbill['bill_tel']; ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row mb">
                <div class="boxtitle">CHI TIẾT GIỎ HÀNG</div>
                <div class="row boxcontent cart">
                    <table>

                        <?php

                        bill_chitiet($billct);
                        ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="boxright">
            <?php
            include "view/boxright.php";
            ?>
        </div>
    </div>

</div>