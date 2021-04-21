<div class="mb-2">
    <label class="form-control-label">{{ __('Kadar Jam') }}</label><br/>
    {{-- Radio button Jenis Hari--}}
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" onclick="showBlockKadarJam('hariBiasa')" name="jenisHariOptions" id="hariBiasa" value="hariBiasa">
        <label class="form-check-label" for="hariBiasa">Hari Biasa</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" onclick="showBlockKadarJam('hariRehat')" name="jenisHariOptions" id="hariRehat" value="hariRehat">
        <label class="form-check-label" for="hariRehat">Hari Rehat</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" onclick="showBlockKadarJam('hariAm')" name="jenisHariOptions" id="hariAm" value="hariAm">
        <label class="form-check-label" for="hariAm">Hari Kelepasan Am</label>
    </div>
    <div class="mt-2">
        {{-- Radio button Kadar Biasa--}}
        <div id="hariBiasaBlock" style="display:none;">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="kadarJamBiasa" id="hariBiasa-siang" value="1.125">
                <label class="form-check-label" for="hariBiasa-siang">Siang - 1.125</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="hariBiasa" id="hariBiasa-malam" value="1.25">
                <label class="form-check-label" for="hariBiasa-malam">Malam - 1.25</label>
            </div>
        </div>
        
        {{-- Radio button Kadar Rehat--}}
        <div id="hariRehatBlock" style="display:none;">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="hariRehat" id="hariRehat-siang" value="1.25">
                <label class="form-check-label" for="hariRehat-siang">Siang - 1.25</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="hariRehat" id="hariRehat-malam" value="1.50">
                <label class="form-check-label" for="hariRehat-malam">Malam - 1.50</label>
            </div>
        </div>
        
        {{-- Radio button Kadar Kelepasan Am--}}
        <div id="hariAmBlock" style="display:none;">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="hariAm" id="hariAm-siang" value="1.75">
                <label class="form-check-label" for="hariAm-siang">Siang - 1.75</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="hariAm" id="hariAm-malam" value="2.00">
                <label class="form-check-label" for="hariAm-siang">Malam - 2.00</label>
            </div>
        </div>
    </div>
</div>