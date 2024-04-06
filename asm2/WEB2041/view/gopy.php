<div class="row mb">
    <div class="boxtitle">GÓP Ý</div>
    <div class="boxcontent row">
        <div class="gopy">
            <h2>Góp ý cho X-shop</h2>
            <p>Chúng tôi luôn mong muốn nhận được những góp ý từ quý khách hàng để cải thiện chất lượng sản phẩm và dịch
                vụ của X-shop. Xin vui lòng điền vào mẫu dưới đây và gửi cho chúng tôi. Chúng tôi sẽ xem xét và phản hồi
                bạn trong thời gian sớm nhất.</p>
            <form action="#" method="post">
                <label for="name">Họ và tên:</label>
                <input type="text" id="name" name="name" placeholder="Nhập họ và tên của bạn" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Nhập email của bạn" required>
                <label for="phone">Số điện thoại:</label>
                <input type="tel" id="phone" name="phone" placeholder="Nhập số điện thoại của bạn"><br>
                <label for="product">Sản phẩm:</label>
                <select id="product" name="product">
                     <option value="">Chọn sản phẩm bạn đã mua hoặc quan tâm</option>
                <?php
                foreach ($spnew as $sanpham) {
                    extract($sanpham);
                    echo '
                    <option value="' . $namesp . '">' . $namesp . '</option>';
    
                   
                }

                ?>
                </select><br>
                <label for="feedback">Góp ý:</label>
                <textarea id="feedback" name="feedback"
                    placeholder="Nhập góp ý của bạn về sản phẩm hoặc dịch vụ của X-shop" rows="10" required></textarea>
                <button type="submit">Gửi</button>
            </form>
        </div>
    </div>
</div>