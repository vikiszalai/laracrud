<div class="modal fade" id="mainModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="lang-text6 modal-title" id="mainModalLabel"> </h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-body bg-light mt-5">
                    <form id="contact-form" class="form" action="" method=" POST">
                        <input type="hidden" name="e_prod_id" id="e_prod_id" value="">
                        <input type="hidden" name="sess_locale" id="sess_locale" value="{{session()->get('locale')}}">
                        <div class="form-group">
                            <label id="product_l">@lang("msg.name")</label>
                            <input type="text" class="form-control form-control-lg validation" name="product_name"
                                id="product_name">
                        </div>
                        <div class="form-group">
                            <label id="product_d">@lang("msg.desc")</label>
                            <textarea class="form-control form-control-lg" name="product_desc"
                                id="product_desc"></textarea>
                        </div>
                        <label id="product_p">@lang("msg.price")</label>
                        <div class="form-group" style="display:flex; flex-direction: row;align-items: center">
                            <input type="number" style="width:150px;" class="form-control form-control-lg validation"
                                name="product_price" id="product_price" min="0.00" max="10000.00" step="0.01" />
                            &nbsp;&nbsp<label> Ft</label>
                        </div>
                        <label id="tags">@lang("msg.tags")</label>
                        <ul id="myTags">
                        </ul>
                        <div class="form-group">
                            <div style="text-align:center; padding: 5px;">
                                <img id="product_img_u" src="" style="width:600px;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label id="img">@lang("msg.image")</label>
                            <input type="file" class="form-control" name="product_img" id="product_img">
                        </div>
                        <br>
                        <div class="form-group"
                            style="position: relative;display: -ms-flexbox;display: flex;width: 100%;">
                            <label id="act">@lang("msg.act")</label>
                            <input type="text" style="width:190px;" class="form-control datepicker"
                                id="active_from" /><label for="">@lang("msg.act_from")</label>
                            &nbsp;&nbsp;

                            <input type="text" style="width:190px;" class="form-control datepicker"
                                id="active_to" /><label for="">@lang("msg.act_to")</label>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang("msg.close")</button>
                <button type="button" id="submit" class="btn btn-primary">@lang("msg.save")</button>
            </div>
        </div>
    </div>
</div>