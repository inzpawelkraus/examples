/*------hp zmieniarka----*/
var mz_interval;
var mz_act_page;
function startHpZmieniarkaAuto()
{
    mz_interval = setInterval("chgHpZmieniarkaAuto()", 4000);
    mz_act_page = 1;
}

function chgHpZmieniarkaAuto()
{
    pages = $('.hp_zmieniarka_item').length;
    mz_next_page = mz_act_page + 1;
    if (mz_next_page > pages)
    {
        mz_next_page = 1;
    }

    //alert(mz_next_page);

    ChgHpZmieniarka(mz_next_page);
}


function ChgHpZmieniarka(nr)
{
    $("div#hp_zmieniarka").children("div#hp_zmieniarka_item_" + nr).fadeIn(500);

    $("div#hp_zmieniarka").children("div.hp_zmieniarka_item").each(function() {
        act_id = $(this).attr("id");
        if ("hp_zmieniarka_item_" + nr != act_id)
        {
            $(this).fadeOut(1000);
        }
    }
    );

    mz_act_page = nr;
}

/*------page zmieniarka------*/
var pz_interval;
var pz_act_page;

function startPageZmieniarkaAuto()
{
    pz_interval = setInterval("chgPageZmieniarkaAuto()", 4000);
    pz_act_page = 1;
}

function chgPageZmieniarkaAuto()
{
    pages = $('.page_zmieniarka_item').length;

    mz_next_page = pz_act_page + 1;
    if (mz_next_page > pages)
    {
        mz_next_page = 1;
    }

    //alert(mz_next_page);

    ChgPageZmieniarka(mz_next_page);
}

function ChgPageZmieniarka(nr)
{
    $("div#page_zmieniarka").children("div#page_zmieniarka_item_" + nr).fadeIn(500);

    $("div#page_zmieniarka").children("div.page_zmieniarka_item").each(function() {
        act_id = $(this).attr("id");
        if ("page_zmieniarka_item_" + nr != act_id)
        {
            $(this).fadeOut(1000);
        }
    }
    );

    pz_act_page = nr;
}
function showHide(item)
{
    var o = document.all ? document.all[item] : document.getElementById(item);
    o.style.display = (o.style.display == 'block') ? 'none' : 'block';
}
function hide(item)
{
    var o = document.all ? document.all[item] : document.getElementById(item);
    o.style.display = 'none';
}
function show(item)
{
    var o = document.all ? document.all[item] : document.getElementById(item);
    o.style.display = 'block';
}










