function confirmSubmit(message)
{
    message = (message == '') ? 'Wprowadzone zmiany będą nieodwracalne. Czy na pewno wykonać?' : message;
    var agree = confirm(message);
    if (agree)
        return true;
    else
        return false;
}

function confirmDelete()
{
    return confirmSubmit('Czy jesteś pewien, że chcesz skasować wybrany element?');
}

// funkcja zaznacza wszystkie checkboxy w formularzu - zapozyczone z phpmyadmina
function setCheckboxes(the_form, element_name, do_check)
{
    var elts = document.forms[the_form].elements[element_name + '[]'];
    var elts_cnt = (typeof(elts.length) != 'undefined') ? elts.length : 0;

    if (elts_cnt)
    {
        for (var i = 0; i < elts_cnt; i++)
        {
            elts[i].checked = do_check;
        } // end for
    } else
    {
        elts.checked = do_check;
    }
    return true;
}

function showHide(item)
{
    var o = document.all ? document.all[item] : document.getElementById(item);
    var tag_name = o.tagName;
    var type = '';
    switch (tag_name) {
        case 'tr':
        case 'TR':
            type = 'table-row';
            break;
        case 'td':
        case 'TD':
        case 'th':
        case 'TH':
            type = 'table-cell';
            break;
        default:
            type = 'block';
            break;
    }
    o.style.display = (o.style.display == 'none') ? type : 'none';
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

function setOption(type, item, oValue)
{
    var l = document.all ? document.all[item] : document.getElementById(item);
    var o = (type == 'page') ? l.url_page : l.url_module;
    for (var i = 0; i < o.options.length; i++)
    {
        if (o.options[i].value == oValue)
        {
            o.options[i].selected = true;
        } else
        {
            o.options[i].selected = false;
        }
    }
}

function setValue(item, oValue)
{
    var o = document.all ? document.all[item] : document.getElementById(item);
    o.url.value = oValue;
}

function checkForm(item)
{
    var f = document.all ? document.all[item] : document.getElementById(item);
    if (!f.url.value)
    {
        f.url.value = (!f.url_page.value) ? f.url_addr.value : f.url_page.value;
    }
}
