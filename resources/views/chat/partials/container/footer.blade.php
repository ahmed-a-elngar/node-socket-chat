<div id="messenger_footer" class="col-12 border-top border-dark pt-3 px-0 row">
    <form id="messenger_input_form" class="form-inline col-9 px-0">
        <input type="text" id="text_message" class="bg-inverse-info col-9 border-0 py-1 px-2 text-white-50"
            style="border-radius: 4px;">

        <div class="input-group col-1 mx-2">
            <input type="file" class="file-upload-default" id="picture_message" name="picture_message"
                style="display: none;">
            <span class="input-group-append">
                <button class="file-upload-browse btn btn-inverse-info" type="button" style="border-radius: 3px;">
                    <i class="mdi mdi-image text-white py-1 mx-1"></i>
                </button>
            </span>
        </div>

        <div class="input-group col-1">
            <input type="file" class="file-upload-default" id="file_message" name="file_message"
                style="display: none;">
            <span class="input-group-append">
                <button class="file-upload-browse btn btn-inverse-info" type="button" style="border-radius: 3px;">
                    <i class="mdi mdi-file text-white py-1 mx-1"></i>
                </button>
            </span>
        </div>
    </form>
    <div class="col-3 px-0">
        <button class="btn-info btn float-right py-2 px-3" id="messenger_form_submit">
            send
            <i class="mdi mdi-send text-white py-1 mx-1"></i>
        </button>
    </div>
</div>
