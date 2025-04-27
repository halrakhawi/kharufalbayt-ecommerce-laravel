$(function(){
$(".linkTab").click(function (e) { 
    $(".contentTabs").removeClass("showTab");
    $(".linkTab").removeClass("activeTab");
    $(this).addClass("activeTab");
    $($(this).attr("href")).addClass("showTab");
    
});
$(".js-example-placeholder-single").select2({
    placeholder: "Select a state",
    allowClear: true
});
$(".js-select-time").select2({
    placeholder: "اختر فترة التوصيل",
    allowClear: true
});
$(".js-select-time1").select2({
    placeholder: "اختر طريقة الدفع",
    allowClear: true
});
});