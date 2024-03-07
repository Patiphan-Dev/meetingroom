<div class="row">
    @if (Auth::user()->id == $bk->bk_user_id)
        <div class="col-12">
            <div class="col-12 text-center mt-3">
                <label for="bk_end_time" class="form-label">
                    หลักฐานการชาระเงิน <span>*</span>
                </label>
                <img id="img_bk_slip{{ $bk->id }}" alt="อัพโหลดสลิปโอนเงิน"
                    @if ($bk->bk_slip != null) src="{{ asset($bk->bk_slip) }}" @endif
                    class="mx-auto d-block img-thumbnail mb-3 img_bk_slip">
                <input type="file" id="bk_slip{{ $bk->id }}" name="bk_slip" class="form-control mb-3"
                    onchange="displayImage('{{ $bk->id }}')">
            </div>
        </div>
    @endif
</div>
<script>.

    function displayImage(id) {
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
