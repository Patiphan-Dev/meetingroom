<style>
    .img_bk_slip {
        max-width: 280px;
        max-height: 350px;
        border: 1px solid #88888850;
        border-radius: 6px;
        padding: 6px;
        width: 50vw;
        height: 60vh;
        background-color: rgb(255, 242, 228);
        align-items: center;
        text-align: center
    }
</style>
<div class="row">
    <div class="col-12 col-md-6 text-center mt-3">
        <img id="qrcode" alt="อัพโหลดสลิปโอนเงิน" src="/assets/images/qrcode.jpg"
            class="mx-auto d-block img-thumbnail mb-3">
    </div>
    <div class="col-12 col-md-6 text-center mt-3">
        <label for="PayDeposit" class="form-label">
            หลักฐานการชำระเงิน <span>*</span>
        </label>
        <img id="img_bk_slip{{ $bk->id }}" alt="อัพโหลดสลิปโอนเงิน"
            @if ($bk->bk_slip != null) src="{{ asset($bk->bk_slip) }}" @endif
            class="mx-auto d-block img-thumbnail mb-3 img_bk_slip">
        <input type="file" id="bk_slip{{ $bk->id }}" name="bk_slip" class="form-control mb-3"
            accept="image/png, image/jpeg" onchange="displayImage('{{ $bk->id }}')">
        <input type="text" value="{{ $_GET['booking_id'] }}" name="booking_id" hidden>
    </div>
</div>
<script>
    function displayImage(id) {
        console.log(id);
        const input = document.getElementById("bk_slip" + id);
        const file = input.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                const imageDataUrl = event.target.result;
                updateImageSrc(imageDataUrl, id);
            };
            reader.onerror = function(error) {
                console.error("Error:", error)
            };
            reader.readAsDataURL(file);
        }
    }

    function updateImageSrc(imageDataUrl, id) {
        const imageElement = document.getElementById("img_bk_slip" + id);
        imageElement.src = imageDataUrl;
    }
</script>
