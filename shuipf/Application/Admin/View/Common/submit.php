
<script src="{$config_siteurl}statics/js/jquery.js"></script>
<script src="{$config_siteurl}statics/js/validate.js"></script>
<script src="{$config_siteurl}statics/js/ajaxForm.js"></script>
<script>
$(document).ready(function(){
    // $('form.J_ajaxForm').submit(function(){
        var this1 = $('form.J_ajaxForm');
        if(this1.length > 1){
            this1.each(function(i,v){
                $(v).validate({
                    rules : {
                        // 图书馆
                        ser_benefit_num: {
                            pFloatTwo: true
                        },
                        eact_join_num: {
                            pFloatTwo: true
                        },
                        tal_train_hours: {
                            pFloatTwo: true
                        },
                        fund_totle: {
                            pFloatTwo: true
                        },
                        fund_new: {
                            pFloatTwo: true
                        },
                        fund_free: {
                            pFloatTwo: true
                        },
                        fund_ele: {
                            pFloatTwo: true
                        },
                        telephone: {
                            telphone: true
                        },
                        covered_area: {
                            pFloatTwo: true
                        },
                        floor_area: {
                            pFloatTwo: true
                        },
                        book_area: {
                            pFloatTwo: true
                        },
                        readroom_area: {
                            pFloatTwo: true
                        },
                        readroom_seat_num: {
                            pFloatTwo: true
                        },
                        chilreadroom_seat_num: {
                            pFloatTwo: true
                        },
                        reportroom_area: {
                            pFloatTwo: true
                        },
                        reportroom_seat_num: {
                            pFloatTwo: true
                        },
                        ereadroom_area: {
                            pFloatTwo: true
                        },
                        ereadroom_seat_num: {
                            pFloatTwo: true
                        },
                        computer_num: {
                            pFloatTwo: true
                        },
                        reader_user_num: {
                            pFloatTwo: true
                        },
                        bandwidth: {
                            pFloatTwo: true
                        },
                        storage: {
                            pFloatTwo: true
                        },
                        num_totle: {
                            pFloatTwo: true
                        },
                        num_e_doc: {
                            pFloatTwo: true
                        },
                        num_e_book: {
                            pFloatTwo: true
                        },
                        num_e_periodical: {
                            pFloatTwo: true
                        },
                        num_collect_book: {
                            pFloatTwo: true
                        },
                        num_collect_periodical: {
                            pFloatTwo: true
                        },
                        num_collect_audio: {
                            pFloatTwo: true
                        },
                        num_digit_totle: {
                            pFloatTwo: true
                        },
                        num_digit_self: {
                            pFloatTwo: true
                        },
                        ser_name: {
                            pFloatTwo: true
                        },
                        ser_hours: {
                            pFloatTwo: true
                        },
                        ser_borrow_num: {
                            pFloatTwo: true
                        },
                        ser_people_count: {
                            pFloatTwo: true
                        },
                        ser_nodeborrow_num: {
                            pFloatTwo: true
                        },
                        ser_avg_visit: {
                            pFloatTwo: true
                        },
                        ser_braille_num: {
                            pFloatTwo: true
                        },
                        dig_webserver: {
                            pFloatTwo: true
                        },
                        dig_pv: {
                            pFloatTwo: true
                        },
                        dig_remote_num: {
                            pFloatTwo: true
                        },
                        dig_share_fund: {
                            pFloatTwo: true
                        },
                        dig_expand_fund: {
                            pFloatTwo: true
                        },
                        dig_computer_num: {
                            pFloatTwo: true
                        },
                        anc_totle: {
                            pFloatTwo: true
                        },
                        anc_fund: {
                            pFloatTwo: true
                        },
                        anc_activity_num: {
                            pFloatTwo: true
                        },
                        point_lng: {
                            pFloatTwo: true
                        },
                        point_lat: {
                            pFloatTwo: true
                        },
                        // 文化馆
                        cac_tel: {
                            telphone: true
                        },
                        cac_area: {
                            pFloatTwo: true
                        },
                        cac_outdoorarea: {
                            pFloatTwo: true
                        },
                        cac_pocularea: {
                            pFloatTwo: true
                        },
                        cac_propagatelen: {
                            pFloatTwo: true
                        },
                        cac_elearea: {
                            pFloatTwo: true
                        },
                        cac_elesitnum: {
                            pFloatTwo: true
                        },
                        cac_bandwidth: {
                            pFloatTwo: true
                        },
                        storage: {
                            pFloatTwo: true
                        },
                        sev_opentime: {
                            pFloatTwo: true
                        },
                        sev_noregcul: {
                            pFloatTwo: true
                        },
                        sev_lastingfree: {
                            pFloatTwo: true
                        },
                        sev_yearoutnum: {
                            pFloatTwo: true
                        },
                        sev_yearavenum: {
                            pFloatTwo: true
                        },
                        sev_accessibility: {
                            pFloatTwo: true
                        },
                        dig_webserver: {
                            pFloatTwo: true
                        },
                        dig_PV: {
                            pFloatTwo: true
                        },
                        dig_resources: {
                            pFloatTwo: true
                        },
                        dig_terminalnum: {
                            pFloatTwo: true
                        },
                        point_lng: {
                            pFloatTwo: true
                        },
                        point_lat: {
                            pFloatTwo: true
                        },
                        act_pernum: {
                            pFloatTwo: true
                        },
                        cc_publishnum: {
                            pFloatTwo: true
                        },
                        fund_major: {
                            pFloatTwo: true
                        },
                        officeact_joinnum: {
                            pFloatTwo: true
                        },
                        tal_train_hours: {
                            pFloatTwo: true
                        },
                        ta_profitnum: {
                            pFloatTwo: true
                        },
                        tb_area: {
                            pFloatTwo: true
                        },
                        tb_includenum: {
                            pFloatTwo: true
                        },
                        tb_yearnum: {
                            pFloatTwo: true
                        },
                        volact_joinnum: {
                            pFloatTwo: true
                        },
                        volact_profitnum: {
                            pFloatTwo: true
                        },
                        // 非遗
                        re_batch: {
                            pFloatTwo: true
                        },
                        // 文化产业
                        inv_totle: {
                            pFloatTwo: true
                        },
                        inv_financing: {
                            pFloatTwo: true
                        },
                        inv_years: {
                            pFloatTwo: true
                        },
                        opentime: {
                            pFloatTwo: true
                        },
                        total_area: {
                            pFloatTwo: true
                        },
                        com_phone: {
                            telphone: true
                        },
                        // 辅导培训
                        contacts_tel: {
                            telphone: true
                        },
                        acceptance: {
                            pFloatTwo: true
                        },
                        duration: {
                            pFloatTwo: true
                        },
                        acceptance: {
                            pFloatTwo: true
                        }
                        // 群文活动

                    },
                    submitHandler:function(form){
                        // $.post(
                        //     this1.attr('action'),
                        //     this1.serialize(),
                        //     function(result){
                        //         if(result.state ==='success'){
                        //             parent.location.reload();
                        //         }else{
                        //             this1.find("input[type='submit']").removeAttr('disabled');
                        //         }
                        //     },'json'
                        // )
                        this1.find("input[type='submit']").attr('disabled','disabled');
                        $(form).ajaxSubmit({
                            "url": this1.attr('action'),
                            "data": this1.serialize(),
                            "success": function(result){
                                parent.location.reload();
                            },
                            "error": function(){
                                this1.find("input[type='submit']").removeAttr('disabled');
                            }

                        })
                    } 
                })
            })
        }else{
            this1.validate({
                rules : {
                    // 图书馆
                    ser_benefit_num: {
                        pFloatTwo: true
                    },
                    eact_join_num: {
                        pFloatTwo: true
                    },
                    tal_train_hours: {
                        pFloatTwo: true
                    },
                    fund_totle: {
                        pFloatTwo: true
                    },
                    fund_new: {
                        pFloatTwo: true
                    },
                    fund_free: {
                        pFloatTwo: true
                    },
                    fund_ele: {
                        pFloatTwo: true
                    },
                    telephone: {
                        telphone: true
                    },
                    covered_area: {
                        pFloatTwo: true
                    },
                    floor_area: {
                        pFloatTwo: true
                    },
                    book_area: {
                        pFloatTwo: true
                    },
                    readroom_area: {
                        pFloatTwo: true
                    },
                    readroom_seat_num: {
                        pFloatTwo: true
                    },
                    chilreadroom_seat_num: {
                        pFloatTwo: true
                    },
                    reportroom_area: {
                        pFloatTwo: true
                    },
                    reportroom_seat_num: {
                        pFloatTwo: true
                    },
                    ereadroom_area: {
                        pFloatTwo: true
                    },
                    ereadroom_seat_num: {
                        pFloatTwo: true
                    },
                    computer_num: {
                        pFloatTwo: true
                    },
                    reader_user_num: {
                        pFloatTwo: true
                    },
                    bandwidth: {
                        pFloatTwo: true
                    },
                    storage: {
                        pFloatTwo: true
                    },
                    num_totle: {
                        pFloatTwo: true
                    },
                    num_e_doc: {
                        pFloatTwo: true
                    },
                    num_e_book: {
                        pFloatTwo: true
                    },
                    num_e_periodical: {
                        pFloatTwo: true
                    },
                    num_collect_book: {
                        pFloatTwo: true
                    },
                    num_collect_periodical: {
                        pFloatTwo: true
                    },
                    num_collect_audio: {
                        pFloatTwo: true
                    },
                    num_digit_totle: {
                        pFloatTwo: true
                    },
                    num_digit_self: {
                        pFloatTwo: true
                    },
                    ser_name: {
                        pFloatTwo: true
                    },
                    ser_hours: {
                        pFloatTwo: true
                    },
                    ser_borrow_num: {
                        pFloatTwo: true
                    },
                    ser_people_count: {
                        pFloatTwo: true
                    },
                    ser_nodeborrow_num: {
                        pFloatTwo: true
                    },
                    ser_avg_visit: {
                        pFloatTwo: true
                    },
                    ser_braille_num: {
                        pFloatTwo: true
                    },
                    dig_webserver: {
                        pFloatTwo: true
                    },
                    dig_pv: {
                        pFloatTwo: true
                    },
                    dig_remote_num: {
                        pFloatTwo: true
                    },
                    dig_share_fund: {
                        pFloatTwo: true
                    },
                    dig_expand_fund: {
                        pFloatTwo: true
                    },
                    dig_computer_num: {
                        pFloatTwo: true
                    },
                    anc_totle: {
                        pFloatTwo: true
                    },
                    anc_fund: {
                        pFloatTwo: true
                    },
                    anc_activity_num: {
                        pFloatTwo: true
                    },
                    point_lng: {
                        pFloatTwo: true
                    },
                    point_lat: {
                        pFloatTwo: true
                    },
                    // 文化馆
                    cac_tel: {
                        telphone: true
                    },
                    cac_area: {
                        pFloatTwo: true
                    },
                    cac_outdoorarea: {
                        pFloatTwo: true
                    },
                    cac_pocularea: {
                        pFloatTwo: true
                    },
                    cac_propagatelen: {
                        pFloatTwo: true
                    },
                    cac_elearea: {
                        pFloatTwo: true
                    },
                    cac_elesitnum: {
                        pFloatTwo: true
                    },
                    cac_bandwidth: {
                        pFloatTwo: true
                    },
                    storage: {
                        pFloatTwo: true
                    },
                    sev_opentime: {
                        pFloatTwo: true
                    },
                    sev_noregcul: {
                        pFloatTwo: true
                    },
                    sev_lastingfree: {
                        pFloatTwo: true
                    },
                    sev_yearoutnum: {
                        pFloatTwo: true
                    },
                    sev_yearavenum: {
                        pFloatTwo: true
                    },
                    sev_accessibility: {
                        pFloatTwo: true
                    },
                    dig_webserver: {
                        pFloatTwo: true
                    },
                    dig_PV: {
                        pFloatTwo: true
                    },
                    dig_resources: {
                        pFloatTwo: true
                    },
                    dig_terminalnum: {
                        pFloatTwo: true
                    },
                    point_lng: {
                        pFloatTwo: true
                    },
                    point_lat: {
                        pFloatTwo: true
                    },
                    act_pernum: {
                        pFloatTwo: true
                    },
                    cc_publishnum: {
                        pFloatTwo: true
                    },
                    fund_major: {
                        pFloatTwo: true
                    },
                    officeact_joinnum: {
                        pFloatTwo: true
                    },
                    tal_train_hours: {
                        pFloatTwo: true
                    },
                    ta_profitnum: {
                        pFloatTwo: true
                    },
                    tb_area: {
                        pFloatTwo: true
                    },
                    tb_includenum: {
                        pFloatTwo: true
                    },
                    tb_yearnum: {
                        pFloatTwo: true
                    },
                    volact_joinnum: {
                        pFloatTwo: true
                    },
                    volact_profitnum: {
                        pFloatTwo: true
                    },
                    // 非遗
                    re_batch: {
                        pFloatTwo: true
                    },
                    // 文化产业
                    inv_totle: {
                        pFloatTwo: true
                    },
                    inv_financing: {
                        pFloatTwo: true
                    },
                    inv_years: {
                        pFloatTwo: true
                    },
                    opentime: {
                        pFloatTwo: true
                    },
                    total_area: {
                        pFloatTwo: true
                    },
                    com_phone: {
                        telphone: true
                    },
                    // 辅导培训
                    contacts_tel: {
                        telphone: true
                    },
                    acceptance: {
                        pFloatTwo: true
                    },
                    duration: {
                        pFloatTwo: true
                    },
                    acceptance: {
                        pFloatTwo: true
                    }
                    // 群文活动
                },
                submitHandler:function(form){
                    // $.post(
                    //     this1.attr('action'),
                    //     this1.serialize(),
                    //     function(result){
                    //         if(result.state ==='success'){
                    //             parent.location.reload();
                    //         }else{
                    //             this1.find("input[type='submit']").removeAttr('disabled');
                    //         }
                    //     },'json'
                    // )
                    this1.find("input[type='submit']").attr('disabled','disabled');
                    $(form).ajaxSubmit({
                        "url": this1.attr('action'),
                        "data": this1.serialize(),
                        "success": function(result){
                            parent.location.reload();
                        },
                        "error": function(){
                            this1.find("input[type='submit']").removeAttr('disabled');
                        }

                    })
                } 
            })
        }
        
        

        // return false;
    // });
})
    
</script>