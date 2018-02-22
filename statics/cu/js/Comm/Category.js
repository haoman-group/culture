function newItem() {
    //获取子元素个数
    var index = $('#vaItems').children().length;
    $("#vaItems").append('<tr><td><input type="text" class="input" name="value[' + index + '][name]" id="va.name" size="20" value=""></td><td><input type="text" class="input" name="value[' + index + '][name_alias]" id="va.name_alias" size="20" value=""></td> <td><select name="value[' + index + '][status]"><option value="normal">正常</option><option value="disabled">不可用</option></select></td><td><button type="button" id="del' + index + '" onclick=delthis(this)>删除</button></td></tr>');
}

function getchildlist(obj) {
    var val = obj.value;
    if (val == "0") return;
    $.ajax({
        url: "Api/ArtCategory/childlist",
        data: {"parent_cid": val},

        success: function (data) {
            process(obj, data);
        },
        error: function () {
            alert("获取子菜单信息错误!");
        }
    });
}

function getChildListAndSetValue(obj) {
    var val = obj.value;
    if (val == "0") return;
    $.ajax({
        url: "Api/ArtCategory/childlist",
        data: {"parent_cid": val},

        success: function (data) {
            process2(obj, data);
        },
        error: function () {
            alert("获取子菜单信息错误!");
        }
    });
}

function process2(obj, data) {
    var jsonObj = jQuery.parseJSON(data);

    var parent_item = jsonObj.msg.parent_item;
    var cid = parent_item.cid;
    $("input[name=art_cid]").val(cid);
    if (parent_item.relation == 1) {
        $("form[data-cid=" + cid + "]").show().siblings("form").hide();
        $("tr[name=selectshow]").show();
    }
    var html = childItems(jsonObj.msg.list, obj.value, parent_item.is_leaf, "getChildListAndSetValue");
    if (parent_item.is_leaf == 0 && parent_item.is_parent == 1) {
        $("#" + obj.id).next().html(html);
    }
}

function process(obj, data) {
    var jsonObj = jQuery.parseJSON(data);

    var parent_item = jsonObj.msg.parent_item;
    var cid = parent_item.cid;
    if (parent_item.is_parent == 0 || parent_item.is_leaf == 1) {
        $('input[name=art_cid]').val(cid);
    }
    if (parent_item.relation == 1) {
        $("form[data-cid=" + cid + "]").show().siblings("form").hide();
        $("tr[name=selectshow]").show();
    }

    var html = childItems(jsonObj.msg.list, obj.value, parent_item.is_leaf, "getchildlist");
    if (parent_item.is_leaf == 0) {
        $("#" + obj.id).next().html(html);
        $(".drama").html("<option value='-1' > 无 </option>");
    } else {
        $(".drama").html(html);
    }
    //特殊处理非遗的名录类目
    if(cid == '75' ||(cid >84 && cid<95)){
        $('#specail').show().css("display",'inline-block');
        $('#provincelevelselect').show();
        $('#nationallevelselect').show();
    }else{
        $('#specail').hide();
        $('#provincelevelselect').hide();
        $('#nationallevelselect').hide();
    }

}

function childItems(childlist, pid, is_leaf, function_name) {
    var optionstring = "";
    for (var name in childlist) {
        if (name != "state") {
            optionstring += "<option value=\"" + childlist[name].cid + "\" >" + childlist[name].name + "</option>";
        }
    }
    if (optionstring.length > 0 && is_leaf == 0) {
        optionstring = "<select id=" + pid + "  name ='art_cid' class='cid' onchange='" + function_name + "(this)'> " + "<option value='0'>--请选择--</option>" + optionstring;
        optionstring += "</select><div style='display:inline-block;'></div>";
    } else if (is_leaf == 1 && optionstring.length == 0) {
        optionstring = "<option value='-1'>无</option>";
    }
    return optionstring;
}

function delthis(obj) {
    $("#" + obj.id).parent().parent().remove();
}

function getchangelevel(obj){
    $('input[name=level]').val(obj.value);
}
function getchange(obj){

        var type=obj.value;
        $('input[name=re_represen]').val(type);
        // console.log(type);
        // console.log($(".pid").find("option"));
        if(type == '1'){

            $("form[data-type=" +'1'+ "]").show().siblings("form").hide().end().find(".pid").find("option[value="+type+"]").attr("selected","selected");

        }else{

            $("form[data-type=" +'2'+ "]").show().siblings("form").hide().end().find(".pid").find("option[value="+type+"]").attr("selected","selected");

        }

    }


//    function getallchildlist(obj) {
//        console.log(obj);
//     var val = obj.value;
//     if (val == "0") return;
//     $.ajax({
//         url: "Api/ArtCategory/getallchildlist",
//         data: {"parent_cid": val},

//         success: function (data) {
//             process(obj, data);
//         },
//         error: function () {
//             alert("获取子菜单信息错误!");
//         }
//     });
// } 