function toLoading(bt, text) {
    bt.removeClass('btn-success').addClass('btn-primary');
    bt.children('.glyphicon').removeClass('glyphicon-chevron-right').addClass('glyphicon-refresh').addClass('glyphicon-refresh-animate');
    bt.children('.bt-text').html('verifying..');
}